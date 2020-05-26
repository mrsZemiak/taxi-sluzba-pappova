<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NastavitAuto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 1)){
			redirect(site_url("Welcome"));
		}
		$this->load->model('Dashboard_admin/Auta_model');
	}

	public function index()
	{		$data['title'] = "Nastavte si auto";
		$data["error"] = "";
		$data["auta"] = $this->Auta_model->getRows();
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('zamestnanec_index/nastavitAuto.php', $data);
		$this->load->view('stuffs/footer.php');
		if($this->input->post('nastavit')){
			$_SESSION['auto']=$this->input->post('auto');
			redirect(site_url("Zamestnanci_index/Objednavky"));
		}
	}




}
