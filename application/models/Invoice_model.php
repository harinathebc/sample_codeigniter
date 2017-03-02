<?php 
class Invoice_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->database();
		
	}
	function getordersbyGroupId($group_id,$last_month,$today)
	{
		$this->db->select('*')->from('orders');
		$this->db->where('group_id',$group_id);
		$this->db->where('DATE(purchase_date) >=',$last_month);
		$this->db->where('DATE(purchase_date) <=',$today);
		return $this->db->get()->result_array();
	}
	function addinvoice($data)
	{
		$this->db->insert('invoices', $data);
		return $invoice_id = $this->db->insert_id();
	}
	function updateinvoice($data,$where)
	{
		$this->db->where($where);
		$this->db->update('invoices', $data);
	}
	function checkInvoice($group_id,$today)
	{
		$this->db->select('*')->from('invoices');
		$this->db->where('group_id',$group_id);
		$this->db->where('DATE(date_of_invoice) =',$today);
		return $this->db->get()->result_array();	
	}
	function listinvoices($group_id)
	{
		$this->db->select('*')->from('invoices');
		$this->db->where('group_id',$group_id);
		return $this->db->get()->result_array();	
	}
	function getInvoiceDetails($invoice_id)
	{
		$this->db->select('*')->from('invoices');
		$this->db->where('invoice_id',$invoice_id);
		return $this->db->get()->row_array();	
	}
}
?>
