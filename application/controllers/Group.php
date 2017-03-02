<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->library(array('form_validation','session')); 
        $this->load->helper(array('url','html','form')); 
		}
	public function index()
	{
		$this->load->view('index');
		$this->load->view('html/footer');
		$this->load->view('html/header');
		
	}
	public function register()
	{
		$this->load->view('html/header');
		$this->load->view('group/register');
		$this->load->view('html/footer');
		
	}
	public function register1()
	{
		$this->load->view('html/header');
		$this->load->view('group/groupregisterbankup');
		$this->load->view('html/footer');
		
	}
	public function save()
	{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
			$this->form_validation->set_rules('organizationid', 'organizationid', 'required');
			$this->form_validation->set_rules('groupname', 'groupname', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('displayname', 'displayname', 'required');
			$this->form_validation->set_rules('notes', 'notes', 'required');
			$this->form_validation->set_rules('accountnumber', 'accountnumber', 'required');
			$this->form_validation->set_rules('language', 'language', 'required');
			$this->form_validation->set_rules('supportemail', 'supportemail', 'required|valid_email');
			$this->form_validation->set_rules('technicalcontactemail', 'technicalcontactemail', 'required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$data['form1_errors'] = validation_errors();
				//echo '<pre>';print_r($data);
				$this->load->view('groupregister',$data);
				$this->load->view('html/header');
				$this->load->view('html/footer');
				
			}else{
				$post = $this->input->post();
				//echo '<pre>';print_r($post);exit;
				$this->load->model('groups_model');
				$emaildata=$this->groups_model->emailcheck($post['email']);
					if (count($emaildata) >0)
					{
						$this->session->set_flashdata('emailerror',"Email id already exits");
						redirect('group/register');
			
					}else{
						$postgropvalue=array(
						'group_name'=>$post['groupname'],
						'organization_id'=>$post['organizationid'],
						'displayname'=>$post['displayname'],
						'description'=>$post['description'],
						'notes'=>$post['notes'],
						'account_number'=>$post['accountnumber'],
						'language'=>$post['language'],
						'support_email'=>$post['supportemail'],
						'contact_email'=>$post['technicalcontactemail'],
						'status'=>1,
						'created_at'=>date("Y-m-d h:i:s"),
						'created_by'=>'admin',
						'reg_email_Sent'=>0,
						);
						$this->load->model('groups_model');
						$groupdata=$this->groups_model->group_save($postgropvalue);
						//echo '<pre>';print_r($groupdata);exit;
						$postcusvalue = array(
						'group_id'=>$groupdata,
						'role_id'=>2,
						'firstname'=>$post['firstname'],
						'lastname'=>$post['lastname'],
						'email'=>$post['email'],
						'password'=>md5($post['password']),
						'gender'=>$post['gender'],
						'status'=>1,
						'created_at'=>date("Y-m-d h:i:s"),
						'created_by'=>$groupdata,
						'reg_email_Sent'=>0,
						);
						$customdata=$this->groups_model->groupcus_save($postcusvalue);
						if ((count($groupdata)>0) && (count($customdata)>0))
							{
								$this->load->library('email');
								$this->email->from('admin@mew.com', 'MEW');
								$this->email->to($post['email']);
								$this->email->subject('MEW - Create customer');
								$html = "This is Your Email ID :".$post['email']." and Password : ".$post['password']."check your login details";
								//echo $html;exit;
								$this->email->message($html);
								if($this->email->send())
								{
									echo 'Sent Mail';
									$this->load->model('groups_model');
									$emailsendcus=$this->groups_model->createcustomersendemail($post['email'],1);
										if (count($emailsendcus)>0)
										{
											echo "email flage changed";
										}else {
											echo "error in email sent";
										}
								} 
								$this->session->set_flashdata('sucessmessage',"Sucessfully  group Created");
								redirect('group/register');
								 
							}else {
								$this->session->set_flashdata('createerror',"Something went wrong");
								redirect('group/register');
							}
					
						}
			}
	}
	public function profile()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			//echo '<pre>';print_r($groupdatelognid);exit;
			if($groupdatelognid['role_id']==2){
				$this->load->view('html/header');
				$id=$groupdatelognid['cust_id']; 
				$this->load->model('groups_model');
				$data['groupprofiledata'] = $this->groups_model->getgroupdata($id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('groupprofile',$data);
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
	public function creation()
	{	
		$post = $this->input->post();
		echo '<pre>';print_r($post);
		$postgroupvalue = array(
				'group_name'=>$post['corpname'],
				'organization_id'=>$post['organizationid'],
				'displayname'=>$post['displayname'],
				'description'=>$post['description'],
				'notes'=>$post['notes'],
				'account_number'=>$post['accountnumber'],
				'language'=>$post['language'],
				'support_email'=>$post['supportemail'],
				'contact_email'=>$post['techemail'],
				'reg_email_sent'=>0,
				'status'=>1,
				'created_at'=>date("Y-m-d h:i:s")
				);
		$this->load->model('groups_model');
		$groupdata=$this->groups_model->group_save($postgroupvalue);
		if(count($groupdata)>0)
		{
		$this->session->set_userdata('groupid',$groupdata);
		//echo '<pre>';print_r($groupdata);exit;
		$this->load->library('email');
		$this->email->from('admin@mew.com', 'MEW');
		$this->email->to($post['techemail']);
		 $this->email->cc('harinath.tavva@ebcdata.com'); 
		$this->email->subject('MEW - Create Group');
		$html = "This is sample email group sucessfully created Group Name :".$post['corpname']." and Account number is : ".$post['accountnumber']."check your details";
		//echo $html;exit;
		$this->email->message($html);
		if($this->email->send())
		{
			echo 'Sent Mail';
			$this->load->model('groups_model');
			$emailsendgroup=$this->groups_model->creategroupsendemail($groupdata,1);
				if (count($emailsendgroup)>0)
				{
					echo "email flage changed";
				}else {
					echo "error in email sent";
				}
		} 
		}
		$result = array('success' => 'Sucessfully Group creadted'); 
        header('Content-Type: application/json');
        echo json_encode( $result);

	}
	public function customer_save()
	{	
		$post = $this->input->post();
		$groupid = $this->session->userdata('groupid');
		//echo '<pre>';print_r($groupid);
		//echo '<pre>';print_r($post);exit;
		$cusvalue = array(
		'role_id'=>2,
		'group_id'=>$groupid,
		'firstname'=>$post['firstname'],
		'lastname'=>$post['lastname'],
		'username'=>$post['username'],
		'email'=>$post['email'],
		'password'=>md5($post['password']),
		'gender'=>$post['gender'],
		'status'=>1,
		'created_at'=>date("Y-m-d h:i:s"),
		'created_by'=>$groupid,
		'reg_email_Sent'=>0,
		);
		$this->load->model('groups_model');
		$customdata=$this->groups_model->groupcus_save($cusvalue);
		if (count($customdata)>0)
		{
		//echo '<pre>';print_r($customdata);exit;
		$this->load->library('email');
		$this->email->from('admin@mew.com', 'MEW');
		$this->email->to($post['email']);
		$this->email->subject('MEW - Create customer');
		$html = "This is Your Email ID :".$post['email']." and Password : ".$post['password']."check your login details";
		//echo $html;exit;
		$this->email->message($html);
		if($this->email->send())
		{
			echo 'Sent Mail';
			$this->load->model('groups_model');
			$emailsendcus=$this->groups_model->createcustomersendemail($post['email'],1);
				if (count($emailsendcus)>0)
				{
					echo "email flage changed";
				}else {
					echo "error in email sent";
				}
		} 
		}
		$result = array('success' => 'Sucessfully customer creadted'); 
        header('Content-Type: application/json');
        echo json_encode( $result);
	}
	public function sponseramount()
	{	
		$post = $this->input->post();
		$groupid = $this->session->userdata('groupid');
		//echo '<pre>';print_r($groupid);
		echo '<pre>';print_r($post);
		$this->load->model('groups_model');
		$products=$this->groups_model->getallproducts();
		foreach($products as $product){
			//echo '<pre>';print_r($product);
			$sponsershipdata=array(
			'product_id'=>$product['product_id'],
			'group_id'=>$groupid,
			'sponsership'=>$post['sponseramount'],
			'status'=>1
			);
			$this->load->model('groups_model');
			$result=$this->groups_model->groupsponser_save($sponsershipdata);
		}
		 $groupativationdate=array(
			'go_live_date'=>$post['activatedate'],
			'group_id'=>$groupid
			);
			$this->load->model('groups_model');
			$groupactivate=$this->groups_model->groupactivatedate($groupativationdate);
			if (count($result)>0 && count($groupactivate)>0)
			{
			$result = array('success' => 'Sucessfully activate date inserted'); 
			header('Content-Type: application/json');
			echo json_encode( $result);
		 
			}
		
	}
	public function groupedit()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==2){
				$this->load->view('html/header');
				$gid = base64_decode($_GET['id']);
				$this->load->model('groups_model');
				$data['groupprofile'] = $this->groups_model->getgrouprofile($gid);
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('group/groupprofile',$data);
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
	public function update()
	{
	 if($this->session->userdata('userdetails'))
	 {
		$groupdatelognid = $this->session->userdata('userdetails');
		if($groupdatelognid['role_id']==2)
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('organizationid', 'organizationid', 'required');
			$this->form_validation->set_rules('groupname', 'groupname', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('displayname', 'displayname', 'required');
			$this->form_validation->set_rules('notes', 'notes', 'required');
			$this->form_validation->set_rules('accountnumber', 'accountnumber', 'required');
			$this->form_validation->set_rules('language', 'language', 'required');
			$this->form_validation->set_rules('supportemail', 'supportemail', 'required|valid_email');
			$this->form_validation->set_rules('technicalcontactemail', 'technicalcontactemail', 'required|valid_email');

			if ($this->form_validation->run() == FALSE) {
			$groupdate = $this->session->userdata('userdetails');
			//echo '<pre>';print_r($groupdate);exit;
			$id=$groupdate['group_id']; 
			$this->load->model('groups_model');
			$data['groupprofile'] = $this->groups_model->getgroupdata($id);
			$data['updaterror'] = validation_errors();
			$this->load->view('group/groupprofile',$data);
			$this->load->view('html/footer');
			$this->load->view('html/header');
			}else{
			$this->load->database();
			$post = $this->input->post();
			//echo '<pre>';print_r($post);exit;
			$groupid=$post['groupid'];
			$updategroupvalue=array(
				'group_id'=>$post['groupid'],
				'group_name'=>$post['groupname'],
				'organization_id'=>$post['organizationid'],
				'displayname'=>$post['displayname'],
				'description'=>$post['description'],
				'notes'=>$post['notes'],
				'account_number'=>$post['accountnumber'],
				'language'=>$post['language'],
				'support_email'=>$post['supportemail'],
				'contact_email'=>$post['technicalcontactemail'],
				'status'=>1,
				'created_at'=>date("Y-m-d h:i:s"),
				'created_by'=>$post['groupid'],
				);
			$this->load->model('groups_model');
			$groupdatedata=$this->groups_model->group_dataupdate($updategroupvalue,$groupid);
			//echo $this->db->last_query();
			$data= $this->groups_model->getupdatedata($groupid);
			//echo $this->db->last_query();exit;
			if (count($groupdatedata)>0)
				{
					$this->session->set_flashdata('updatemessage',"Sucessfully Updated");
					//echo '<pre>';print_r($data);exit;
					 redirect('group/update');
					 
				}else{
					$this->session->set_flashdata('updateerror',"Somethind Wrong in Upadating Process");
					 redirect('group/update');
				}
		  }
		}else{
				$this->session->set_flashdata('perimisionserror',"You don't have permission to access Order's List");
				redirect('user/dashboard');
			}
	  }else{
		$this->session->set_flashdata('loginerror','Please login to continue');
        redirect('user/login');
	  }
	}
	public function verifyemail()
	{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);exit;
		$email=$post['verifyemail'];
		$this->load->model('groups_model');
		$result = $this->groups_model->get_email_exists($email);
		if(count($result)>0){
			echo "invalid";
		}else{
			echo "valid";
		}
	}
	public function verifyusername()
	{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);exit;
		$username=$post['verifyusername'];
		$this->load->model('groups_model');
		$result = $this->groups_model->get_username_exists($username);
		if(count($result)>0){
			echo "invalid";
		}else{
			echo "valid";
		}
	}
	public function import()
	{
		$this->load->view('importgroups');
		$this->load->view('html/header');
		$this->load->view('html/footer');
	}
	public function importgroups()
	{
		//echo "szasdas";exit;
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
					//echo "<pre>";print_r($arry);exit;
					$error=0;
					  foreach($arry as $key=>$fields)
						{
							
							$totalfields[] = $fields;	
							
							if(empty($fields[0])) {
								$data['errors'][]="OrganizationID id is required  Row Id is :  ".$key.'<br>';
								$error=1;
							}else if($fields[0]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[0]))
								{
								$data['errors'][]="OrganizationID can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[1])) {
								$data['errors'][]="Name is required Id is : ".$key.'<br>';
								$error=1;
							}else if($fields[1]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[1]))
								{
								$data['errors'][]="Name can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[2])) {
								$data['errors'][]="DisplayName is required Row Id is :  ".$key;
								$error=1;
							}else if($fields[2]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[2]))
								{
								$data['errors'][]="DisplayName can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[3])) {
								$data['errors'][]="Description is required Row Id is :  ".$key;
								$error=1;
							}else if($fields[3]!=''){
								$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\|=^?$%*)(_+-]*$/"; 
								if(!preg_match( $regex, $fields[3]))
								{
								$data['errors'][]='Description wont allow "  <> []  Row Id is: '.$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[4])) {
								$data['errors'][]="Notes is required Row Id is :  ".$key;
								$error=1;
							}else if($fields[4]!=''){
								$regex ="/^[ A-Za-z0-9_@.}{@#&`~\\|=^?$%*)(_+-]*$/"; 
								if(!preg_match( $regex, $fields[4]))
								{
								$data['errors'][]='Notes wont allow "  <> []  Row Id is: '.$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[5])) {
								$data['errors'][]="Accountnumbe is required Row Id is :  ".$key;
								$error=1;
							}else if($fields[5]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[5]))
								{
								$data['errors'][]="Accountnumbe can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[6])) {
								$data['errors'][]="Language is required Row Id is :  ".$key;
								$error=1;
							}else if($fields[5]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[6]))
								{
								$data['errors'][]="Language can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[7])) {
								$data['errors'][]="SupportContactEmail is required Row Id is : ".$key;
								$error=1;
							}else if($fields[5]!=''){
								$regex ="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
								if(!preg_match( $regex, $fields[7]))
								{
								$data['errors'][]="Please enter a valid SupportContactEmail address. For example johndoe@domain.com Row Id is ".$key.'<br>';
								$error=1;
								}
								
							}
							if(empty($fields[8])) {
								$data['errors'][]="TechnicalContactEmail is required Row Id is : ".$key;
								$error=1;
							}else if($fields[5]!=''){
								$regex ="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
								if(!preg_match( $regex, $fields[8]))
								{
								$data['errors'][]="Please enter a valid TechnicalContactEmail address. For example johndoe@domain.com Row Id is ".$key.'<br>';
								$error=1;
								}
								
							}
							if(empty($fields[9])) {
								$data['errors'][]="FirstName is required Row Id is : ".$key.'<br>';
								$error=1;
							}else if($fields[9]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[9]))
								{
								$data['errors'][]="FirstName  can only consist of alphanumaric, space and dot Row Id is: ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[10])) {
								$data['errors'][]="LastName is required Row Id is : ".$key.'<br>';
								$error=1;
							}else if($fields[10]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[10]))
								{
								$data['errors'][]="LastName can only consist of alphanumaric, space and dot Row Id is : ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[11])) {
								$data['errors'][]="Email is required with email id is : ".$key;
								$error=1;
							}else if($fields[11]!=''){
								$regex ="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
								if(!preg_match( $regex, $fields[11]))
								{
								$data['errors'][]="Please enter a valid email address. For example johndoe@domain.com  Id is ".$key.'<br>';
								$error=1;
								}else{
									$this->load->model('groups_model');
									$result = $this->groups_model->get_email_exists($fields[5]);
									if(count($result)>0){
									$data['errors'][]="Email id already exits .please use another email id  Id is ".$key.'<br>';
									$error=1;	
									}

								}
							}
							if(empty($fields[12])) {
								$data['errors'][]="Password is required with email id is : ".$key.'<br>';
								$error=1;
							}else if($fields[12]!=''){
								$regex ="/^[a-zA-Z0-9. ]+$/"; 
								if(!preg_match( $regex, $fields[12]))
								{
								$data['errors'][]="Password  can only consist of alphanumaric, space and dot: ".$key.'<br>';
								$error=1;
								}
							}
							if(empty($fields[13])) {
								$data['errors'][]= "Please select a gender value with email id is : ".$key.'<br>';
							}
							
						}
				}
					//echo '<pre>';print_r($data);exit;
					$this->load->view('importgroups',$data);
					$this->load->view('html/footer');
					$this->load->view('html/header');
				} 
				
				if(count($data['errors'])<=0){
				foreach($totalfields as $data){
								$importgroups=array(
									'organization_id'=>$data[0],
									'group_name'=>$data[1],
									'displayname'=>$data[2],
									'description'=>$data[3],
									'notes'=>$data[4],
									'account_number'=>$data[5],
									'language'=>$data[6],
									'support_email'=>$data[7],
									'contact_email'=>$data[8],
									'status'=>1,
									'created_at'=>date("Y-m-d h:i:s"),
									'created_by'=>1,
								);
								//echo '<pre>';print_r($importgroups);
								$this->load->model('groups_model');
								$importgroupsdata=$this->groups_model->importgroups($importgroups);
								//echo $this->db->last_query();
								//echo '<pre>';print_r($groupdata);exit;	
								$postgroupvalue = array(
								'group_id'=>$importgroupsdata,
								'role_id'=>2,
								'firstname'=>$data[9],
								'lastname'=>$data[10],
								'email'=>$data[11],
								'password'=>md5($data[12]),
								'gender'=>$data[13],
								'status'=>1,
								'created_at'=>date("Y-m-d h:i:s"),
								'created_by'=>$groupdata,
								'reg_email_Sent'=>0,
								);
						$customdata=$this->groups_model->groupcus_save($postgroupvalue);
						if ((count($importgroupsdata)>0) && (count($customdata)>0))
							{
								$this->load->library('email');
								$this->email->from('admin@mew.com', 'MEW');
								$this->email->to($data[11]);
								$this->email->subject('MEW - Create customer');
								$html = "This is Your Email ID :".$data[11]." and Password : ".$data[12]."check your login details";
								echo $html;
								$this->email->message($html);
								 if($this->email->send())
								 {
									 echo 'Sent Mail';
									 $this->load->model('groups_model');
									 $emailsendcus=$this->groups_model->createcustomersendemail($data[11],1);
									 if (count($emailsendcus)>0)
									 {
											 echo "email flage changed";
										}else {
											 echo "error in email sent";
										}
								 } 
							}								
					}
					$this->session->set_flashdata('sucessmessage',"Sucessfully  groups Imported");
					redirect('group/import');
				}
				
			}else{
				echo '<script>alert("Sory, this demo page only allowed .xlsx file under '.($limitSize/1000).' Kb!\nIf you want to try upload larger file, please download the source and try it on your own webserver.")</script>';
			}
			
	}
	public function add(){
		$this->load->view('addgroups');
		$this->load->view('html/header');
		$this->load->view('html/footer');
	}
	public function groupadd(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
			$this->form_validation->set_rules('organizationid', 'organizationid', 'required');
			$this->form_validation->set_rules('groupname', 'groupname', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('displayname', 'displayname', 'required');
			$this->form_validation->set_rules('notes', 'notes', 'required');
			$this->form_validation->set_rules('accountnumber', 'accountnumber', 'required');
			$this->form_validation->set_rules('language', 'language', 'required');
			$this->form_validation->set_rules('supportemail', 'supportemail', 'required|valid_email');
			$this->form_validation->set_rules('technicalcontactemail', 'technicalcontactemail', 'required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$data['form1_errors'] = validation_errors();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('addgroups',$data);
				$this->load->view('html/header');
				$this->load->view('html/footer');
				
			}else{
				$post = $this->input->post();
					//echo '<pre>';print_r($post);exit;
					$postgropvalue=array(
						'organization_id'=>$post['organizationid'],
						'group_name'=>$post['groupname'],
						'displayname'=>$post['displayname'],
						'description'=>$post['description'],
						'notes'=>$post['notes'],
						'account_number'=>$post['accountnumber'],
						'language'=>$post['language'],
						'support_email'=>$post['supportemail'],
						'contact_email'=>$post['technicalcontactemail'],
						'status'=>1,
						'created_at'=>date("Y-m-d h:i:s"),
						'created_by'=>1,
						'reg_email_Sent'=>0,
						);
						$this->load->model('groups_model');
						$groupdata=$this->groups_model->group_save($postgropvalue);
						//echo '<pre>';print_r($groupdata);exit;
						$postcusvalue = array(
						'group_id'=>$groupdata,
						'role_id'=>2,
						'firstname'=>$post['firstname'],
						'lastname'=>$post['lastname'],
						'email'=>$post['email'],
						'password'=>md5($post['password']),
						'gender'=>$post['gender'],
						'status'=>1,
						'created_at'=>date("Y-m-d h:i:s"),
						'created_by'=>$groupdata,
						'reg_email_Sent'=>0,
						);
						$customdata=$this->groups_model->groupcustomer_save($postcusvalue);
						if ((count($groupdata)>0) && (count($customdata)>0))
							{
								$this->load->library('email');
								$this->email->from('admin@mew.com', 'MEW');
								$this->email->to($post['email']);
								$this->email->subject('MEW - Create customer');
								$html = "This is Your Email ID :".$post['email']." and Password : ".$post['password']."check your login details";
								//echo $html;exit;
								$this->email->message($html);
								if($this->email->send())
								{
									echo 'Sent Mail';
									$this->load->model('groups_model');
									$emailsendcus=$this->groups_model->createcustomersendemail($post['email'],1);
										if (count($emailsendcus)>0)
										{
											echo "email flage changed";
										}else {
											echo "error in email sent";
										}
								} 
								$this->session->set_flashdata('sucessmessage',"Sucessfully  group Created");
								redirect('group/add');
								 
							}else {
								$this->session->set_flashdata('createerror',"Something went wrong");
								redirect('group/add');
							}
					
						
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
	public function email_check($str)
	{
		$cond = array($str);
	    $this->load->model('groups_model');
		$result = $this->groups_model->get_email_exists($cond);
		if ( count($result) > 0)
		{
			$this->form_validation->set_message('email_check', 'E-mail already exists.Please use another email.');
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	
	public function lists()
	{
		$groupdata = $this->session->userdata('userdetails');
		$this->load->model('groups_model');
		$data['allgroups']= $this->groups_model->getgroupsdata();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('listgroups',$data);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/footer');
		$this->load->view('html/header');
    }
}
