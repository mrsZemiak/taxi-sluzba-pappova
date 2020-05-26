<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Dashboard_admin/Admin_dashboard_model");
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 2)){
			redirect(site_url("Welcome"));
		}
	}

	public function index()
	{
		$data['title']="Admin Dashboard";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		//ziskanie sprav zo session
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$data['taxikar'] = json_encode($this->Admin_dashboard_model->taxikari_pocet_objednavok());
		$data['auto'] = json_encode($this->Admin_dashboard_model->auta());
		$data['ulica'] = json_encode($this->Admin_dashboard_model->ulice());
		$this->load->view('admin_index/admin_index', $data);

		$this->load->view('stuffs/footer.php');



	}

}
