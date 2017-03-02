<?php 
class Groups_model extends CI_Model {
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
	function groupcus_save($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	function group_save($data){
		$this->db->insert('groups', $data);
		return $insert_id = $this->db->insert_id();
	}
	function creategroupsendemail($id,$data){
	
		$sql1="UPDATE groups SET reg_email_Sent ='".$data."'WHERE group_id = '".$id."'";
		return $this->db->query($sql1);
	}	
	
	
	function getgroupdata($id)
    {
		$this->db->select('*')->from('groups');
		$this->db->where('group_id',$id);
        return $this->db->get()->row_array();
	}
	function getupdatedata($groupid)
    {
		
		$this->db->select('*')->from('groups');
		$this->db->join('customers', 'customers.group_id = groups.group_id', 'left'); //
		$this->db->where('groups.group_id',$groupid);
        return $this->db->get()->row_array();
	}
	function group_dataupdate($data,$where)
	{
		$this->db->where('group_id', $where);
		return $this->db->update('groups', $data);
	}
	

	function forgot_password($where){
		$this->db->select('*')->from('customers');
		$this->db->where('email', $where);
		return $this->db->get()->row_array();
	}
	function setpassuserinfo($email,$data){

		$sql1="UPDATE customers SET password ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	}
	
	function importcustomer($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	function getpassuserinfo($where){
		$this->db->select('*')->from('customers');
		$this->db->where('email', $where);
        return $this->db->get()->row_array();
	}
	function getgrouprofile($id){
		$this->db->select('*')->from('groups');
		$this->db->where('group_id', $id);
        return $this->db->get()->row_array();
	}
	function update_password($reset_pass){
		//echo "<pre>";print_r($reset_pass);exit;
		$sql1="UPDATE customers SET password ='".$reset_pass['conpassword']."'WHERE id = '".$reset_pass['userid']."' AND email='".$reset_pass['email']."'";
		return $this->db->query($sql1);
	}
	function get_user_exists($cond=array())
    {
        $sql = 'SELECT * FROM customers WHERE username = ?';
        ///$this->db->query('select * from users where username = ? OR username = ?', $cond);
        return $this->db->query($sql,$cond)->result_array();
     }
	 function createcustomersendemail($email,$data){
	
		$sql1="UPDATE customers SET reg_email_Sent ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	} 
	function groupsponser_save($data){
	
		$this->db->insert('product_sponsership', $data);
		return $insert_id = $this->db->insert_id();
	}
	function groupactivatedate($id,$date){
	
		$sql1="UPDATE customers SET reg_email_Sent ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	}
	function getallproducts(){
		$this->db->select('*')->from('products');
		return $this->db->get()->result_array();
	}
	function groupcustomer_save($data){
		$this->db->insert('customers', $data);
		return $insert_id = $this->db->insert_id();
	}
	 function get_email_exists($email)
    {
        $sql = "SELECT * FROM customers WHERE email ='".$email."'";
		//echo $sql;exit;
        return $this->db->query($sql)->row_array();
     }
	 function get_username_exists($username)
    {
        $sql = "SELECT * FROM customers WHERE username ='".$username."'";
		//echo $sql;exit;
        return $this->db->query($sql)->row_array();
     } 
	
	function getgroupsdata()
	{
		$this->db->select('*')->from('groups');
		return $this->db->get()->result_array(); 
	}
	function importgroups($data){
		//echo '<pre>';print_r($data);exit;
		$this->db->insert('groups', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function getInvoiceGroups($current_date)
	{
		$this->db->select('*')->from('groups');
		$this->db->where('DAY(go_live_date)', $current_date);
		return $this->db->get()->result_array(); 
		
	}
	
}
?>
