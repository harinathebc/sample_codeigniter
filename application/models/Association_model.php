<?php 
class Association_model extends CI_Model {
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
	
	function getassociationprofile($association_id)
    {
		$this->db->select('*')->from('associations');
		$this->db->where('association_id',$association_id);
        return $this->db->get()->row_array();
	}
	function updateassocprofile($data,$ass_id)
	{
		$this->db->where('association_id', $ass_id);
		return $this->db->update('associations', $data);
	}
	
	function getgroupdata($id)
	{
		$this->db->select('*')->from('groups');
		$this->db->where('group_id',$id);
        return $this->db->get()->row_array(); 
	}
	function geteditgroupdata($id)
    {
		$this->db->select('*')->from('groups');
		$this->db->where('group_id',$id);
        return $this->db->get()->row_array();
	}
	function deletegroup($id)
	{
		$sql1="UPDATE groups SET status ='".$id['status']."'WHERE group_id = '".$id['id']."'";
		return $this->db->query($sql1);
	}
	
	
	function createcustomersendemail($email,$data){
	
		$sql1="UPDATE customers SET reg_email_Sent ='".$data."'WHERE email = '".$email."'";
		return $this->db->query($sql1);
	}
	function addproducts($data){
		$this->db->insert('products', $data);
		return $insert_id = $this->db->insert_id();
	 
	}
	function get_skuid_exists($skuid){
		//echo '<pre>';print_r($skuid);exit;
		$this->db->select('*')->from('products');
		$this->db->where('sku_id',$skuid);
		return $this->db->get()->row_array();
	 
	}
	function getproductdata($id,$skuid){
		$this->db->select('*')->from('products');
		$this->db->where('product_id',$id);
		$this->db->where('sku_id',$skuid);
		return $this->db->get()->row_array();
	}
	function editproducts($data){
		//echo '<pre>';print_r($data);exit;
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('sku_id', $data['sku_id']);
		return $this->db->update('products', $data);
	}
	function getproductedit($id,$skuid){
		$this->db->select('*')->from('products');
		$this->db->where('product_id', $id);
		$this->db->where('sku_id', $skuid);
        return $this->db->get()->row_array();
	}
	function listorders(){
		$this->db->select('*')->from('orders');
		$this->db->join('customers', 'customers.group_id = orders.group_id', 'left');//
		$this->db->join('groups', 'groups.group_id = orders.group_id', 'left');//
		return $this->db->get()->result_array();

	}
	function getcusomerdata($cust_id){
		//echo '<pre>';print_r($cust_id);exit;
		$this->db->select('*')->from('customers');
		$this->db->where('cust_id',$cust_id);
        return $this->db->get()->row_array(); 
	}
	function getemployers(){
		$this->db->select('*')->from('customers');
		$this->db->join('groups', 'groups.group_id = customers.group_id', 'left');//
		return $this->db->get()->result_array(); 
	}
	function deactivateprodcut($id,$status){
		$sql1="UPDATE products SET status ='".$status."'WHERE product_id = '".$id."'";
		return $this->db->query($sql1); 
	}
	function addemployee($empdata){
		$this->db->insert('customers', $empdata);
		return $insert_id = $this->db->insert_id();
	}
	function allproducrsforsponership(){
		$this->db->select('*')->from('products');
		return $this->db->get()->result_array();
	}
	function associationsponser($sponserdata){
		$this->db->insert('product_sponsership', $sponserdata);
		return $insert_id = $this->db->insert_id();
	}	
		
}
?>
