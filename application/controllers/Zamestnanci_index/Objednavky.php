<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objednavky extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 1)){
			redirect(site_url("Welcome"));
		}
		$this->load->model('Dashboard_zamestnanec/Objednavky_model');
	}

	public function index()
	{		$data['title'] = "Objednávky";
		$data["error"] = "";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('zamestnanec_index/objednavky.php', $data);
		$this->load->view('stuffs/footer.php');
		if($this->input->post('prijat')){
			$id_objednavka=$this->input->post('objednavka');
			if($id_objednavka!=null){
				$this->Objednavky_model->prijatObjednavku($id_objednavka,$_SESSION['id'],$_SESSION['auto']);
				redirect(site_url("Zamestnanci_index/Jazdy"));
			}
		}
	}

	public function getObjednavky(){
		$data = $this->Objednavky_model->getObjednavky();
		foreach ($data as $row){
			$datum = $row->datum;
			$date = new DateTime($datum);
			$datum= $date->format('d.m.Y');
		echo '<div class="objednavka">
				<form method="post" action="">
					<input type="hidden" name="objednavka" value="'.$row->id.'">
					<input type="submit" class="objednavka-button" name="prijat" value="Prijať">
				</form>
				<h1><i class="fa fa-sort-numeric-asc"></i> '.$row->odkial.'</h1>
				<h1><i class="fa fa-sort-numeric-asc"></i> '.$row->kam.'</h1>
				<p>'.$datum.'</p>
			</div>';
		}

	}


}
