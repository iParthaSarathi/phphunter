<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model extends CI_Model{

	function __construct(){
        parent::__construct();
    } 

    //check email validation
  function usernameValidChk($postData){
    $response = array();
    if($postData['username']){
 
      // Select record here you can use your complex 1 line code  and return result to controller lets go to the controller
      $this->db->select('*');
      $this->db->where('username', $postData['username']);
      $q = $this->db->get('users');
      $response = $q->num_rows();
 
    }
 
    return $response;
  }


}
?>