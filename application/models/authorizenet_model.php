<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorizenet_Model extends CI_Model { 
	
	public function __construct()
	{
        parent::__construct();
 	}
	
	public function setCredentials()
	{
        /*$this->db->select('*');
        $this->db->from($this->config->item('api_table'));
        $this->db->where('api_name','authorize.net');
        
        $query_result = $this->db->get();
        $result = $query_result->result();
	*/
        //echo $this->db->last_query(); 
	define("AUTHORIZENET_API_LOGIN_ID", '7Y96K5nhEz');
	define("AUTHORIZENET_TRANSACTION_KEY", '5fFp23SU8Y7CvG3h');
	define("AUTHORIZENET_SANDBOX", 'https://apitest.authorize.net/xml/v1/request.api');
echo AUTHORIZENET_API_LOGIN_ID;exit;
	}
}	

/* End of file */
