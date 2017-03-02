<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->model('cart_model'); // Load our cart model for our entire class
		$this->load->model('payment_model'); 
		///$this->load->model('authorizenet_model');		
		$this->load->library(array('form_validation','session')); 
        $this->load->helper(array('url','html','form')); 
		}
	public function index()
	{
		$group_id = 2;
		$data['products'] = $this->cart_model->retrieve_products($group_id); 
		$data['content'] = 'cart/products';
		$this->load->view('html/header');
		$this->load->view('cart/index', $data);
		$this->load->view('html/footer');
		///echo '<pre>';print_r($data['products']);exit;
	}
	function show_cart(){
	    $this->load->view('cart/cart');
	}
	function add_cart_item(){
	     
	    if($this->cart_model->validate_add_cart_item() == TRUE){
		redirect('cart/checkout');
		 ///echo 'YESY';exit;
		// Check if user has javascript enabled
		/*if($this->input->post('ajax') != '1'){
		    redirect('cart'); // If javascript is not enabled, reload the page with new data
		}else{
//	echo 'FALSE';exit;
		    echo 'true'; // If javascript is enabled, return true, so the cart gets updated
		}*/
	    }
     
	}

	function empty_cart(){
		$this->cart->destroy(); // Destroy all cart data
		redirect('product/view'); // Refresh te page
	}
	function update_cart(){
		$this->cart_model->validate_update_cart();
		redirect('cart');
	}
        function billing_view(){
                // Load "billing_view".

		$this->load->view('cart/billing_view');
        }
        
        public function save_order()
	{

		$grand_total = 0;
		if ($cart = $this->cart->contents()):
		    foreach ($cart as $item):
			$grand_total = $grand_total + $item['subtotal'];
		    endforeach;
		endif;
          	// This will store all values which inserted  from user.
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);
		$cust_data = $this->session->userdata('groupdata');
		$cust_id = $cust_data['cust_id'];
		$group_id = $cust_data['group_id'];
		///echo '<pre>';print_r($cust_data);exit;	

		$order = array(
			'purchase_date' => date('Y-m-d H:i:s'),
			'cust_id' 	=> $cust_id,
			'group_id'	=> $group_id,
			'discount'	=> 0,
			'order_status'	=> 1,
			'type'		=> 1,
			'group_id'	=> $group_id,
			'order_total'	=> number_format($grand_total, 2)
		);		
		//echo '<pre>';print_r($order);exit;
		$ord_id = $this->cart_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'order_id' 		=> $ord_id,
					'product_id' 		=> $item['id'],
					'quantity' 		=> $item['qty'],
					'product_price' 	=> $item['price'],
					'product_final_price' 	=> $item['price'],
					'cust_id'		=> $cust_id,
					'created_at'		=> date('Y-m-d H:i:s')
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                	//echo '<pre>';print_r($order_detail);exit;
		        $this->cart_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		$this->cart->destroy();
	      
                // After storing all imformation in database load "billing_success".
                $this->load->view('cart/billing_success'); 
	}
	public function checkout()
	{
		/*$userdetails = $this->session->userdata('userdetails');
		$cust_id = $userdetails['cust_id'];
		$group_id = $userdetails['group_id'];
		echo '<pre>';print_r($userdetails);exit;
		*/
		$this->load->view('html/header.php');
		$this->load->view('cart/checkout');
		$this->load->view('html/footer.php');
			//echo "TAVVA";exit;
	}

