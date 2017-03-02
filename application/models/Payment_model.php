<?php 
class Payment_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->database();
	}
        // Insert order date with customer id in "orders" table in database.
	public function insert_paymentdetails($data)
	{
		$this->db->insert('payments', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
		
		
}
?>
