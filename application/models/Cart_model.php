<?php 
class Cart_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->database();
	}
	function retrieve_products($group_id) 
	{

		$this->db->select('products.*,product_sponsorship.sponsorship_amount')->from('products');
		$this->db->where('products.status', 1); // Select where id matches the posted id
		$this->db->join('product_sponsorship', 'product_sponsorship.product_id = products.product_id AND group_id ='.$group_id, 'left');
		return $this->db->get()->result_array();
		//return $query->result_array(); // Return the results in a array.
	}
	function validate_add_cart_item(){

		$userdetails = $this->session->userdata('userdetails');
		$group_id = $userdetails['group_id'];
		$id = $this->input->post('product_id'); // Assign posted product_id to $id
		$cty = $this->input->post('quantity'); // Assign posted quantity to $cty

		$this->db->select('products.*,product_sponsorship.sponsorship_amount');
		$this->db->where('products.product_id', $id); // Select where id matches the posted id
		$this->db->join('product_sponsorship', 'product_sponsorship.product_id = products.product_id AND group_id ='.$group_id, 'left');
		$query = $this->db->get('products', 1);

		///$this->db->where('product_id', $id); // Select where id matches the posted id
		///echo $id.'---'.$cty;exit;
		///$query = $this->db->get('products', 1); // Select the products where a match is found and limit the query by 1
		// Check if a row has matched our product id
		if($query->num_rows() > 0){
			// We have a match!
			foreach ($query->result() as $row)
			{
			// Create an array with product information
			$data = array(
			'id'      => $id,
			'qty'     => $cty,
			'price'   => $row->price-$row->sponsorship_amount,
			'name'    => $row->product_name,
			'discount' => $row->sponsorship_amount
			);
			// Add the data to the cart using the insert function that is available because we loaded the cart library
			$this->cart->insert($data); 
			return TRUE; // Finally return TRUE
			}

		}else{
			// Nothing found! Return FALSE! 
			return FALSE;
		}
	}
	function validate_update_cart()
	{

		// Get the total number of items in cart
		$total = $this->cart->total_items();
		//echo  $total;exit;
		// Retrieve the posted information
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		//echo '<pre>';print_r($item);print_r($qty);exit;
		// Cycle true all items and update them
		for($i=0;$i < count($item);$i++)
		{
		// Create an array with the products rowid's and quantities. 
		$data = array(
		'rowid' => $item[$i],
		'qty'   => $qty[$i]
		);
		///echo '<pre>';print_r($data);exit;
		// Update the cart with the new information
		$this->cart->update($data);
	}
}

        // Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('orders', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data)
	{
		$this->db->insert('order_items', $data);
	}



 	
		
		
}
?>