/////////////PAYMENT ACTION /////
	public function pay()
	{

		///echo '<pre>';print_r($this->input->post());exit;

		////PAYMENT CREDENTIALS ////
		include('AuthorizeNet.php');
		define("AUTHORIZENET_API_LOGIN_ID", '7Y96K5nhEz');
		define("AUTHORIZENET_TRANSACTION_KEY", '5fFp23SU8Y7CvG3h');
		define("AUTHORIZENET_SANDBOX", 'https://apitest.authorize.net/xml/v1/request.api');
		///END PAYMENT CREDENTIALS////
		$grand_total = 0;
		if ($cart = $this->cart->contents()):
		    foreach ($cart as $item):
			$grand_total = $grand_total + $item['subtotal'];
		    endforeach;
		endif;

		$cust_data = $this->session->userdata('userdetails');
		$cust_id = $cust_data['cust_id'];
		$group_id = $cust_data['group_id'];

		$method1 = $this->input->post('method1');
		$method2 = $this->input->post('method2');
		$status = '';
		///echo '<pre>';print_r($this->input->post());exit;
			if($this->input->post('paymenttype1') == 'single' || $this->input->post('paymenttype2') == 'single')
			{
				$type = 'S';
				if($method1 == 'echeck' || $method2 == 'echeck')
				{
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
				


			
			} else if($this->input->post('paymenttype1') == 'subscription' || $this->input->post('paymenttype2') == 'subscription'){
				///echo 'SSSS';exit;
					$type='M';
				////SUBSCRIPTION CODE HERE////
				if($method1 == 'echeck' || $method2 == 'echeck')
				{
					$totalmonths = 12;
					$subscription_amount = $grand_total/$totalmonths;
					$this->load->library('authorize_arb');
					$this->authorize_arb->startData('create');

					// Locally-defined reference ID (can't be longer than 20 chars)
					$refId = substr(md5( microtime() . 'ref' ), 0, 20);
					$this->authorize_arb->addData('refId', $refId);

					// Data must be in this specific order
					// For full list of possible data, refer to the documentation:
					// http://www.authorize.net/support/ARB_guide.pdf
					$subscription_data = array(
					'name' => $cust_data['firstname'].' '.$cust_data['lastname'].' Subscription',
					'paymentSchedule' => array(
						'interval' => array(
							'length' => 1,
							'unit' => 'months',
							),
						'startDate' => date('Y-m-d'),
						'totalOccurrences' => $totalmonths,
						'trialOccurrences' => 0,
						),
					'amount' => number_format($subscription_amount, 2),
					'trialAmount' => 0.25,
					'payment' => array(
						'bankAccount' => array(
							'accountType' => 'checking',
							'routingNumber'=> $this->input->post('bank_aba_code'),//'121042882',
							'accountNumber'=> $this->input->post('bank_acct_num'),//'123456789123',
							///'bankName' => $this->input->post('bank_name'),'Bank of Earth',
							'nameOnAccount' => $this->input->post('bank_acct_name')///'Jane Doe',
							///'echeckType' => 'WEB'
							),
						),
					'order' => array(
						'invoiceNumber' => $cust_id,
						'description' => 'MEW ORDER',
						),
					'customer' => array(
						'id' => $cust_id,
						'email' => $cust_data['email'],
						'phoneNumber' => $cust_data['cell_phone'],
						),
					'billTo' => array(
						'firstName' => $cust_data['firstname'],
						'lastName' => $cust_data['lastname'],
						'address' => $cust_data['address1'],
						'city' => $cust_data['city'],
						'state' => $cust_data['state'],
						'zip' => $cust_data['zipcode'],
						'country' => 'US',
						),
					);
					//echo '<pre>';print_r($subscription_data);exit;
					$this->authorize_arb->addData('subscription', $subscription_data);

					// Send request
					if( $this->authorize_arb->send() )
					{
					$sub_id = $this->authorize_arb->getId();
					$trans_id = $sub_id;
					$status = 'success';
					$data['payment_info'] = array('type'=>'SUBSCRIPTIONS',
									'amount'=>$grand_total,
									'id'=>$trans_id,
									'sub_amount'=>number_format($subscription_amount, 2),
									'status'=>'success'
									);
					}
					else
					{
						$status = 'success';
						$data['payment_info'] = array();
						$data['error_msg'] = $this->authorize_arb->getError();

					}

				} else if($method1 == 'credit' || $method2 == 'credit')
				{
				
					$totalmonths = 12;
					$subscription_amount = $grand_total/$totalmonths;
					$this->load->library('authorize_arb');
					$this->authorize_arb->startData('create');

					// Locally-defined reference ID (can't be longer than 20 chars)
					$refId = substr(md5( microtime() . 'ref' ), 0, 20);
					$this->authorize_arb->addData('refId', $refId);

					// Data must be in this specific order
					// For full list of possible data, refer to the documentation:
					// http://www.authorize.net/support/ARB_guide.pdf
					$subscription_data = array(
					'name' => $cust_data['firstname'].' '.$cust_data['lastname'].' Subscription',
					'paymentSchedule' => array(
						'interval' => array(
							'length' => 1,
							'unit' => 'months',
							),
						'startDate' => date('Y-m-d'),
						'totalOccurrences' => $totalmonths,
						'trialOccurrences' => 0,
						),
					'amount' => number_format($subscription_amount, 2),
					'trialAmount' => 0.25,
					'payment' => array(


						'creditCard' => array(
							///'cardNumber' => '4111111111111111',
							'cardNumber' => $this->input->post('card_num'),
							//'expirationDate' => '2017-08',
							'expirationDate' => $this->input->post('cd_year').'-'.$this->input->post('cd_month'),
							'cardCode' => $this->input->post('b_code'),
							),
						),
					'order' => array(
						'invoiceNumber' => $cust_id,
						'description' => 'MEW ORDER',
						),
					'customer' => array(
						'id' => $cust_id,
						'email' => $cust_data['email'],
						'phoneNumber' => $cust_data['cell_phone'],
						),
					'billTo' => array(
						'firstName' => $cust_data['firstname'],
						'lastName' => $cust_data['lastname'],
						'address' => $cust_data['address1'],
						'city' => $cust_data['city'],
						'state' => $cust_data['state'],
						'zip' => $cust_data['zipcode'],
						'country' => 'US',
						),
					);
					///echo '<pre>';print_r($subscription_data);exit;
					$this->authorize_arb->addData('subscription', $subscription_data);

					// Send request
					if( $this->authorize_arb->send() )
					{
					$sub_id = $this->authorize_arb->getId();
					$trans_id = $sub_id;
					$status = 'success';
					$data['payment_info'] = array('type'=>'SUBSCRIPTIONS',
									'amount'=>$grand_total,
									'id'=>$trans_id,
									'sub_amount'=>number_format($subscription_amount, 2),
									'status'=>'success'
									);
					}
					else
					{
					$status = '';
					$data['payment_info'] = array();
					$data['error_msg'] = $this->authorize_arb->getError();

					}
				}
				
				
			}

		if($status == 'success')
		{
			/////ORDER INSERT //////
			$order = array(
				'purchase_date' => date('Y-m-d H:i:s'),
				'cust_id' 	=> $cust_id,
				'group_id'	=> $group_id,
				'discount'	=> 0,
				'order_status'	=> 1,
				'type'		=> 1,
				'group_id'	=> $group_id,
				'order_total'	=> number_format($grand_total, 2)
			);		
			//echo '<pre>';print_r($order);exit;
			$ord_id = $this->cart_model->insert_order($order);

			//INSERT ORDER DETAILS ////
			if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'order_id' 		=> $ord_id,
					'product_id' 		=> $item['id'],
					'quantity' 		=> $item['qty'],
					'product_price' 	=> $item['price'],
					'product_final_price' 	=> $item['price'],
					'cust_id'		=> $cust_id,
					'created_at'		=> date('Y-m-d H:i:s')
				);
			endforeach;
			endif;		

			    // Insert product imformation with order detail, store in cart also store in database. 
			//echo '<pre>';print_r($order_detail);exit;
			$this->cart_model->insert_order_detail($order_detail);
			///END ORDER DETAILS ////


			$paymentdetails = array('order_id'=>$ord_id,
						'transaction_id'=>$trans_id,
						'amount'=>$grand_total,
						'cust_id'=>$cust_id,
						'payment_date'=>date('Y-m-d H:i:s'),
						'payment_type'=>'ORDER',
						'type'=>$type);


			$data['paymentdetails'] = $paymentdetails;
			$payment_id = $this->payment_model->insert_paymentdetails($paymentdetails);
			$this->cart->destroy();
			$this->load->view('html/header');
			$this->load->view('cart/billing_success',$data);
			$this->load->view('html/footer');

			/////END //////

		} else {
			///echo '<pre>';print_r($data);exit;
			$this->load->view('html/header');
			$this->load->view('cart/checkout',$data);
			$this->load->view('html/footer');

		}




	}

