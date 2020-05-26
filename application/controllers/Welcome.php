<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Welcome_model");
	}

	public function index()
	{
		$data['title']="Taxi - O nás";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('welcome_message');
		$this->load->view('stuffs/footer.php');
	}

}
