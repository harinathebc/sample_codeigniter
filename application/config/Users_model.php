<?php 
class Users_model extends CI_Model {
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	function user_login($data){
		$sql = "SELECT * FROM customers WHERE email ='".$data['email']."' AND password ='".md5($data['password'])."'";
		///echo $sql;exit;
        return $this->db->query($sql)->row_array(); 
	}

	/*function user_login($data){
		$sql = "SELECT * FROM customers WHERE (email ='".$data['email']."' AND password ='".$data['password']."') OR (username ='".$data['email']."' AND password ='".$data['password']."')";
		//echo $sql;exit;
        return $this->db->query($sql)->row_array(); 
	} */
	function forgot_password($email){
		$this->db->select('*')->from('customers');
		$this->db->where('email', $email);
		return $this->db->get()->row_array();
	}
	function setpassuserinfo($email,$data){

		$sql1="UPDATE customers SET password ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	}
	function insertuser($data)
	{
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	function importcustomer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	function getpassuserinfo($data){
		$this->db->select('*')->from('customers');
		$this->db->where('cust_id', $data['cust_id']);
		$this->db->where('email', $data['email']);
        return $this->db->get()->row_array();
	}
	function update_password($reset_pass){
		$sql1="UPDATE customers SET password ='".md5($reset_pass['conpassword'])."'WHERE cust_id = '".$reset_pass['userid']."' AND email='".$reset_pass['email']."'";
		return $this->db->query($sql1);
	}
	function get_user_exists($cond=array())
    {
        $sql = 'SELECT * FROM customers WHERE email = ?';
        ///$this->db->query('select * from users where username = ? OR username = ?', $cond);
        return $this->db->query($sql,$cond)->result_array();
     }
	function getuser_data($cuser_email)
    {
		$this->db->select('*')->from('customers');
		$this->db->where('email',$cuser_email);
        return $this->db->get()->row_array();
	}
	function getcustomerlists($data)
    {	$gid=$data['group_id'];
		$this->db->select('*')->from('customers');
		$this->db->where('group_id',$gid);
	return $this->db->get()->result_array(); 		
	}
	function listorders($id){
		$this->db->select('*')->from('orders');
		$this->db->join('groups', 'groups.group_id = orders.group_id', 'left');
		$this->db->join('customers', 'customers.cust_id = orders.cust_id', 'left');//
		$this->db->where('groups.group_id', $id);
		$this->db->group_by('orders.order_id');
        return $this->db->get()->result_array();  
	}
	function orderlists(){
		$this->db->select('*')->from('orders');
		$this->db->join('groups', 'groups.group_id = orders.group_id', 'left');
		$this->db->join('customers', 'customers.cust_id = orders.cust_id', 'left');//
		$this->db->group_by('orders.order_id');
		$this->db->order_by('orders.purchase_date desc');
        return $this->db->get()->result_array();  
	}
	function employeelist(){
		$this->db->select('*')->from('customers');
		$this->db->join('groups', 'groups.group_id = customers.group_id', 'left');
		$this->db->order_by('customers.created_at desc'); 
		return $this->db->get()->result_array();  
	}
	function getcustomerdataedit($cid)
	{
		$this->db->select('*')->from('customers');
		$this->db->where('cust_id',$cid);
        return $this->db->get()->row_array(); 
	}
	function deletecustomerdata($id,$status)
	{
		$sql1="UPDATE customers SET status ='".$status."'WHERE cust_id = '".$id."'";
		return $this->db->query($sql1);
	}
	function getuserprofile($data)
    {	$cid=$data['cust_id'];
		$email=$data['email'];
		$this->db->select('*')->from('customers');
		$this->db->where('cust_id',$cid);
		$this->db->where('email',$email);
		return $this->db->get()->row_array(); 		
	}
	function getorderdetails($orderid)
    {	
		$this->db->select('*')->from('orders');
		$this->db->join('order_items', 'order_items.order_id = orders.order_id', 'left');
		$this->db->join('customers', 'customers.cust_id = orders.cust_id', 'left');
		$this->db->join('products', 'products.product_id = order_items.product_id', 'left');
		$this->db->where('orders.order_id',$orderid);
		return $this->db->get()->row_array(); 		
	}
	function getprintview($orderid)
    {	
		$this->db->select('*')->from('orders');
		$this->db->join('order_items', 'order_items.order_id = orders.order_id', 'left');
		$this->db->join('customers', 'customers.cust_id = orders.cust_id', 'left');
		$this->db->join('products', 'products.product_id = order_items.product_id', 'left');
		$this->db->where('orders.order_id',$orderid);
		return $this->db->get()->row_array(); 		
	}
	
	
	function getalluserprofile($cid)
    {	
		$this->db->select('*')->from('customers');
		$this->db->where('cust_id',$cid);
		return $this->db->get()->row_array(); 		
	}
	function updateuserprofile($data,$cust_id)
	{
		$this->db->where('cust_id', $cust_id);
		return $this->db->update('customers', $data);
	}
	function addcustomer($addcustomer)
	{
		$this->db->insert('customers', $addcustomer);
		return $this->db->insert_id();
	}
	function emailcheck($data){
		//echo '<pre>';print_r($data);exit;
		$this->db->select('*')->from('customers');
		$this->db->where('email',$data);
		return $this->db->get()->row_array();
	}
	function createcustomersendemail($email,$data){
		$sql1="UPDATE customers SET reg_email_Sent ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	}	
	
}
?>