//////END /////
	public function singlepay()
	{

		///echo '<pre>';print_r($this->input->post());exit;

		////PAYMENT CREDENTIALS ////
		include('AuthorizeNet.php');
		define("AUTHORIZENET_API_LOGIN_ID", '7Y96K5nhEz');
		define("AUTHORIZENET_TRANSACTION_KEY", '5fFp23SU8Y7CvG3h');
		define("AUTHORIZENET_SANDBOX", 'https://apitest.authorize.net/xml/v1/request.api');
		///END PAYMENT CREDENTIALS////
		$grand_total = 0;
		if ($cart = $this->cart->contents()):
		    foreach ($cart as $item):
			$grand_total = $grand_total + $item['subtotal'];
		    endforeach;
		endif;

		$cust_data = $this->session->userdata('userdetails');
		$cust_id = $cust_data['cust_id'];
		$group_id = $cust_data['group_id'];

		$method1 = $this->input->post('method1');
		$method2 = $this->input->post('method2');
		///echo '<pre>';print_r($this->input->post());exit;
			if($this->input->post('paymenttype') == 'single')
			{
				$type = 'S';
				if($method1 == 'echeck' || $method2 == 'echeck')
				{
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
					if ($response->response_code != 1) {
					$trans_id = $response->transaction_id;
					$data['payment_info'] = array();
					$data['error_msg'] = $response->response_reason_text;

					} else {
					$status = 'success';
					$data['payment_info'] = array('type'=>'ECHECK',
								'amount'=>number_format($subscription_amount, 2),
								'id'=>$trans_id,
								'sub_amount'=>number_format($subscription_amount, 2),
								'status'=>'success'
								);
					}
				} else if($method == 'credit'){
					////SINGLE PAYMENT CODE HERE////
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
				


			
			} else if($this->input->post('paymenttype') == 'subscription'){
					$type='M';
				////SUBSCRIPTION CODE HERE////
				if($method1 == 'echeck' || $method2 == 'echeck')
				{
					$totalmonths = 12;
					$subscription_amount = $grand_total/$totalmonths;
					$this->load->library('authorize_arb');
					$this->authorize_arb->startData('create');

					// Locally-defined reference ID (can't be longer than 20 chars)
					$refId = substr(md5( microtime() . 'ref' ), 0, 20);
					$this->authorize_arb->addData('refId', $refId);

					// Data must be in this specific order
					// For full list of possible data, refer to the documentation:
					// http://www.authorize.net/support/ARB_guide.pdf
					$subscription_data = array(
					'name' => $cust_data['firstname'].' '.$cust_data['lastname'].' Subscription',
					'paymentSchedule' => array(
						'interval' => array(
							'length' => 1,
							'unit' => 'months',
							),
						'startDate' => date('Y-m-d'),
						'totalOccurrences' => $totalmonths,
						'trialOccurrences' => 0,
						),
					'amount' => number_format($subscription_amount, 2),
					'trialAmount' => 0.25,
					'payment' => array(
						'bankAccount' => array(
							'accountType' => 'checking',
							'routingNumber'=>'121042882',
							'accountNumber'=>'123456789123',
							///'bankName' => 'Bank of Earth',
							'nameOnAccount' => 'Jane Doe',
							///'echeckType' => 'WEB'
							),
						),
					'order' => array(
						'invoiceNumber' => $cust_id,
						'description' => 'MEW ORDER',
						),
					'customer' => array(
						'id' => $cust_id,
						'email' => $cust_data['email'],
						'phoneNumber' => $cust_data['cell_phone'],
						),
					'billTo' => array(
						'firstName' => $cust_data['firstname'],
						'lastName' => $cust_data['lastname'],
						'address' => $cust_data['address1'],
						'city' => $cust_data['city'],
						'state' => $cust_data['state'],
						'zip' => $cust_data['zipcode'],
						'country' => 'US',
						),
					);
					//echo '<pre>';print_r($subscription_data);exit;
					$this->authorize_arb->addData('subscription', $subscription_data);

					// Send request
					if( $this->authorize_arb->send() )
					{
					$sub_id = $this->authorize_arb->getId();
					$trans_id = $sub_id;
					$status = 'success';
					$data['payment_info'] = array('type'=>'SUBSCRIPTIONS',
									'amount'=>$grand_total,
									'id'=>$trans_id,
									'sub_amount'=>number_format($subscription_amount, 2),
									'status'=>'success'
									);
					}
					else
					{
					$data['payment_info'] = array();
					echo $data['error_msg'] = $this->authorize_arb->getError();exit;

					}

				} else if($method == 'credit')
				{
				
					$totalmonths = 12;
					$subscription_amount = $grand_total/$totalmonths;
					$this->load->library('authorize_arb');
					$this->authorize_arb->startData('create');

					// Locally-defined reference ID (can't be longer than 20 chars)
					$refId = substr(md5( microtime() . 'ref' ), 0, 20);
					$this->authorize_arb->addData('refId', $refId);

					// Data must be in this specific order
					// For full list of possible data, refer to the documentation:
					// http://www.authorize.net/support/ARB_guide.pdf
					$subscription_data = array(
					'name' => $cust_data['firstname'].' '.$cust_data['lastname'].' Subscription',
					'paymentSchedule' => array(
						'interval' => array(
							'length' => 1,
							'unit' => 'months',
							),
						'startDate' => date('Y-m-d'),
						'totalOccurrences' => $totalmonths,
						'trialOccurrences' => 0,
						),
					'amount' => number_format($subscription_amount, 2),
					'trialAmount' => 0.25,
					'payment' => array(


						'creditCard' => array(
							///'cardNumber' => '4111111111111111',
							'cardNumber' => $this->input->post('card_num'),
							//'expirationDate' => '2017-08',
							'expirationDate' => $this->input->post('cd_year').'-'.$this->input->post('cd_month'),
							'cardCode' => $this->input->post('b_code'),
							),
						),
					'order' => array(
						'invoiceNumber' => $cust_id,
						'description' => 'MEW ORDER',
						),
					'customer' => array(
						'id' => $cust_id,
						'email' => $cust_data['email'],
						'phoneNumber' => $cust_data['cell_phone'],
						),
					'billTo' => array(
						'firstName' => $cust_data['firstname'],
						'lastName' => $cust_data['lastname'],
						'address' => $cust_data['address1'],
						'city' => $cust_data['city'],
						'state' => $cust_data['state'],
						'zip' => $cust_data['zipcode'],
						'country' => 'US',
						),
					);
					///echo '<pre>';print_r($subscription_data);exit;
					$this->authorize_arb->addData('subscription', $subscription_data);

					// Send request
					if( $this->authorize_arb->send() )
					{
					$sub_id = $this->authorize_arb->getId();
					$trans_id = $sub_id;
					$status = 'success';
					$data['payment_info'] = array('type'=>'SUBSCRIPTIONS',
									'amount'=>$grand_total,
									'id'=>$trans_id,
									'sub_amount'=>number_format($subscription_amount, 2),
									'status'=>'success'
									);
					}
					else
					{
					$data['payment_info'] = array();
					echo $data['error_msg'] = $this->authorize_arb->getError();exit;

					}
				}
				
				
			}

		if($status == 'success')
		{
			/////ORDER INSERT //////
			$order = array(
				'purchase_date' => date('Y-m-d H:i:s'),
				'cust_id' 	=> $cust_id,
				'group_id'	=> $group_id,
				'discount'	=> 0,
				'order_status'	=> 1,
				'type'		=> 1,
				'group_id'	=> $group_id,
				'order_total'	=> number_format($grand_total, 2)
			);		
			//echo '<pre>';print_r($order);exit;
			$ord_id = $this->cart_model->insert_order($order);

			//INSERT ORDER DETAILS ////
			if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'order_id' 		=> $ord_id,
					'product_id' 		=> $item['id'],
					'quantity' 		=> $item['qty'],
					'product_price' 	=> $item['price'],
					'product_final_price' 	=> $item['price'],
					'cust_id'		=> $cust_id,
					'created_at'		=> date('Y-m-d H:i:s')
				);
			endforeach;
			endif;		

			    // Insert product imformation with order detail, store in cart also store in database. 
			//echo '<pre>';print_r($order_detail);exit;
			$this->cart_model->insert_order_detail($order_detail);
			///END ORDER DETAILS ////


			$paymentdetails = array('order_id'=>$ord_id,
						'transaction_id'=>$trans_id,
						'amount'=>$grand_total,
						'cust_id'=>$cust_id,
						'payment_date'=>date('Y-m-d H:i:s'),
						'payment_type'=>'ORDER',
						'type'=>$type);



			$payment_id = $this->payment_model->insert_paymentdetails($paymentdetails);
			$this->cart->destroy();
			$this->load->view('cart/billing_success',$data);

			/////END //////

		} else {
		echo '<pre>';print_r($data);exit;
			$this->load->view('cart/billing_success',$data);

		}




	}
	function create()
	{
		// Load the ARB lib
		$this->load->library('authorize_arb');
		
///LOCAL DATA TO GET ORDER
		$grand_total = 0;
		if ($cart = $this->cart->contents()):
		    foreach ($cart as $item):
			$grand_total = $grand_total + $item['subtotal'];
		    endforeach;
		endif;
          	// This will store all values which inserted  from user.
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);
		$cust_data = $this->session->userdata('groupdata');
		$cust_id = $cust_data['cust_id'];
		$group_id = $cust_data['group_id'];
		///echo '<pre>';print_r($cust_data);exit;	

		$order = array(
			'purchase_date' => date('Y-m-d H:i:s'),
			'cust_id' 	=> $cust_id,
			'group_id'	=> $group_id,
			'discount'	=> 0,
			'order_status'	=> 1,
			'type'		=> 1,
			'group_id'	=> $group_id,
			'order_total'	=> number_format($grand_total, 2)
		);		
		//echo '<pre>';print_r($order);exit;
		$ord_id = $this->cart_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'order_id' 		=> $ord_id,
					'product_id' 		=> $item['id'],
					'quantity' 		=> $item['qty'],
					'product_price' 	=> $item['price'],
					'product_final_price' 	=> $item['price'],
					'cust_id'		=> $cust_id,
					'created_at'		=> date('Y-m-d H:i:s')
				);		

                            // Insert product imformation with order detail, store in cart also store in database. 
                	//echo '<pre>';print_r($order_detail);exit;
		        $this->cart_model->insert_order_detail($order_detail);
			endforeach;
		endif;


