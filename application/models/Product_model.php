<?php 
class Product_model extends CI_Model {
	 public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
	 function listproducts(){
		$this->db->select('*')->from('products');
		return $this->db->get()->result_array(); 
	}
	function deleteproduct($id,$status)
	{
		$sql1="UPDATE products SET status ='".$status."'WHERE product_id = '".$id."'";
		return $this->db->query($sql1);
	}
	
}
?>
