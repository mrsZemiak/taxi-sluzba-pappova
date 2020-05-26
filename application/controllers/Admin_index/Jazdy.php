<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jazdy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 2)){
			redirect(site_url("Welcome"));
		}
		$this->load->model('Dashboard_admin/Jazdy_model');
	}

	public function index()
	{
		$data['title']="Jazdy";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$this->load->view('jazdy/jazdy.php', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function getData(){
		$fetch_data = $this->Jazdy_model->nacitajUdaje();
		$data = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->menoTaxikara;
			$sub_array[] = $row->menoZakaznika;
			$sub_array[] = $row->auto;
			$sub_array[] = $row->odkial;
			$sub_array[] = $row->kam;
			$sub_array[] = $row->datum_jazdy;
			$sub_array[] = $row->oblast;
			$sub_array[] = $row->cena;
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}

}
