<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->library(array('form_validation','session')); 
        $this->load->helper(array('url','html','form')); 
		}
	public function login()
	{			
		if($this->session->userdata('userdetails'))
		{
			redirect('user/dashboard');
		}
		$this->load->view('html/header');
		$this->load->view('login');
		$this->load->view('html/footer');
		
	}
	public function marketing(){
		echo "aaa";
		
	}
	public function register()
	{

		$post = $this->input->post();
		///echo '<pre>';print_r($post);exit;
		if($this->input->post())
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('fullname', 'fullname', 'required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
			if ($this->form_validation->run() == FALSE) {
		
			} else {
				$insertdata= array(
					'email'=>$post['email'],
					'name'=>$post['fullname'],
					'role_id'=>3,
					'email'=>$post['email'],
					'password'=>md5($post['password']),
					'created_at'=>date("Y-m-d h:i:s")
					);
				//echo '<pre>';print_r($updatprofile );exit;
				$this->load->model('users_model');
				$user_id =$this->users_model->insertuser($insertdata);
				if($user_id)
				{
					$this->session->set_flashdata('success',"User created Sucessfully!!");
				 	redirect('user/login');
				}
			}
			
		} 
		$this->load->view('html/header');
		$this->load->view('user/register');
		$this->load->view('html/footer');

		
	}
	public function dashboard()
	{
		//echo $this->config->item('site_title');exit;
		$userinfo = $this->session->userdata('userdetails');
		$this->load->view('html/header');
		$this->load->view('user/dashboard');
		$this->load->view('html/footer');
		
	}
	public function sales()
	{
		$userinfo = $this->session->userdata('userdetails');
		$this->load->view('html/header');
		$this->load->view('user/marketing');
		$this->load->view('html/footer');
		
	}
	public function help(){
		$userinfo = $this->session->userdata('userdetails');
		if($this->input->post())
		{
			$post = $this->input->post();
			///echo '<pre>';print_r($post);exit;
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');
			///if(isset($post['vul_basedon']) && 
			///$this->form_validation->set_rules('vul_assess', 'Vulnerability Assessment Type', 'required');
			if ($this->form_validation->run() == FALSE) {

			}else{
				$this->load->library('email');
				$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
				$this->email->to('c.freedman@ondefend.com');
				$this->email->subject($post['subject']);
				$html = $post['message'];
				//echo $html;exit;
				$this->email->message($html);
				if($this->email->send())
				{
					$this->session->set_flashdata('success',"Email sent successfully.");
				////echo 'Sent Mail';
				}else{
				echo "Email not send";
				}

			}
		}
		$this->load->view('html/header');
		$this->load->view('user/help');
		$this->load->view('html/footer');
	}
	
	public function addquote()
	{
		//echo 'asdasd';exit;
		$userinfo = $this->session->userdata('userdetails');
		$this->load->view('html/header');
		$this->load->view('user/addquote');
		$this->load->view('html/footer');
	}
	function submitquote()
	{
		$userinfo = $this->session->userdata('userdetails');
		
		$post = $this->input->post();
		///echo '<pre>';print_r($post);exit;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Client Name', 'required');
		$this->form_validation->set_rules('address1', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('vul_ipcount', 'IP', 'numeric');
		$this->form_validation->set_rules('net_ipcount', 'IP', 'numeric');
		$this->form_validation->set_rules('vul_ecount', 'Vulnerable Employees', 'numeric');
		$this->form_validation->set_rules('net_ecount', 'Network Employees', 'numeric');
		$this->form_validation->set_rules('secutiy_type[]', 'Service Offering', 'required');
		///if(isset($post['vul_basedon']) && 
		///$this->form_validation->set_rules('vul_assess', 'Vulnerability Assessment Type', 'required');
		if ($this->form_validation->run() == FALSE) {

			///echo 'OOOPS';exit;
			$data['change_errors'] = validation_errors();
			$this->load->view('html/header');
			$this->load->view('user/addquote',$post);
			$this->load->view('html/footer');
			
		}else{
			//echo 'asdasd';exit;
			//echo '<pre>';print_r($post);//exit;
			$data = array();
			$data['name'] = $post['name'];
			$data['email'] = $post['email'];
			$data['phone'] = $post['phone'];
			$data['address1'] = $post['address1'];
			$data['address2'] = $post['address2'];
			$data['created_at'] = date('Y-m-d');
			foreach($post['secutiy_type'] as $security)
			{
				///echo $security;exit;
				if($security == 'vulnerability')
				{
					$data['vul_security'] = 1;
					if(count($post['vul_assess']) == 2)
					{
						$data['vul_internal'] = 1;
						$data['vul_external'] = 1;
					} else {
						if($post['vul_assess']['0'] == 'internal')
						{
							$data['vul_internal'] = 1;
							$data['vul_external'] = 0;
						} else {
							$data['vul_internal'] = 0;
							$data['vul_external'] = 1;
						}
					}
					if(isset($post['vul_basedon']) && $post['vul_basedon'] == 'infra')
					{
						$data['vul_ipscount'] = $post['vul_ipcount'];
						$data['vul_empcount'] = 0;
						$data['vul_type'] = 'IP';
					} else {
						$data['vul_ipscount'] = 0;
						$data['vul_empcount'] = $post['vul_ecount']==''?0:$post['vul_ecount'];
						$data['vul_type'] = 'EMPLOYEE';
					}
					$data['vul_offer_locations'] = $post['vul_officecount'];
					$data['vul_annual_service'] = $post['vul_anualservice'];
					$data['user_id'] = $userinfo['user_id'];
				} else if($security == 'network')
				{
					$data['net_security'] = 1;
					if(count($post['net_assess']) == 2)
					{
						$data['net_internal'] = 1;
						$data['net_external'] = 1;
					} else {
						if($post['net_assess']['0'] == 'internal')
						{
							$data['net_internal'] = 1;
							$data['net_external'] = 0;
						} else {
							$data['net_internal'] = 0;
							$data['net_external'] = 1;
						}
					}
					if(isset($post['net_basedon']) && $post['net_basedon'] == 'infra')
					{
						////echo $post['net_ipcount'];exit;
						$data['net_ipscount'] = $post['net_ipcount']==''?0:$post['net_ipcount'];
						$data['net_empcount'] = 0;
						$data['net_type'] = 'IP';
					} else {
						$data['net_ipscount'] = 0;
						$data['net_empcount'] = $post['net_ecount'];
						$data['net_type'] = 'EMPLOYEE';
					}
					$data['net_offer_locations'] = $post['net_officecount'];
					$data['net_annual_service'] = $post['net_anualservice'];
					$data['user_id'] = $userinfo['user_id'];
				} else if($security == 'application')
				{
					$data['app_security'] = 1;
					$data['app_pagescount'] = $post['app_pagescount'];
					$data['app_annual_service'] = $post['net_anualservice'];
					$data['user_id'] = $userinfo['user_id'];
				} else if($security == 'emailpish')
				{
					$data['email_security'] = 1;
					$data['email_empcount'] = $post['email_ecount'];
					$data['email_annual_service'] = $post['email_anualservice'];
					$data['user_id'] = $userinfo['user_id'];
				}
		
			}

///////APPLICATION TESTING /////
			///echo '<pre>';print_r($data);exit;
			if(isset($data['app_security']) && $data['app_security'] == 1)
			{

				$hourly_rate_direct = 180;
				$hourly_rate_msp = 125;
				$app_pagescost = array('0-100' => '75--2600',
							'101-200'=> '100--2600',
							'201-300'=>'125--5200',
							'301-400'=>'150--5200',
							'401-1000000'=>'160--5200');
				if($data['app_pagescount'] >0)
				{
					foreach($app_pagescost as $key=>$val)
					{
						$values = explode('-',$key);
						$min = $values[0];
						$max = $values[1];
						if($data['app_pagescount'] >= $min && $data['app_pagescount'] <= $max)
						{
							$rates = explode('--',$val);
							$price = ( $rates[0] * $hourly_rate_direct ) + $rates[1];
							if($data['app_annual_service'] == 'SINGLE')
							{
								$data['total_app_pagescount'] = $total_app_pagescount = $price;
							}
							else {
								$data['total_app_pagescount'] = $total_app_pagescount = $price*4;
							}
						
						}
					}
				
				}	
			}
///END APPLICATION TESTING /////


///////EMAIL PISHING TESTING /////

			if(isset($data['email_security']) && $data['email_security'] == 1)
			{

				$email_empcost = array('0-100' => '100',
							'101-200'=> '200',
							'201-300'=>'300',
							'301-400'=>'400',
							'401-1000000'=>'500');
				if($data['email_empcount'] >0)
				{
					foreach($email_empcost as $key=>$val)
					{
						$values = explode('-',$key);
						$min = $values[0];
						$max = $values[1];
						if($data['email_empcount'] >= $min && $data['email_empcount'] <= $max)
						{
							if($data['email_annual_service'] == 'SINGLE')
							{
								//$data['total_email_empcount'] = $total_email_empcount = $val;
								$data['total_email_empcount'] = $total_email_empcount = ($data['email_empcount'] *50);
							}
							else {
								$data['total_email_empcount'] = $total_email_empcount = ($data['email_empcount'] *50)*4;
							}
						
						}
					}
				
				}	
			}
///END EMAIL PISHING TESTING /////

		
			///echo '<pre>';print_r($data);exit;
			if(isset($data['net_security']) && $data['net_security'] == 1)
			{
				if($data['net_internal'] == 1 && $data['net_type'] == 'IP')
				{
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$n_ipsinternalcost = 	array(
								'0-125' => '0.15--2600',
								'126-250'=> '0.10--2600',
								'251-500'=>'0.09--2600',
								'501-2500'=>'0.05--5200',
								'2501-5000'=>'0.04--5200',
								'50001-100000'=>'0.03--5200'
								);			
					if($data['net_ipscount'] >0)
					{
						foreach($n_ipsinternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['net_ipscount'] >= $min && $data['net_ipscount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['net_ipscount'] * 2;
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];

								if($data['net_annual_service'] == 'SINGLE')
								{
									$data['total_net_ipscount_internal'] = $total_net_ipscount_internal = $price;
								}
								else {
									$data['total_net_ipscount_internal'] = $total_net_ipscount_internal = $price*4;
								}
							
							}
						}
					
					}
					
				}
				if($data['net_external'] == 1 && $data['net_type'] == 'IP')
				{
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$n_ipsexternalcost = array(
								'0-125' => '0.15--0',
								'126-250'=> '0.10--0',
								'251-500'=>'0.09--0',
								'501-2500'=>'0.05--0',
								'2501-5000'=>'0.04--0',
								'50001-100000'=>'0.03--0'
								);
					if($data['net_ipscount'] >0)
					{
						foreach($n_ipsexternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['net_ipscount'] >= $min && $data['net_ipscount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['net_ipscount'] * 2;
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];
								if($data['net_annual_service'] == 'SINGLE')
								{
									$data['total_net_ipscount_external'] = $total_net_ipscount_external = $price;
								}
								else {
									$data['total_net_ipscount_external'] = $total_net_ipscount_external = $price*4;
								}
							
							}
						}
					
					}	
				}
				///echo '<pre>';print_r($data);exit;
				
				if($data['net_internal'] == 1 && $data['net_type'] == 'EMPLOYEE')
				{
					//echo 'sfsdfasf';
					//echo '<pre>';print_r($data);exit;
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$n_empinternalcost = array(
								'0-250' => '0.15--2600',
								'251-500'=> '0.10--2600',
								'501-1000'=>'0.09--2600',
								'1001-5000'=>'0.05--5200',
								'5001-10000'=>'0.04--5200',
								'10001-100000'=>'0.03--5200'
								);
					if($data['net_empcount'] >0)
					{
					
						foreach($n_empinternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['net_empcount'] >= $min && $data['net_empcount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['net_empcount'];
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];

								if($data['net_annual_service'] == 'SINGLE')
								{
									$data['total_net_empcount_internal'] = $total_net_empcount_internal = $price;
								}
								else {
									$data['total_net_empcount_internal'] = $total_net_empcount_internal = $price*4;
								}
							
							}
						}
					
					}	
				}
				
				if($data['net_external'] == 1 && $data['net_type'] == 'EMPLOYEE')
				{
					
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$n_empexternalcost = array(
								'0-250' => '0.15--0',
								'251-500'=> '0.10--0',
								'501-1000'=>'0.09--0',
								'1001-5000'=>'0.05--0',
								'50001-10000'=>'0.04--0',
								'10001-100000'=>'0.03--0'
								);

					if($data['net_empcount'] >0)
					{
						foreach($n_empexternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['net_empcount'] >= $min && $data['net_empcount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['net_empcount'];
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];

								if($data['net_annual_service'] == 'SINGLE')
								{
									$data['total_net_empcount_external'] = $total_net_empcount_external = $price;
								}
								else {
									$data['total_net_empcount_external'] = $total_net_empcount_external = $price*4;
								}
							
							}
						}
					
					}		
				}	
			} 
			///echo '<pre>';print_r($data);exit;
			if(isset($data['vul_security']) && $data['vul_security'] == 1)
			{
				$hourly_rate_direct = 180;
				$hourly_rate_msp = 125;
				///echo 'TAVVA';exit;
				if($data['vul_internal'] == 1 && $data['vul_type'] == 'IP')
				{
					$v_ipsinternalcost = array(
								'0-125' => '0.09--2600',
								'126-250'=> '0.08--2600',
								'251-500'=>'0.06--2600',
								'501-2500'=>'0.05--5200',
								'2501-5000'=>'0.03--5200',
								'50001-100000'=>'0.02--5200'
								);
					
					if($data['vul_ipscount'] >0)
					{
						foreach($v_ipsinternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['vul_ipscount'] >= $min && $data['vul_ipscount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['vul_ipscount'] * 2;
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];
								///echo '<pre>';print_r($rates);exit;
								if($data['vul_annual_service'] == 'SINGLE')
								{
									////echo $price;exit;
									$data['total_vul_ipscount_internal'] = $total_vul_ipscount_internal = $price;
								}
								else {
									$data['total_vul_ipscount_internal'] = $total_vul_ipscount_internal = $price*4;
								}
							
							}
						}
					
					}
					
				}
				if($data['vul_external'] == 1 && $data['vul_type'] == 'IP')
				{
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$v_ipsexternalcost = array(
								'0-125' => '0.09--0',
								'126-250'=> '0.08--0',
								'251-500'=>'0.06--0',
								'501-2500'=>'0.05--0',
								'2501-5000'=>'0.03--0',
								'50001-100000'=>'0.02--0'
								);
					if($data['vul_ipscount'] >0)
					{
						foreach($v_ipsexternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['vul_ipscount'] >= $min && $data['vul_ipscount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['vul_ipscount'] * 2;
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];
								if($data['vul_annual_service'] == 'SINGLE')
								{
									$data['total_vul_ipscount_external'] = $total_vul_ipscount_external = $price;
								}
								else {
									$data['total_vul_ipscount_external'] = $total_vul_ipscount_external = $price*4;
								}
							}
						}
					
					}	
				}
				if($data['vul_internal'] == 1 && $data['vul_type'] == 'EMPLOYEE')
				{
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$v_empinternalcost =  array('0-250' => '0.09--2600',
								'251-500'=> '0.08--2600',
								'501-1000'=>'0.06--2600',
								'1001-5000'=>'0.05--5200',
								'5001-10000'=>'0.03--5200',
								'10000-100000'=>'0.02--5200');
					if($data['vul_empcount'] >0)
					{
						foreach($v_empinternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['vul_empcount'] >= $min && $data['vul_empcount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['vul_empcount'];
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];
								if($data['vul_annual_service'] == 'SINGLE')
								{
									$data['total_vul_empcount_internal'] = $total_vul_empcount_internal = $price;
								}
								else {
									$data['total_vul_empcount_internal'] = $total_vul_empcount_internal = $price*4;
								}
							
							}
						}
					
					}	
				}
				if($data['vul_external'] == 1 && $data['vul_type'] == 'EMPLOYEE')
				{
					///echo 'yes';exit;
					$hourly_rate_direct = 180;
					$hourly_rate_msp = 125;
					$v_empexternalcost = array('0-250' => '0.09--0',
								'251-500'=> '0.08--0',
								'501-1000'=>'0.06--0',
								'1001-5000'=>'0.05--0',
								'5001-10000'=>'0.03--0',
								'10000-100000'=>'0.02--0');
					if($data['vul_empcount'] >0)
					{
						foreach($v_empexternalcost as $key=>$val)
						{
							$values = explode('-',$key);
							$min = $values[0];
							$max = $values[1];
							if($data['vul_empcount'] >= $min && $data['vul_empcount'] <= $max)
							{
								$rates = explode('--',$val);
								$ipshours = $data['vul_empcount'];
								//echo $ipshours.'---'.$rates[0].'----'.$hourly_rate_direct;exit;
								$price = (($ipshours * $rates[0]) * $hourly_rate_direct ) + $rates[1];

								if($data['vul_annual_service'] == 'SINGLE')
								{
									$data['total_vul_empcount_external'] = $total_vul_empcount_external = $price;
								}
								else {
									$data['total_vul_empcount_external'] = $total_vul_empcount_external = $price*4;
								}
							
							}
						}
					
					}		
				}	
			}
			///echo '<pre>';print_r($data);exit;
			$quote_id =$this->users_model->addquotation($data);
			if($quote_id)
			{
				$this->session->set_flashdata('success',"Estimation submitted successfully");
			 	redirect('user/viewquote/'.base64_encode($quote_id));
			} else {
				$this->session->set_flashdata('error',"There was issue with submitting estimate.");
				$this->load->view('html/header');
				$this->load->view('user/addquote');
				$this->load->view('html/footer');			
			}
		}
		//echo 'SSS';exit;
		///echo '<pre>';print_r($data);exit;
	}
	public function printquote()
	{
		if($this->uri->segment(3)!='')
		{
			$quote_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		$quote_details =$this->users_model->getquote($quote_id);
		$this->load->view('user/printquote',$quote_details);
	}
	public function viewquote()
	{
		if($this->uri->segment(3)!='')
		{
			$quote_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		$userdetails = $this->session->userdata('userdetails');
		
		$quote_details =$this->users_model->getquote($quote_id);
		///echo '<pre>';print_r($quote_details);exit;
		$this->load->view('html/header');
		$this->load->view('user/viewquote',$quote_details);
		$this->load->view('html/footer');
	}
	public function quotations()
	{
		$userinfo = $this->session->userdata('userdetails');

		if($this->session->userdata('userdetails'))
		{
			$userdetails = $this->session->userdata('userdetails');
			///echo '<pre>';print_r($userdetails);exit;
			$data['invoices']= $this->users_model->listquotations($userdetails['user_id']);
					
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
			 redirect('user/login');
		}

		$this->load->view('html/header');
		$this->load->view('user/quotations',$data);
		$this->load->view('html/footer');
		
	}
	public function profilepost()
	{
		$userlogindata = $this->session->userdata('userdetails');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('firstname', 'firstname', 'required');
		$this->form_validation->set_rules('lastname', 'lastname', 'required');
		$this->form_validation->set_rules('address1', 'address1', 'required');
		$this->form_validation->set_rules('address2', 'address2', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('state', 'state', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'required|integer');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'phone', 'required|integer');
		$this->form_validation->set_rules('workphone', 'workphone', 'required|integer');
		$this->form_validation->set_rules('cellphone', 'cellphone', 'required|integer');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data=array('cust_id'=>$userlogindata['cust_id'],'email'=>$userlogindata['email']);		
			$this->load->model('users_model');
			$data['userdetails']= $this->users_model->getuserprofile($data);
			if (count($data)>0)
			{
			$this->session->set_userdata($data);
			$data['change_errors'] = validation_errors();
			$this->load->view('userprofile',$data);
			$this->load->view('html/footer');
			$this->load->view('html/header');
			}
		
		}else{
		//echo '<pre>';print_r($groupdatelognid);exit;
		$post = $this->input->post();
		//echo '<pre>';print_r($post);exit;
		$cus_id=$post['customerid'];
		$role_id=$userlogindata['group_id'];
		$group_id=$userlogindata['group_id'];
		$updatprofile= array(
			'group_id'=>$userlogindata['role_id'],
			'role_id'=>$userlogindata['role_id'],
			'cust_id'=>$post['customerid'],
			'username'=>$post['username'],
			'firstname'=>$post['firstname'],
			'lastname'=>$post['lastname'],
			'email'=>$userlogindata['email'],
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			'country'=>$post['country'],
			'zipcode'=>$post['zipcode'],
			'phone'=>$post['phone'],
			'work_phone'=>$post['workphone'],
			'cell_phone'=>$post['cellphone'],
			'gender'=>$post['gender'],
			'birthday'=>$post['dob'],
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:s"),
			);
		//echo '<pre>';print_r($updatprofile );exit;
		$this->load->model('users_model');
		$userprofile=$this->users_model->updateuserprofile($updatprofile,$cus_id);
		//echo $this->db->last_query();exit;
		if (count($userprofile)>0)
			{
				$this->session->set_flashdata('updatemessage',"Profile Sucessfully Updated!");
				 redirect('user/dashboard');
				 
			}else{
				$this->session->set_flashdata('updateerror',"Something went wrong in customer creating process!");
				 redirect('user/dashboard');
			}
			
		}
	}
	public function forgotpassword()
	{
		$this->load->view('html/header');
		$this->load->view('forgotpassword');
		$this->load->view('html/footer');
		
	}
	public function changepassword()
	{
		$this->load->view('html/header');
		$this->load->view('changepassword');
		$this->load->view('html/footer');
		
	}
	public function loginPost()
	{
		$this->load->database();
		$post = $this->input->post();
		//echo "<pre>";print_r($post);
		$Email=$post['email'];
		$loginpostvalue = array(
			'email'=>$post['email'],
			'password'=>md5($post['password']),
		);
		if($this->input->post())
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('loginerror', validation_errors());
			$this->load->view('html/header');
			$this->load->view('login');
			$this->load->view('html/footer');
		} else {
			$this->load->model('users_model');
			$result=$this->users_model->user_login($loginpostvalue);

			if (count($result)>0)
			{
			///echo "<pre>";print_r($userdate);exit;
			$this->session->set_userdata('userdetails',$result);
			redirect("user/dashboard");

			}else {
			$this->session->set_flashdata('loginerror',"Invalid Email Or Password!");
			redirect('user/login');
			}

		}

		

	}
	public function changepasswordpost()
	{
	 if($this->session->userdata('userdetails'))
	 {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'required|min_length[6]');
		$this->form_validation->set_rules('newpassword', 'newpassword', 'required|min_length[6]');
		$this->form_validation->set_rules('conformpassword', 'conformpassword', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
		$data['change_errors'] = validation_errors();
		$this->load->view('changepassword',$data);
		$this->load->view('html/footer');
		$this->load->view('html/header');
		}else{
		$changepasword = $this->input->post();
		//echo '<pre>';print_r($changepasword);
		$currentpostpassword=md5($changepasword['currentpassword']);
		$newpassword=$changepasword['newpassword'];
		$conpassword=$changepasword['conformpassword'];
		$this->load->model('users_model');
			$emaildata =array('email'=>$changepasword['email'],'cust_id'=>$changepasword['cusid']);
			$userdetails = $this->users_model->getpassuserinfo($emaildata);
			//echo '<pre>';print_r($userdetails);exit;
			$currentpasswords=$userdetails['password'];
			if($currentpostpassword == $currentpasswords ){
				if($newpassword == $conpassword){
						$pass=md5($conpassword);
						$this->load->model('users_model');
						$passwordchange = $this->users_model->setpassuserinfo($changepasword['email'],$pass);
						//echo $this->db->last_query();exit;
						if (count($passwordchange)>0)
							{
								$this->load->library('email');
								$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
								$this->email->to($changepasword['email']);
								$this->email->subject('MEW - Change password');
								$html = "Your password is sucessfully changed cureent password is".$conpassword;
								//echo $html;exit;
								$this->email->message($html);
								if($this->email->send())
								{
									echo 'Sent Mail';
								}else{
									echo "Email not send";
								}
								$this->session->set_flashdata('updatpassword',"Sucessfully Updated your password!");
								redirect('user/changepassword');
						 
							}else{
								$this->session->set_flashdata('addcuserror',"Something went wrong in change password process!");
								redirect('user/changepassword');
							}
				}else{
					$this->session->set_flashdata('matchpassworderror',"Password and Conform password not Matching!");
					redirect('user/changepassword');
				}
			}else{
					$this->session->set_flashdata('currentpassworderror',"CurrentPassword not Matching");
					redirect('user/changepassword');
				}
			}
	 }else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
	}
	public function forgotpasswordemail()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$data['forgotpassword'] = validation_errors();
			$this->load->view('forgotpassword',$data);
			$this->load->view('html/footer');
			$this->load->view('html/header');
		}else{
		$this->load->model('users_model');
		$forgotemail_value = $this->input->post();
		//echo '<pre>';print_r($forgotemail_value);
		$forgotemail= $this->security->xss_clean($forgotemail_value);
		$email=$forgotemail['email'];
		$users = $this->users_model->forgot_password($email);
		//echo '<pre>';print_r($users);exit;
		if(count($users)>0)
		{
			$cust_id = $users['user_id'];
            $this->load->library('email');
            $this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
            $this->email->to($email);
            $this->email->subject('Serge Software Solutions - Forgot Password');
            $html = "Click this link to reset your password. ".site_url('user/resetpassword/?code='.base64_encode($email).'__'.base64_encode($cust_id));
			//echo $html;exit;
			$this->email->message($html);
            if($this->email->send())
				{
				$this->session->set_flashdata('success','Check Your Email to reset your password!');
				redirect('user/forgotpassword');

				}else {
				echo "error in email sent";
				}
			redirect('user/forgotpassword');				
            
		} else {
		  $this->session->set_flashdata('emailinvalid','Email you entered in not registered!');
			redirect('user/forgotpassword');
		}
		
		}
	}
	public function resetpassword()
	{
		$reset_pass = $this->input->post();
        $code = $_GET['code'];
        $arr = explode('__',$code);
		$email = base64_decode($arr[0]);
		$userid = base64_decode($arr[1]);
		if(isset($reset_pass['password']) && $reset_pass['password'] !='' )
		{
			if(!empty($reset_pass['password']) && $reset_pass['password']== $reset_pass['conpassword'])
			{
				$this->load->model('users_model');
				$users = $this->users_model->update_password($reset_pass);
				if(count($users)>0)
				{
					$this->session->set_flashdata("success","Your password changed successfully!");
					redirect('user/login');
				}
			}
			else
			{
				$this->session->set_flashdata("error","Passwords are Not matched!");
				redirect('user/resetpassword/?code='.base64_encode($reset_pass['email']).'__'.base64_encode($reset_pass['userid']));
			}
		}
		$this->load->model('users_model');
		$data = array('email'=>$email,'userid'=>$userid);
		$this->load->view('html/header');
        $this->load->view('resetpassword',$data);
        $this->load->view('html/footer');
	}
	public function add()
	{
		$this->load->view('html/header');
		$this->load->view('addcustomer');
		$this->load->view('html/footer');
		
    }
	public function addpost()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'required|callback_username_check');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required');
		$this->form_validation->set_rules('lastname', 'lastname', 'required');
		$this->form_validation->set_rules('address1', 'address1', 'required');
		$this->form_validation->set_rules('address2', 'address2', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('state', 'state', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'required|integer');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('phone', 'phone', 'required|integer');
		$this->form_validation->set_rules('workphone', 'workphone', 'required|integer');
		$this->form_validation->set_rules('cellphone', 'cellphone', 'required|integer');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('dob', 'dob', 'required');

		if ($this->form_validation->run() == FALSE) {
		$data['addcus_errors'] = validation_errors();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('addcustomer',$data);
		$this->load->view('html/header');
		$this->load->view('html/footer');
		}else{
		$userdetails = $this->session->userdata('userdetails');
		$post = $this->input->post();
		//echo '<pre>';print_r($post);exit;
		$this->load->model('users_model');
		$emaildata=$this->users_model->emailcheck($post['email']);
		//echo count($emaildata);exit;
		if (count($emaildata) >0)
			{
				$this->session->set_flashdata('emailerror',"Email id already exits");
				redirect('group/add');
			
		}else{
		$group_id=$userdetails['group_id'];
		$addcustomer= array(
			'group_id'=>$group_id,
			'role_id'=>3,
			'username'=>$post['username'],
			'firstname'=>$post['firstname'],
			'lastname'=>$post['lastname'],
			'email'=>$post['email'],
			'password'=>md5($post['password']),
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			'country'=>$post['country'],
			'zipcode'=>$post['zipcode'],
			'phone'=>$post['phone'],
			'work_phone'=>$post['workphone'],
			'cell_phone'=>$post['cellphone'],
			'gender'=>$post['gender'],
			'birthday'=>$post['dob'],
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:s"),
			'created_by'=>$group_id,
			'reg_email_Sent'=>0,
			);
		$this->load->model('users_model');
		$addcus=$this->users_model->addcustomer($addcustomer);
		//echo $this->db->last_query();exit;
		if (count($addcus)>0)
			{
						$this->load->library('email');
						$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
						$this->email->to($post['email']);
						$this->email->subject('MEW - Create customer');
						$html = "This is Your Email ID :".$post['email']." and Password : ".$post['password']."check your login details";
						//echo $html;exit;
						$this->email->message($html);
						if($this->email->send())
						{
							echo 'Sent Mail';
							$this->load->model('users_model');
							$emailsendcus=$this->users_model->createcustomersendemail($post['email'],1);
							if (count($emailsendcus)>0)
							{
								echo "Sucessfully email send";
							}
						} else {
						echo "error in email sent";
						}
				 $this->session->set_flashdata('addcus',"Sucessfully Employee Created!");
				 redirect('user/lists');
			}else{
				
				$this->session->set_flashdata('addcuserror',"Something went wrong in employee creating process!");
				 redirect('user/lists');
			}
		}
	 }
	}
	public function import()
	{
		$this->load->view('html/header');
		$this->load->view('group/importcustomer');
		$this->load->view('html/footer');
	}
	public function importcustomers()
	{			
			
		$groupdata = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($_FILES );exit;
		if((!empty($_FILES["file"])) && ($_FILES['file']['error'] == 0)) {
			
			$limitSize	= 15000; //(15 kb) - Maximum size of uploaded file, change it to any size you want
			$fileName	= basename($_FILES['file']['name']);
			$fileSize	= $_FILES["file"]["size"];
			$fileExt	= substr($fileName, strrpos($fileName, '.') + 1);
			
			if (($fileExt == "xlsx") && ($fileSize < $limitSize)) {
				
					include( 'simplexlsx.class.php');

				$getWorksheetName = array();
				$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );
				$getWorksheetName = $xlsx->getWorksheetName();
				//echo $xlsx->sheetsCount();
				for($j=1;$j <= $xlsx->sheetsCount();$j++){
					//echo $j;
					$cnt=$xlsx->sheetsCount()-1;
					//echo $cnt;exit;
					$arry=$xlsx->rows($j);
					unset($arry[0]);
					//echo "<pre>";print_r($arry);
					$error=0;
					  foreach($arry as $key=>$fields)
						{
							
							$totalfields[] = $fields;	
							
							if(empty($fields[1])) {
								$data['errors'][]="Myewellness id is required!. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[1]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[1]))
								{
								$data['errors'][]="Myewellness id can only consist of alphanumaric, space and dot !. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[2])) {
								$data['errors'][]="username is required!. Row Id is :  ".$key;
								$error=1;
							}else if($fields[2]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[2]))
								{
								$data['errors'][]="Username  can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
								$error=1;
								}else{
									$this->load->model('groups_model');
									$result = $this->groups_model->get_user_exists($fields[2]);
									if(count($result)>0){
									$data['errors'][]="Username already exits .please use another Username. Row Id is :  ".$key.'<br>';
									$error=1;	
									}

								}
							}
							if(empty($fields[3])) {
								$data['errors'][]="FirstName is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[3]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[3]))
								{
								$data['errors'][]="FirstName  can only consist of alphanumaric, space and dot. Row Id is :   ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[4])) {
								$data['errors'][]="LastName is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[4]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[4]))
								{
								$data['errors'][]="LastName can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[5])) {
								$data['errors'][]="Email is required. Row Id is :  ".$key;
								$error=1;
							}else if($fields[5]!=''){
								$regex ="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
								if(!preg_match( $regex, $fields[5]))
								{
								$data['errors'][]="Please enter a valid email address. For example johndoe@domain.com. Row Id is :  ".$key.'<br>';
								$error=1;
								}else{
									$this->load->model('groups_model');
									$result = $this->groups_model->get_email_exists($fields[5]);
									if(count($result)>0){
									$data['errors'][]="Email id already exits .please use another Email Id. Row Id is :  ".$key.'<br>';
									$error=1;	
									}

								}
							}
							if(empty($fields[6])) {
								$data['errors'][]="Password is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[6]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[6]))
								{
								$data['errors'][]="Password  can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[7])) {
								$data['errors'][]= "Please select a gender value. Row Id is :  ".$key.'<br>';
							}
							if(empty($fields[8])) {
								$data['errors'][]="Address1 is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[8]!=''){
								$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\|=^?$%*)(_+-]*$/";
								if(!preg_match( $regex, $fields[8]))
								{
								$data['errors'][]='Address1 wont allow "  <> []. Row Id is :  '.$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[9])) {
								$data['errors'][]="Address2 is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[9]!=''){
								$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\|=^?$%*)(_+-]*$/"; 
								if(!preg_match( $regex, $fields[9]))
								{
								$data['errors'][]='Address2 wont allow "  <> []. Row Id is :  '.$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[10])) {
								$data['errors'][]="City is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[10]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/";
								if(!preg_match( $regex, $fields[10]))
								{
								$data['errors'][]="City  can only consist of alphanumaric, space and dot. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[11])) {
								echo "State is required. Row Id is :  ".$key.'<br>';
							}
							if(empty($fields[12])) {
								$data['errors'][]="Country is required. Row Id is :  ".$key.'<br>';
							$error=1;
							}
							if(empty($fields[13])) {
								$data['errors'][]="zipcode is required. Row Id is :  ".$key.'<br>';
							$error=1;
							}else if($fields[13]!=''){
								$regex ="/^[0-9A-Z a-z]{5,10}$/"; 
								if(!preg_match( $regex, $fields[13]))
								{
								$data['errors'][]="Zipcode can contain 5 to 10 alphanumeric and space. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[14])) {
								$data['errors'][]="Phone Number is required. Row Id is :  ".$key;
							$error=1;
							}else if($fields[14]!=''){
								$regex ="/^[0-9]{10,14}$/"; 
								if(!preg_match( $regex, $fields[14]))
								{
								$data['errors'][]="Phone Number must be 10 to 14 digits. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[15])) {
								$data['errors'][]="Cell Phone Number is required. Row Id is :  ".$key.'<br>';;
							$error=1;
							}else if($fields[15]!=''){
								$regex ="/^[0-9]{10,14}$/"; 
								if(!preg_match( $regex, $fields[15]))
								{
								$data['errors'][] = "Cell Phone Number must be 10 to 14 digits. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[16])) {
								$data['errors'][] = "Work Phone Number is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[16]!=''){
								$regex ="/^[0-9]{10,14}$/"; 
								if(!preg_match( $regex, $fields[16]))
								{
								$data['errors'][]="Work Phone Number must be 10 to 14 digits. Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[17])) {
								$data['errors'][]="Date of birth is required. Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[17]!=''){
								$regex ="/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/" ;
								if(!preg_match( $regex, $fields[17]))
								{
								
								$data['errors'][]="Please enter a valid Date format. For example 1992-14-07 . Row Id is :  ".$key.'<br>';
								$error=1;
								}
							}
						}
				}
				//echo '<pre>';print_r($data['errors']);
					$this->load->view('html/header');
					$this->load->view('group/importcustomer',$data);
					$this->load->view('html/footer');
					
				} 
				
				if(count($data['errors'])<=0){
				foreach($totalfields as $data){
								$impostcus=array(
								'group_id'=>$groupdata['group_id'],
								'role_id'=>3,
								'mew_id'=>$data[1],
								'username'=>$data[2],
								'firstname'=>$data[3],
								'lastname'=>$data[4],
								'email'=>$data[5],
								'password'=>md5($data[6]),
								'gender'=>$data[7],
								'address1'=>$data[8],
								'address2'=>$data[9],
								'city'=>$data[10],
								'state'=>$data[11],
								'country'=>$data[12],
								'zipcode'=>$data[13],
								'phone'=>$data[14],
								'cell_phone'=>$data[15],
								'work_phone'=>$data[16],
								'birthday'=>$data[17],
								'status'=>1,
								'created_at'=>date("Y-m-d h:i:s"),
								'created_by'=>$groupdata['group_id'],
								'reg_email_Sent'=>0,
								);
								//echo '<pre>';print_r($impostcus);exit;
								$this->load->model('groups_model');
								$importcustomer=$this->groups_model->importcustomer($impostcus);
								if(count($importcustomer)>0){
										$this->load->library('email');
										$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
										$this->email->to($data['email']);
										$this->email->subject('MEW - Create customer');
										$html = "This is Your Email ID :".$data[5]." and Password : ".$data[6]."check your login details";
										//echo $html;exit;
										$this->email->message($html);
											if($this->email->send())
											{
												echo 'Sent Mail';
												$this->load->model('groups_model');
												$emailsendcus=$this->groups_model->createcustomersendemail($data['email'],1);
												if (count($emailsendcus)>0)
												{
													echo "Sucessfully email send";
												}
											} else {
											echo "error in email sent";
											}	
										
									$this->session->set_flashdata('importcustomer',"Sucessfully customers Created!");
									
								}								
					}
					redirect('user/import');
				}
				
			}else{
				echo '<script>alert("Sory, this demo page only allowed .xlsx file. If you want to try upload larger file, please download the source and try it on your own webserver.")</script>';
				$this->session->set_flashdata('importerror',"Something went wrong in proccessing!.");
				redirect('user/import');
			}
			
		
	}
	public function lists()
	{
		if($this->session->userdata('userdetails'))
		{
			$this->load->view('html/header');
			$userdata = $this->session->userdata('userdetails');
			if($userdata['role_id']==2){
			$group_id=$userdata['group_id']; 
			$roleid=$userdata['role_id'];
			$data=array('group_id'=>$userdata['group_id']);		
			$this->load->model('users_model');
			$data['groupcustomers']= $this->users_model->getcustomerlists($data);
			$this->load->view('group/listcustomer',$data);
			$this->load->view('html/footer');
			
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Employee's List");
				redirect('user/dashboard');
			}
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
    }
	public function listall()
	{
		if($this->session->userdata('userdetails'))
		{
			$this->load->view('html/header');
			$userdata = $this->session->userdata('userdetails');
			if($userdata['role_id']==1){
			$this->load->model('users_model');
			$data['customers']= $this->users_model->employeelist();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('association/listcustomer',$data);
			$this->load->view('html/footer');
			
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Employee's List");
				redirect('user/dashboard');
			}
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
    }
	public function orders()
	{
		
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==2){
				$this->load->view('html/header');
				$this->load->model('users_model');
				$data['groupallorders']= $this->users_model->listorders($groupdatelognid['group_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('group/grouplistorders',$data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Order's List");
				redirect('user/dashboard');
			}
			
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
	}
	public function orderlist()
	{
		
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==1){
				$this->load->view('html/header');
				$this->load->model('users_model');
				$data['listorders']= $this->users_model->orderlists();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('association/listorders',$data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Order's List");
				redirect('user/dashboard');
			}
			
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
	}
	
	public function userprofile()
	{
		$code = $_GET['id'];
		$arr = explode('__',$code);
		$cid = base64_decode($arr[0]);
		$gid = base64_decode($arr[1]);
		$this->load->view('html/header');
		$this->load->model('users_model');
		$data['userviewprofile']= $this->users_model->getalluserprofile($cid);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data);exit;
		$this->load->view('userviewprofile',$data);
		$this->load->view('html/footer');
	}
	public function edit()
	{
		$this->load->model('users_model');
		$userdetails = $this->session->userdata('userdetails');
		///echo '<pre>';print_r($userdetails);exit;
		$data['empoyeedata']= $this->users_model->getcustomerdataedit($userdetails['user_id']);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/header');
		$this->load->view('group/editcustomer',$data);
		$this->load->view('html/footer');
		
    }
	public function orderview()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==2 || $groupdatelognid['role_id']==1){
				$this->load->view('html/header');
				$orderid = base64_decode($_GET['id']);
				$this->load->model('users_model');
				$data['orderdetails']= $this->users_model->getorderdetails($orderid);
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('orderdetails',$data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Order's List");
				redirect('user/dashboard');
			}
			
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
		
	}
	public function printview()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==2 || $groupdatelognid['role_id']==1){
				$orderid = base64_decode($_GET['id']);
				$this->load->model('users_model');
				$data['orderdetails']= $this->users_model->getprintview($orderid);
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('print',$data);
			}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Order's List");
				redirect('user/dashboard');
			}
			
		}else{
			 $this->session->set_flashdata('loginerror','Please login to continue');
             redirect('user/login');
		}
		
	}
	public function servicequote()
	{

		$groupdatelognid = $this->session->userdata('userdetails');
		if($this->uri->segment(3)!='')
		{
		$quote_id = base64_decode($this->uri->segment(3));
		} else {
		echo 'Invalid URL';exit;
		}
		$quote_details =$this->users_model->getquote($quote_id);
		$this->load->view('user/servicequote',$quote_details);
	

	}
		
	public function delemp()
	{
		$code = $_GET['id'];
        $arr = explode('__',$code);
		$cid = base64_decode($arr[0]);
		$status = base64_decode($arr[1]);
		if($status==1){
			$status=0;
		}else{
			$status=1;
		}
		$this->load->model('users_model');
		$data= $this->users_model->deletecustomerdata($cid,$status);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data);exit;
		if (count($data)>0)
			{
				$this->session->set_flashdata('updatemessage',"Sucessfully Employee Deleted");
				 redirect('user/lists');
				 
			}else{
				$this->session->set_flashdata('updateerror',"Something went wrong in Deleting process ");
				 redirect('user/lists');
			}
		$this->load->view('html/footer');
		$this->load->view('html/header');
    }
	public function customerupdate()
	{

		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$userdetails = $this->session->userdata('userdetails');	
		$cust_id = $userdetails['user_id'];
		$email = $userdetails['email'];
		//$this->form_validation->set_rules('username', 'username', 'required|callback_username_check');
		//$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
		///$this->form_validation->set_rules('name', 'Fullname', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address1', 'address1', 'required');
		$this->form_validation->set_rules('address2', 'address2', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('state', 'state', 'required');
		///$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('zipcode', 'zipcode', 'required|integer');
		//$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('phone', 'phone', 'required|integer');
		///$this->form_validation->set_rules('company_logo', 'Company Logo', 'required');
		$post = $this->input->post();
		///echo '<pre>';print_r($post);print_r($_FILES);exit;
		if ($this->form_validation->run() == FALSE) {
		$post = $this->input->post();
		///$email=$post['email'];
		$this->load->model('users_model');
		$data['empoyeedata']= $this->users_model->getcustomerdataedit($email);
		$data['customer_update'] = validation_errors();
		$this->load->view('group/editcustomer',$data);
		$this->load->view('html/footer');
		$this->load->view('html/header');
		}else{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);
		$cus_id=$post['customerid'];
		move_uploaded_file($_FILES['company_logo']['tmp_name'], "assets/photos/" . $_FILES['company_logo']['name']);
		$postcusdata= array(
			'company_name'=>$post['company_name'],
			///'company_logo'=>$_FILES['company_logo']['name'],
			'name'=>$post['name'],
			'lastname'=>$post['lastname'],
			//'email'=>$post['email'],
			//'password'=>md5($post['password']),
			'address1'=>$post['address1'],
			'address2'=>$post['address2'],
			'city'=>$post['city'],
			'state'=>$post['state'],
			'country'=>$post['country'],
			'zipcode'=>$post['zipcode'],
			'phone'=>$post['phone'],
			'fax'=>$post['fax'],
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:s")
			);
		if(isset($_FILES['company_logo']['name']) && $_FILES['company_logo']['name']!='')
		{
			$postcusdata['company_logo'] = $_FILES['company_logo']['name'];
		}
		$groupdatedata= $this->users_model->updatecompanyprofile($postcusdata ,$cus_id);
		if (count($groupdatedata)>0)
			{
				$this->session->set_flashdata('updatemessage',"Company profile updated successfully");
				 redirect('user/edit');
				 
			}else{
				$this->session->set_flashdata('updateerror',"Something went wrong Updated");
				 redirect('user/dashboard');
			}
		$this->load->view('html/footer');
		$this->load->view('html/header');
	 }
    }
	public function email_check($str)
	{
		$cond = $str;
	    $this->load->model('groups_model');
		$result = $this->groups_model->get_email_exists($cond);
		///echo $this->db->last_query();exit;
		if ( count($result) > 0)
		{
			///echo 'OPPPS';exit;
			$this->form_validation->set_message('email_check', 'E-mail already exists.Please use another email.');
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	public function username_check($str)
	{
		$cond = array($str);
		 $this->load->model('groups_model');
		$result = $this->groups_model->get_user_exists($cond);
		if ( count($result) > 0)
		{
			$this->form_validation->set_message('username_check', 'Username already exists.Please use another Username.');
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	public function logout()
	{
		$userinfo = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($userinfo );exit;
		$this->session->unset_userdata($userinfo);
		$this->session->sess_destroy();
		///$this->session->set_flashdata('logout',"User logged out sucessfully!!");
		redirect('user/login');
	}
	public function servicequotepdf()
	{

		$groupdatelognid = $this->session->userdata('userdetails');
		if($this->uri->segment(3)!='')
		{
		$quote_id = base64_decode($this->uri->segment(3));
		} else {
		echo 'Invalid URL';exit;
		}
		$quote_details =$this->users_model->getquote($quote_id);
		$this->load->view('user/servicequote',$quote_details);
	

	}
	public function pdf()
	{
		$path = rtrim(FCPATH,"/");
		////$this->load->library('pdf');
	
		
		//echo '<pre>';print_r($result);
		//exit;
		if($this->uri->segment(3)!='')
		{
			$quote_id = base64_decode($this->uri->segment(3));
		} else {
			echo 'Invalid URL';exit;
		}
		if($this->uri->segment(4)!='')
		{
			$service = 1;
		} else {
			$service = 0;
		}
		$quote_details =$this->users_model->getquote($quote_id);
		$file_name=$quote_id.'.pdf';

		$result['page_title'] = 'Hello world'; // pass data to the view
		$pdfFilePath = $path."/assets/downloads/quotes/".$file_name;

		///$pdfFilePath = str_replace("/","\"," $pdfFilePath");
		//echo $pdfFilePath;exit;            

		ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		///echo '<pre>';print_r($quote_details);exit;
		if($service == 0)
		{
			$html = $this->load->view('user/printquote',$quote_details, true);
		} else {
			$html = $this->load->view('user/servicequote',$quote_details, true);
		}
		///$html = $this->load->view('cart/print', $result, true); // render the view into HTML
		/////$html = $this->load->view('cart/print', $result, true); // render the view into HTML
		//echo $html;exit;
		$stylesheet1 = file_get_contents(base_url('assets/css/bootstrap.min.css')); // external css
		//$stylesheet6 = file_get_contents('http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic');
		require FCPATH.'vendor/autoload.php';
		$pdf = new mPDF();
		///$pdf = $this->pdf->load();
		
		$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		//$pdf->WriteHTML($stylesheet1,1);

		//$pdf->WriteHTML($stylesheet6,6);
		///$pdf->setAutoBottomMargin = 'stretch';
		//$pdf->WriteHTML('<tocentry content="Letter portrait" /><p>This should print on an Letter sheet</p>');
		$pdf->SetDisplayMode('fullpage');
		$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

		//echo $html;exit;
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		redirect("assets/downloads/quotes/".$file_name); 


	}

}
