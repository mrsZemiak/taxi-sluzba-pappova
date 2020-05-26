<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jazdy extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 1)){
			redirect(site_url("Welcome"));
		}
		$this->load->model('Dashboard_zamestnanec/Jazdy_model');
	}
	public function index()
	{

		$data['title'] = 'Zoznam objednávok';
		$data['suma'] =$this->Jazdy_model->getPeniaze($_SESSION['id']);
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('zamestnanec_index/jazdy', $data);
		$this->load->view('stuffs/footer.php');
	}
	public function getData(){
		$fetch_data = $this->Jazdy_model->nacitajUdaje($_SESSION['id']);
		$data = array();
		foreach ($fetch_data as $row){

			$sub_array = array();
			$sub_array[] = $row->odkial;
			$sub_array[] = $row->kam;
			$sub_array[] = $row->cena." €";
			$sub_array[] = $row->datum;
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
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