///END

		echo '<h1>Creating Profile</h1>';
		
		// Start with a create object
		$this->authorize_arb->startData('create');
		
		// Locally-defined reference ID (can't be longer than 20 chars)
		$refId = substr(md5( microtime() . 'ref' ), 0, 20);
		$this->authorize_arb->addData('refId', $refId);
		
		// Data must be in this specific order
		// For full list of possible data, refer to the documentation:
		// http://www.authorize.net/support/ARB_guide.pdf
		$subscription_data = array(
			'name' => 'My Test Subscription',
			'paymentSchedule' => array(
				'interval' => array(
					'length' => 1,
					'unit' => 'months',
					),
				'startDate' => date('Y-m-d'),
				'totalOccurrences' => 9999,
				'trialOccurrences' => 0,
				),
			'amount' => number_format($grand_total, 2),
			'trialAmount' => 0.00,
			'payment' => array(
				'creditCard' => array(
					'cardNumber' => '4111111111111111',
					'expirationDate' => '2017-08',
					'cardCode' => '123',
					),
				),
			'order' => array(
				'invoiceNumber' => $ord_id,
				'description' => 'EBC ORDER',
				),
			'customer' => array(
				'id' => $cust_id,
				'email' => $cust_data['email'],
				'phoneNumber' => $cust_data['cell_phone'],
				),
			'billTo' => array(
				'firstName' => $cust_data['firstname'],
				'lastName' => $cust_data['lastname'],
				'address' => $cust_data['address1'],
				'city' => $cust_data['city'],
				'state' => $cust_data['state'],
				'zip' => $cust_data['zipcode'],
				'country' => 'US',
				),
			);
		
		$this->authorize_arb->addData('subscription', $subscription_data);
		
		// Send request
		if( $this->authorize_arb->send() )
		{
			echo '<h1>Success! ID: ' . $this->authorize_arb->getId() . '</h1>';
		}
		else
		{
			echo '<h1>Epic Fail!</h1>';
			echo '<p>' . $this->authorize_arb->getError() . '</p>';
		}
		
		// Show debug data
		$this->authorize_arb->debug();
