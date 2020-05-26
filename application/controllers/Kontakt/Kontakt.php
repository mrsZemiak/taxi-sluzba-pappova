<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakt extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kontakt/Kontakt_model");
	}

	public function index()
	{
		$data['title']="Kontakt";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('kontakt/kontakt');
		$this->load->view('stuffs/footer.php');
	}

}
?>
