<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('userdetails'))
		{
			redirect('user/login');
		}
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->model('invoice_model'); 
		$this->load->model('groups_model'); 
		$this->load->model('product_model');
		$this->load->model('payment_model');
		$this->load->model('cart_model');
        	$this->load->helper(array('url','html','form')); 
	}
	public function index()
	{
		if($this->session->userdata('userdetails'))
		{
			$userdetails = $this->session->userdata('userdetails');
			$group_id = $userdetails['group_id'];
			///echo '<pre>';print_r($userdetails);exit;
			if($userdetails['role_id']==1)
			{   
				$this->load->view('html/header');
				
				$data['invoices']= $this->invoice_model->listinvoices($group_id);
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('invoice/list',$data);
				$this->load->view('html/footer');
			}else{
			 $this->session->set_flashdata('perimisionserror',"You don't have permission to access Product's List");
			 redirect('user/dashboard');
			}
					
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
			 redirect('user/login');
		}
		
	}
	public function create()
	{
		$current_date = date('Y-m-d');
		$lastmonth_date = date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
		$current_day = date('d');
		//echo $current_date.'---'.$current_day;exit;
		$groups = $this->groups_model->getInvoiceGroups($current_day);
		//echo $this->db->last_query();exit;
		$invoices = array();
		if(count($groups)>0)
		{
			foreach($groups as $group)
			{
				///echo '<pre>';print_r($group);exit;
				$groupinvoices = $this->invoice_model->checkInvoice($group['group_id'],$current_date);
				if(count($groupinvoices)==0)
				{
					$totalinvoice = 0;
					$orderresults = $this->invoice_model->getordersbyGroupId($group['group_id'],$lastmonth_date,$current_date);
					//echo '<pre>';print_r($orderresults);exit;
					foreach($orderresults as $orderdetails)
					{
					$totalinvoice+=$orderdetails['discount'];
					}
					$invoice_data = array(
						'amount'  => $totalinvoice,
						'date_of_invoice'  => $lastmonth_date,
						'associaion_id'	=> 1,
						'group_id'  => $orderdetails['group_id'],
						'total_orders' => count($orderresults),
						'created_at'	=> date('Y-m-d')
						     );
					$invoice_id = $this->invoice_model->addinvoice($invoice_data);
					$invoices[] = $invoice_id;
					$this->load->library('email');
					$this->email->from('admin@mew.com', 'MEW');
					$this->email->to($group['contact_email']);
					$this->email->bcc('tavvaforu@gmail.com');
					$this->email->subject('MEW - Invoice genarated for '.$lastmonth_date);
					$html = "Hi Invoices has been genarated for the month".$lastmonth_date.". Please login to group and pay invocie";
					//echo $html;exit;
					$this->email->message($html);
					if($this->email->send())
					{
	                                        $update_data = array('mail_sent'=>1);
						$where = array('invoice_id'=>$invoice_id);
						$this->invoice_model->updateinvoice($update_data,$where);
					}else{
						echo "Error in sending email for ".$group['group_name']." on ".$current_date;
					}

				} else {
					echo 'Invoices already generated on '.$current_date.'<br/>';//exit;
				}
				//echo $totalinvoice;exit;
				//echo count($invoices);exit;
				///echo $this->db->last_query();exit;
				//echo '<pre>';print_r($invoices);exit;
			}
		} else {
			echo 'No invoices on '.$current_date.'<br/>';;
		}
		//echo '<pre>';print_r($invoices);exit;
		//echo '<pre>';print_r($orderresults);exit;
	}
	function view()
	{
		
		if($this->uri->segment(3)!='')
		{
			$invoice_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		$data['details'] = $this->invoice_model->getInvoiceDetails($invoice_id); 
		$this->load->view('html/header');
		$this->load->view('invoice/view',$data);
		$this->load->view('html/footer');
	}
	function pay()
	{
		if($this->uri->segment(3)!='')
		{
			$invoice_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		$data['details'] = $this->invoice_model->getInvoiceDetails($invoice_id); 
		$this->load->view('html/header');
		$this->load->view('invoice/pay',$data);
		$this->load->view('html/footer');
	}
	function processpay()
	{
		include('AuthorizeNet.php');
		define("AUTHORIZENET_API_LOGIN_ID", '7Y96K5nhEz');
		define("AUTHORIZENET_TRANSACTION_KEY", '5fFp23SU8Y7CvG3h');
		define("AUTHORIZENET_SANDBOX", 'https://apitest.authorize.net/xml/v1/request.api');
		///END PAYMENT CREDENTIALS////
		if($this->uri->segment(3)!='')
		{
			$invoice_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		$details = $this->invoice_model->getInvoiceDetails($invoice_id);
		$grand_total = $details['amount'];

		$cust_data = $this->session->userdata('userdetails');
		$cust_id = $cust_data['cust_id'];
		$group_id = $cust_data['group_id'];

		$method1 = $this->input->post('method1');
		$method2 = $this->input->post('method2');
		$status = '';

		$type = 'S';
		if($method1 == 'echeck' || $method2 == 'echeck')
		{
			$pmethod = 'ECHECK';
			$sale = new AuthorizeNetAIM;
			$sale->setFields(
			array(
			'amount' => number_format($grand_total, 2),
			'method' => 'echeck',
			'bank_aba_code' => $this->input->post('bank_aba_code'),//'121042882',
			'bank_acct_num' => $this->input->post('bank_acct_num'),//'123456789123',
			'bank_acct_type' => 'CHECKING',
			'bank_name' => $this->input->post('bank_name'),//'Bank of Earth',
			'bank_acct_name' => $this->input->post('bank_acct_name'),///'Jane Doe',
			'echeck_type' => 'WEB',
			)
			);
			$type = 'E';
			$response = $sale->authorizeAndCapture();
			$trans_id = $response->transaction_id;
			if ($response->response_code != 1) {
			$status = '';
			$data['payment_info'] = array();
			$data['error_msg'] = $response->response_reason_text;

			} else {
			$status = 'success';
			$data['payment_info'] = array('type'=>'ECHECK',
						'amount'=>number_format($grand_total, 2),
						'id'=>$trans_id,
						'sub_amount'=>number_format($grand_total, 2),
						'status'=>'success'
						);
			}
		} else if($method1 == 'credit' || $method2 == 'credit'){
			////echo 'credit Single';exit;
			////SINGLE PAYMENT CODE HERE////
			$pmethod = 'CREDIT CARD';
			$sale = new AuthorizeNetAIM;
		
			$sale->amount = number_format($grand_total, 2);
			//$sale->card_num = '4111111111111111';
			$sale->card_num = $this->input->post('card_num');
			$sale->first_name = $cust_data['firstname'];
			$sale->last_name = $cust_data['lastname'];
			$sale->city = $cust_data['city'];	
			$sale->card_code =  $_POST['b_code'];
			$sale->state = $cust_data['state'];
			$sale->zip = $cust_data['zipcode'];
			$sale->country = 'US';
			$sale->exp_date = $this->input->post('cd_month').'/'.$this->input->post('cd_year');
			//$sale->exp_date = $_POST['cd_month'].'/'.$_POST['cd_year'];
			///echo '<pre>';print_r($sale);exit;
			$response = $sale->authorizeAndCapture();
			///echo '<pre/>';print_r($response);exit;
			if ($response->response_code != 1) {
				$trans_id = $response->transaction_id;
				$data['error_msg'] = $response->response_reason_text;
				$data['payment_info'] = array();

			} else {
				///Save ORDER ONCE SINGLE PAYMENT DONE
				$trans_id = $response->transaction_id;
				$status = 'success';
				$data['payment_info'] = array('type'=>'ONETIME PAYMENT',
							      'amount'=>$response->amount,
							      'id'=>$trans_id,
							      'sub_amount'=>$response->amount,
							      'status' => 'success'
							     ); 
			}
			

		}
		if($status == 'success')
		{
	
			$paymentdetails = array('order_id'=>$details['invoice_id'],
						'transaction_id'=>$trans_id,
						'amount'=>$grand_total,
						'cust_id'=>$cust_id,
						'payment_date'=>date('Y-m-d H:i:s'),
						'payment_type'=>'INVOICE',
						'type'=>$type);
			$data['paymentdetails'] = $paymentdetails;
			$payment_id = $this->payment_model->insert_paymentdetails($paymentdetails);
			$invoice_data = array('paid_status' => 1,'paid_by'=>$cust_data['cust_id'],'paid_method'=>$pmethod);
			$where = array('invoice_id' => $details['invoice_id']);
			$payment_id = $this->invoice_model->updateinvoice($invoice_data,$where);
			$this->session->set_flashdata('success',"Invoice paid successfully.<br/>Please note transaction number:".$trans_id);
			redirect('invoice/view/'.base64_encode($details['invoice_id']));
			/////END //////

		} else {
			///echo '<pre>';print_r($data);exit;
			$this->load->view('html/header');
			$data['details'] = $details;
			$this->load->view('invoice/pay',$data);
			$this->load->view('html/footer');

		}

	}
}