exit;
	}
	
	// Update Profile
	function update( $subscription_id )
	{
		// Load the ARB lib
		$this->load->library('authorize_arb');
		
		echo '<h1>Updating Profile</h1>';
		
		// Start with an update object
		$this->authorize_arb->startData('update');
		
		// Locally-defined reference ID (can't be longer than 20 chars)
		$refId = substr(md5( microtime() . 'ref' ), 0, 20);
		$this->authorize_arb->addData('refId', $refId);
		
		// The subscription ID that we're editing
		$this->authorize_arb->addData('subscriptionId', $subscription_id);
		
		// Data must be in this specific order
		// For full list of possible data, refer to the documentation:
		// http://www.authorize.net/support/ARB_guide.pdf
		$subscription_data = array(
			'name' => 'My Updated Subscription',
			'paymentSchedule' => array(
				'totalOccurrences' => 17,
				'trialOccurrences' => 1,
				),
			'amount' => 14.99,
			'trialAmount' => 9.99,
			'payment' => array(
				'creditCard' => array(
					'cardNumber' => '5105105105105100',
					'expirationDate' => '2013-07',
					'cardCode' => '777',
					),
				),
			'order' => array(
				'invoiceNumber' => '774',
				'description' => 'Updated Campaign name',
				),
			'customer' => array(
				'id' => '774',
				'email' => 'update@edit.com',
				'phoneNumber' => '859-777-7777',
				),
			'billTo' => array(
				'firstName' => 'Dan',
				'lastName' => 'Bryson',
				'address' => '123 Blue St',
				'city' => 'London',
				'state' => 'CA',
				'zip' => '90210',
				'country' => 'US',
				),
			);
		
		$this->authorize_arb->addData('subscription', $subscription_data);
		
		// Send request
		if( $this->authorize_arb->send() )
		{
			echo '<h1>Success! Ref ID: ' . $this->authorize_arb->getRefId() . '</h1>';
		}
		else
		{
			echo '<h1>Epic Fail!</h1>';
			echo '<p>' . $this->authorize_arb->getError() . '</p>';
		}
		
		// Show debug data
		$this->authorize_arb->debug();
	}
	
	// Cancel Profile
	function cancel( $subscription_id )
	{
		// Load the ARB lib
		$this->load->library('authorize_arb');
		
		echo '<h1>Canceling Profile</h1>';
		
		// Start with a cancel object
		$this->authorize_arb->startData('cancel');
		
		// Locally-defined reference ID (can't be longer than 20 chars)
		$refId = substr(md5( microtime() . 'ref' ), 0, 20);
		$this->authorize_arb->addData('refId', $refId);
		
		// The subscription ID that we're canceling
		$this->authorize_arb->addData('subscriptionId', $subscription_id);
		
		// Send request
		if( $this->authorize_arb->send() )
		{
			echo '<h1>Success! Ref ID: ' . $this->authorize_arb->getRefId() . '</h1>';
		}
		else
		{
			echo '<h1>Epic Fail!</h1>';
			echo '<p>' . $this->authorize_arb->getError() . '</p>';
		}
		
		// Show debug data
		$this->authorize_arb->debug();
	}



}
