<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function  __construct()
  {
     parent::__construct();
        //load model
  $this->load->model("model");
  $this->load->helper('form');
  $this->load->helper('cookie');
  }
	public function index()
	{
		$this->load->view('welcome_message');

		}

			public function usernameChk()
	{
		  // POST data
	  $postData =$this->input->post();
	  // get data
	  if ($postData==null) {
	  	redirect(base_url());
	  }else{
	  	//in this controller when data post with ajax it refresh and it generate a new valu in every post 
	  	   $res = $this->model->usernameValidChk($postData); //data is fetched and sented to the model
	  	   $data['csrf_hash'] = $this->security->get_csrf_hash(); // after along journey when data came to controller  just reload  security hash value
	  	   $reponse = array( //put that value in a array and <=====sent it as a response
                'csrfName' => $this->security->get_csrf_token_name(),
                'csrfHash' => $this->security->get_csrf_hash()
                );
	  	    $reponse['message'] = $res ;  //and dont forget to take your original response  okk lets go 
	      echo json_encode($reponse);
	  }
 
	}
}
