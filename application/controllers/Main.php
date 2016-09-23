<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->helper('url'); 
		$this->load->view('non_member/header');
		$this->load->view('non_member/index');
		$this->load->view('non_member/footer');
	}
}
