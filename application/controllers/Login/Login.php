<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login/Login_model');
	}

	public function index()
	{		$data['title'] = "Prihlásenie";
		$data["error"] = "";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('login/login.php', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function validation(){
		$email = $_POST["email"];
		$heslo = $_POST["heslo"];

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('heslo','Heslo','required');

		if($this->form_validation->run()){
			if($this->Login_model->prihlasenie($email)){
				$porovnanie=$this->Login_model->prihlasenie($email);
				$hesloDB=$porovnanie["heslo"];
				if($this->encryption->decrypt($hesloDB)==$heslo){
//					print_r("Prihlásili sme sa!");
					$_SESSION["id"]=$porovnanie["id"];
					$_SESSION["email"]=$email;
					$_SESSION["role"]=$porovnanie["role"];
					if($_SESSION["role"]==2){
						redirect(site_url("Admin_index/Admin_index"));
					}elseif($_SESSION["role"]==1){
						if(!isset($_SESSION['auto'])){
							redirect((site_url("Zamestnanci_index/NastavitAuto")));
						}else {
							redirect(site_url("Zamestnanci_index/Objednavky"));
						}
					}else{
						redirect(site_url("Welcome"));
					}

				}else{
					$data["error"] = "Vaše údaje sa nezhodujú!";
					$this->load->view('stuffs/header.php',$data);
					$this->load->view('stuffs/nav.php');
					$this->load->view('login/login.php', $data);
					$this->load->view('stuffs/footer.php');
				}

			}else{
				$data["error"] = "Tento email neexistuje!";
				$this->load->view('stuffs/header.php',$data);
				$this->load->view('stuffs/nav.php');
				$this->load->view('login/login.php', $data);
				$this->load->view('stuffs/footer.php');
			}
		}else{
			$data["error"] = "";
			$this->load->view('stuffs/header.php',$data);
			$this->load->view('stuffs/nav.php');
			$this->load->view('login/login.php', $data);
			$this->load->view('stuffs/footer.php');
		}
	}
	public function odhlasenie(){
		$this->session->unset_userdata("id");
		$this->session->unset_userdata("email");
		$this->session->unset_userdata("role");
		if(isset($_SESSION['auto'])){
			$this->session->unset_userdata("auto");
		}
		redirect(site_url("Welcome"));
	}
}
