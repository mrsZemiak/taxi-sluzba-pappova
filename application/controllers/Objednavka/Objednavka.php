<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objednavka extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Objednavka/Objednavka_model');
	}

	public function index()
	{	$data['title'] = "Objednávka";
		$data["error"] = "";
		$data["cennik"]= $this->Objednavka_model->get_cennik();
		$data["oznamenie"]=false;
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('objednavka/objednavka', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function objednavka(){
		$odkial = $_POST["odkial"];
		$kam = $_POST["kam"];
		$cennik= $_POST["oblast"];
		$id = $_SESSION["id"];

		$this->form_validation->set_rules('odkial', 'Odkial', 'required|trim');
		$this->form_validation->set_rules('kam', 'Kam', 'required|trim');

		if($this->form_validation->run()){
				$this->Objednavka_model->nova_objednavka($odkial,$kam,$cennik,$id);

			$data["error"]="";
			$data["cennik"]= $this->Objednavka_model->get_cennik();
			$data["oznamenie"]=true;
			$this->load->view('stuffs/header.php',$data);
			$this->load->view('stuffs/nav.php');
			$this->load->view('objednavka/objednavka',$data);
			$this->load->view('stuffs/footer.php');

		}else{
			$data["error"]="";
			$data["cennik"]= $this->Objednavka_model->get_cennik();
			$data["oznamenie"]=false;
			$this->load->view('stuffs/header.php',$data);
			$this->load->view('stuffs/nav.php');
			$this->load->view('objednavka/objednavka',$data);
			$this->load->view('stuffs/footer.php');
		}

	}
}
