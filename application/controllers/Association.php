<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Association extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->library(array('form_validation','session')); 
        $this->load->helper(array('url','html','form')); 
		}
	public function profile()
	{
		
		$this->load->view('html/header');
		$associationdate = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($associationdate);exit;
		$association_id=$associationdate['association_id']; 
		$this->load->model('association_model');
		$data['associationdata'] = $this->association_model->getassociationprofile($association_id);
		//echo '<pre>';print_r($data);exit;
		//echo $this->db->last_query();
		$this->load->view('association/profileview',$data);
		$this->load->view('html/footer');
	}
	public function editprofile()
	{
		if($this->session->userdata('userdetails'))
		{
			$userdata = $this->session->userdata('userdetails');
			if($userdata['role_id']==1){
				$association =base64_decode( $_GET['id']);
				$this->load->view('html/header');
				$this->load->model('association_model');
				$data['associationdata'] = $this->association_model->getassociationprofile($association);
				$this->load->view('association/associationprofile',$data);
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
	public function update()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('controlname', 'controlname', 'required');
		$this->form_validation->set_rules('employeraccountname', 'employeraccountname', 'required');
		$this->form_validation->set_rules('asgaccountnumber', 'asgaccountnumber', 'required');
		$this->form_validation->set_rules('effectivedate', 'effectivedate', 'required');
		$this->form_validation->set_rules('golivedate', 'golivedate', 'required');
		$this->form_validation->set_rules('submissiontype', 'submissiontype', 'required');
		$this->form_validation->set_rules('loginmode', 'loginmode', 'required');
		$this->form_validation->set_rules('branding', 'branding', 'required');
		$this->form_validation->set_rules('theme', 'theme', 'required');
		$this->form_validation->set_rules('registrationcode', 'registrationcode', 'required');
		$this->form_validation->set_rules('remotestylesheeturl', 'remotestylesheeturl', 'required');
		$this->form_validation->set_rules('requirefullprofile', 'requirefullprofile', 'required');
		$this->form_validation->set_rules('autoeligility', 'autoeligility', 'required');
		$this->form_validation->set_rules('supportemail', 'supportemail','required|valid_email');
		$this->form_validation->set_rules('technicalcontactemail', 'technicalcontactemail','required|valid_email');

		if ($this->form_validation->run() == FALSE) {
		$assdatelognid = $this->session->userdata('userdetails');
		//echo '<pre>';print_r($assdatelognid);exit;
		$id=$assdatelognid['association_id'];
		$data['customer_update'] = validation_errors();
		$this->load->model('association_model');
		$data['associationdata'] = $this->association_model->getassociationprofile($id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('association/associationprofile',$data);
		$this->load->view('html/footer');
		$this->load->view('html/header');
		}else{
			$asspostdata = $this->input->post();
			$assdatelognid = $this->session->userdata('userdetails');
			//echo '<pre>';print_r($asspostdata);exit;
		
			$assdata= array(
			'association_id'=>$assdatelognid['association_id'],
			'control_name'=>$asspostdata['controlname'],
			'employer_name'=>$asspostdata['employeraccountname'],
			'asg_accountnumber'=>$asspostdata['asgaccountnumber'],
			'effective_date'=>$asspostdata['effectivedate'],
			'golive_date'=>$asspostdata['golivedate'],
			'submission_type'=>$asspostdata['submissiontype'],
			'login_mode'=>$asspostdata['loginmode'],
			'branding'=>$asspostdata['branding'],
			'theme'=>$asspostdata['theme'],
			'registration_code'=>$asspostdata['registrationcode'],
			'remotestylesheeturl'=>$asspostdata['remotestylesheeturl'],
			'requirefullprofile'=>$asspostdata['requirefullprofile'],
			'autoeligility'=>$asspostdata['autoeligility'],
			'supportemail'=>$asspostdata['supportemail'],
			'technicalemail'=>$asspostdata['technicalcontactemail'],
			'status'=>1,
			'created_at'=>date("Y-m-d h:i:s"),
			);
			
			//echo '<pre>';print_r($assdata);exit;
			$this->load->model('association_model');
			$assprofile=$this->association_model->updateassocprofile($assdata,$assdatelognid['association_id']);
			//echo $this->db->last_query();exit;
				if (count($assprofile)>0)
				{
					$this->session->set_flashdata('updatemessage',"Profile Sucessfully Updated!");
					redirect('association/profile');
				}else{
					$this->session->set_flashdata('updateerror',"Something went wrong in Profile Updating process!");
					redirect('association/profile');
				}
			
		}
	}
	
	
	public function groupedit()
	{
		$id =base64_decode($_GET['id']);
		$this->load->model('association_model');
		$data['groupdata']= $this->association_model->getgroupdata($id);
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('editgroup',$data);
		$this->load->view('html/footer');
		$this->load->view('html/header');
    }
	public function groupupdate()
	{
		$post = $this->input->post();
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
		$data['groupupdate'] = validation_errors();
		//echo '<pre>';print_r($data);
		$id=base64_decode($_GET['id']); 
		$this->load->model('association_model');
		$data['groupdata'] = $this->association_model->geteditgroupdata($id);
		$data['updaterror'] = validation_errors();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('editgroup',$data);
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
				 redirect('association/groups');
				 
			}else{
				$this->session->set_flashdata('updateerror',"something went wrong in updated process!");
				redirect('association/groups');
			}
		}
	}
	public function delgroup()
	{
		$code = $_GET['id'];
        $arr = explode('__',$code);
		echo $id = base64_decode($arr[0]);
		echo $status = base64_decode($arr[1]);
		if($status==1){
			$status=0;
		}else{
			$status=1;
		}
		//echo $status;exit;
		$data=array('id'=>$id,'status'=>$status);
		$this->load->model('association_model');
		$data= $this->association_model->deletegroup($data);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data);exit;
		if (count($data)>0)
			{
				$this->session->set_flashdata('updatemessage',"Group Sucessfully Deleted");
				 redirect('association/groups');
				 
			}else{
				$this->session->set_flashdata('updateerror',"Something went wrong in Deleting process ");
				 redirect('association/groups');
			}
		$this->load->view('html/footer');
		$this->load->view('html/header');
    }
	
	
	
	public function product()
	{
		$this->load->model('association_model');
		$data['allproducts']=$this->association_model->listproducts();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('listproduct',$data);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/footer');
		$this->load->view('html/header');
		
	}
	public function addproduct()
	{
		$this->load->view('addproduct');
		$this->load->view('html/footer');
		$this->load->view('html/header');
	}
	public function addproductpost()
	{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('productname', 'productname', 'required');
			$this->form_validation->set_rules('skuid', 'skuid', 'required|callback_skuid_check');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('price', 'price', 'required|integer');
			$this->form_validation->set_rules('shortdescription', 'shortdescription', 'required');
			$this->form_validation->set_rules('categry', 'categry', 'required');
			$this->form_validation->set_rules('validitytime', 'validitytime', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data['addproduct'] = validation_errors();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('addproduct',$data);
				$this->load->view('html/header');
				$this->load->view('html/footer');
				
			}else{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);exit;
		$addproduct=array(
						'product_name'=>$post['productname'],
						'sku_id'=>$post['skuid'],
						'description'=>$post['description'],
						'price'=>$post['price'],
						'short_desc'=>$post['shortdescription'],
						'status'=>1,
						'category_id'=>$post['categry'],
						'created_at'=>date("Y-m-d h:i:s"),
						'valididty_period'=>$post['validitytime']
		);
		$this->load->model('association_model');
		$addproducts=$this->association_model->addproducts($addproduct);
		if (count($addproducts)>0)
			{
				$this->session->set_flashdata('addproductmessage',"Sucessfully Product Added");
				//echo '<pre>';print_r('fdgdfg');exit;
				 redirect('association/product');
				 
			}else{
				$this->session->set_flashdata('adderror',"something went wrong in updated process!");
				redirect('association/product');
			}
			}
	}	
	
	
	public function productactivate()
	{
		$code = $_GET['id'];
        $arr = explode('__',$code);
		$id = base64_decode($arr[0]);
		$status = base64_decode($arr[1]);
		if($status==1){
			$status=0;
		}else{
			$status=1;
		}
		$this->load->model('association_model');
		$statuschages= $this->association_model->deactivateprodcut($id,$status);
		//echo $this->db->last_query();exit;
		if (count($statuschages)>0)
					{
						$this->session->set_flashdata('productstatus',"Sucessfully Staus Changed");
						//echo '<pre>';print_r('fdgdfg');exit;
						 redirect('association/product');
						 
					}else{
						$this->session->set_flashdata('editerror',"something went wrong in Edit  process!");
						redirect('association/product');
					}
		
	}
	public function orders()
	{
		$this->load->view('html/header');
		$this->load->model('association_model');
		$data['allorders']= $this->association_model->listorders();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('listorders',$data);
		$this->load->view('html/footer');
		
		
	}
	public function employer()
	{
		$this->load->model('association_model');
		$data['employers']= $this->association_model->getemployers();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('employer',$data);
		$this->load->view('html/footer');
		$this->load->view('html/header');
    }
	public function  addemployee(){
	$this->load->view('addemployee');
	$this->load->view('html/footer');
	$this->load->view('html/header');	
	}
	public function addemployeepost()
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
		$data['addemp_errors'] = validation_errors();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('addemployee',$data);
		$this->load->view('html/header');
		$this->load->view('html/footer');
		}else{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);
		$empdata= array(
			'group_id'=>1,
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
			'created_by'=>1,
			'reg_email_Sent'=>0
			);
		$this->load->model('association_model');
		$employeedata= $this->association_model->addemployee($empdata);
		//echo $this->db->last_query();
		if (count($employeedata)>0)
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
							$this->load->model('groups_model');
							$emailsendcus=$this->groups_model->createcustomersendemail($post['email'],1);
							if (count($emailsendcus)>0)
							{
								echo "Sucessfully email send";
							} else {
								echo "error in email sent";
							}
						}
				 $this->session->set_flashdata('addemp',"Sucessfully customer Created!");
				 redirect('association/addemployee');
			}else{
				$this->session->set_flashdata('emperror',"Something went wrong in customer creating process!");
				 redirect('association/addemployee');
			}
		}
	}
		
	public function sponsership()
	{ 	 
		$sponsership=$this->input->post('sponsership');
		$this->load->model('association_model');
		$employeedata= $this->association_model->allproducrsforsponership();
		echo json_encode($employeedata);
		
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
	public function skuid_check($str)
	{
		$cond = $str;
		//echo '<pre>';print_r($cond);
	    $this->load->model('association_model');
		$result = $this->association_model->get_skuid_exists($cond);
		///echo $this->db->last_query();exit;
		if ( count($result) > 0)
		{
			$this->form_validation->set_message('skuid_check', 'Sku Id already exists.Please use Sku Id.');
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	
	
}