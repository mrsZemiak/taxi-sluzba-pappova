<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registracia extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	$this->load->model('Registracia/Registracia_model');
	}

	public function index()
	{
		$data['title'] = "Registrácia";
		$data["error"]="";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('registracia/registracia',$data);
		$this->load->view('stuffs/footer.php');
	}

	function validation(){
		$meno = $_POST["meno"];
		$telefon = $_POST["telefon"];
		$adresa= $_POST["adresa"];
		$email = $_POST["email"];
		$heslo = $_POST["heslo"];

		$this->form_validation->set_rules('meno', 'Meno', 'required|trim');
		$this->form_validation->set_rules('telefon', 'Telefón', 'required|trim');
		$this->form_validation->set_rules('adresa', 'Adresa', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('heslo', 'Heslo', 'required');

			if($this->form_validation->run()){
				if($this->Registracia_model->email_validation($email)){
					$data["error"]="Tento email je už používaný!";
					$this->load->view('stuffs/header.php',$data);
					$this->load->view('stuffs/nav.php');
					$this->load->view('registracia/registracia',$data);
					$this->load->view('stuffs/footer.php');
				}else{
					$heslo=$this->encryption->encrypt($heslo);
					$this->Registracia_model->registracia($meno,$telefon,$adresa,$email,$heslo);
					redirect(site_url("Registracia/Registracia"));
				}

		}else{
				$data["error"]="";
				$this->load->view('stuffs/header.php',$data);
				$this->load->view('stuffs/nav.php');
				$this->load->view('registracia/registracia',$data);
				$this->load->view('stuffs/footer.php');
			}
		/*
				$verification_key = md5(rand());
				$encrypted_password = $this->encrypt->encode($this->input->post('heslo'));
				$data = array(
					'name'  => $this->input->post('meno'),
					'email'  => $this->input->post('email'),
					'password' => $encrypted_password,
					'verification_key' => $verification_key
				);
				$id = $this->register_model->insert($data);
				if($id > 0)
				{
					$subject = "Please verify email for login";
					$message = "
		<p>Hi ".$this->input->post('meno')."</p>
		<p>This is email verification mail from Codeigniter Login Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
		<p>Once you click this link your email will be verified and you can login into system.</p>
		<p>Thanks,</p>
		";
					$config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 'smtpout.secureserver.net',
						'smtp_port' => 80,
						'smtp_user'  => 'xxxxxxx',
						'smtp_pass'  => 'xxxxxxx',
						'mailtype'  => 'html',
						'charset'    => 'iso-8859-1',
						'wordwrap'   => TRUE
					);
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->from('info@webslesson.info');
					$this->email->to($this->input->post('email'));
					$this->email->subject($subject);
					$this->email->message($message);
					if($this->email->send())
					{
						$this->session->set_flashdata('message', 'Check in your email for email verification mail');
						redirect('registracia');
					}
				}
			}
			else
			{
				$this->index();
			}
		}
	*/
	}
}
?>
