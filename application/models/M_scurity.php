<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_scurity extends CI_Model{
	public function scurity(){
    	$username = $this->session->userdata('user');
    	if(empty($user1)){
    		$this->session->sess_destroy();
    		redirect('login');
    	}
    }	
}