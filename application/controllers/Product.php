<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->model('cart_model');
		$this->load->library(array('form_validation','session')); 
        $this->load->helper(array('url','html','form')); 
		}
	public function lists()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==1)
			{   
				$this->load->view('html/header');
				$this->load->model('product_model');
				$data['productlist']= $this->product_model->listproducts();
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('product/list',$data);
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
	public function delproduct()
	{
		if($this->session->userdata('userdetails'))
		{
			$groupdatelognid = $this->session->userdata('userdetails');
			if($groupdatelognid['role_id']==1)
			{
			    $this->load->view('html/header');
				$code = $_GET['id'];
				$arr = explode('__',$code);
				$id = base64_decode($arr[0]);
				$status = base64_decode($arr[1]);
				if($status==1){
					$status=0;
				}else{
					$status=1;
				}
				$this->load->model('product_model');
				$productstatus= $this->product_model->deleteproduct($id,$status);
				//echo $this->db->last_query();exit;
				//echo '<pre>';print_r($productstatus);exit;
				if (count($productstatus)>0)
					{
						$this->session->set_flashdata('updatemessage',"Product Sucessfully Activate / Deactivate");
						 redirect('product/lists');
						 
					}else{
						$this->session->set_flashdata('updateerror',"Something went wrong in Deleting process ");
						redirect('product/lists');
					}
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
	public function add()
	{
		$this->load->view('html/header');
		$this->load->view('product/add');
		$this->load->view('html/footer');
	}
	
		
	public function addpost()
	{
		   
			$this->load->view('html/header');
			$post = $this->input->post();		  
			//echo '<pre>';print_r($post);exit;
		    $this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('productname', 'productname', 'required');
			$this->form_validation->set_rules('skuid', 'skuid', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('price', 'price', 'required|integer');
			$this->form_validation->set_rules('shortdescription', 'shortdescription', 'required');
			$this->form_validation->set_rules('valididityperiod', 'valididityperiod', 'required');

			if ($this->form_validation->run() == FALSE) {
				//echo '<pre>';print_r($post);
				$data['error'] = validation_errors();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('product/add',$data);
				$this->load->view('html/footer');
			}else{
				$post = $this->input->post();
				//echo '<pre>';print_r($post);exit;
				move_uploaded_file($_FILES['image']['tmp_name'], "assets/products/" . $_FILES['image']['name']);
				$addproduct=array(
					'product_name'=>$post['productname'],
					'sku_id'=>$post['skuid'],
					'description'=>$post['description'],
					'price'=>$post['price'],
					'short_desc'=>$post['shortdescription'],
					'status'=>1,
					'category_id'=>1,
					'created_at'=>date("Y-m-d h:i:s"),
					'valididty_period'=>$post['valididityperiod'],
					'image'=>$_FILES['image']['name']
				);
				//echo'<pre>';print_r($addproduct);exit;
				$this->load->model('product_model');
				$details=$this->product_model->addproduct($addproduct);
				//echo '<pre>';print_r($details);exit;
				if (count($details)>0)
					{
						$this->session->set_flashdata('addproduct',"Sucessfully product Added");
						 redirect('product/add');
						 
					}else{
						$this->session->set_flashdata('adderror',"something went wrong in product adding  process!");
						redirect('product/add');
					}
				
			}	
	}
	public function view()
	{
		$userdetails = $this->session->userdata('userdetails');
		$data['products'] = $this->cart_model->retrieve_products($userdetails['group_id']); 
		///echo $this->db->last_query();exit;
		$data['content'] = 'cart/products';
		///echo '<pre>';print_r($data);exit;
		$this->load->view('html/header');
		$this->load->view('product/view', $data);
		$this->load->view('html/footer');
	}
	
	public function edit()
	{
		$this->load->view('html/header');
		$id = base64_decode($_GET['id']);
		$this->load->model('product_model');
		$data['productdata']= $this->product_model->getproductedit($id);
		//echo $this->db->last_query();exit;
		//echo '<pre>';print_r($data);exit;
		$this->load->view('product/editproduct',$data);
		$this->load->view('html/footer');
		
	}
	public function editproductpost()
	{
			$this->load->view('html/header');
		    $this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('productname', 'productname', 'required');
			$this->form_validation->set_rules('skuid', 'skuid', 'required');
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('price', 'price', 'required|integer');
			$this->form_validation->set_rules('shortdescription', 'shortdescription', 'required');
			$this->form_validation->set_rules('valididityperiod', 'valididityperiod', 'required');

			if ($this->form_validation->run() == FALSE) {
				$post = $this->input->post();
				//echo '<pre>';print_r($post);
				$this->load->model('product_model');
				$data['productdata']= $this->product_model->getproductedit($post['productid']);
				$data['error'] = validation_errors();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('product/editproduct',$data);
				$this->load->view('html/footer');
				
			}else{
				$post = $this->input->post();
				//echo '<pre>';print_r($post);
				$editproduct=array(
					'product_id'=>$post['productid'],
					'product_name'=>$post['productname'],
					'sku_id'=>$post['skuid'],
					'description'=>$post['description'],
					'price'=>$post['price'],
					'short_desc'=>$post['shortdescription'],
					'status'=>1,
					'category_id'=>$post['categoryid'],
					'created_at'=>date("Y-m-d h:i:s"),
					'image'=>$_FILES['image']['name'],
					'valididty_period'=>$post['valididityperiod']
				);
				move_uploaded_file($_FILES['image']['tmp_name'], "assets/products/" . $_FILES['image']['name']);

				//echo '<pre>';print_r($editproduct);exit;
				$this->load->model('product_model');
				$details=$this->product_model->editproductsave($editproduct);
				//c
				if (count($details)>0)
					{
						//echo '<pre>';print_r($details);exit;
						$this->session->set_flashdata('editsuucess',"Sucessfully product Edited");
						//echo '<pre>';print_r('fdgdfg');exit;
						 redirect('product/lists');
						 
					}else{
						$this->session->set_flashdata('editerror',"something went wrong in Edit  process!");
						redirect('product/lists');
					}
			}	
	}
	
}
