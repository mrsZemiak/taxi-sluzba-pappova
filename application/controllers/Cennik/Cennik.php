<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cennik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Cennik/Cennik_model");
	}

	public function index()
	{
		$data['title'] = "Cenník jázd";
		$data['cennik'] = $this->Cennik_model->get_cena();
		$data['error'] = "";
		$this->load->view('stuffs/header.php', $data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('cennik/cennik');
		$this->load->view('stuffs/footer.php');
	}
	public function cennik(){

	$this->Cennik_model->get_cena();
	}
}
