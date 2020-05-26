<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zamestnanci extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 2)){
			redirect(site_url("Welcome"));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Dashboard_admin/Zamestnanci_model');
	}

	public function index()
	{
		$data['title']="Zamestnanci";
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
		$this->load->view('zamestnanci/zamestnanci.php', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function view($id)
	{	$data['title']="";

		$data = array();
		if (!empty($id)) {
			$data['zamestnanec'] = $this->Zamestnanci_model->nacitajUdaje($id);
			$data['title'] = $data['zamestnanec']['meno'];
			$this->load->view('stuffs/header.php',$data);
			$this->load->view('stuffs/nav.php');
			$this->load->view('zamestnanci/view', $data);
		} else {
			redirect('Admin_index/Zamestnanci');
		}
		$this->load->view('stuffs/footer.php');
	}
	public function getData(){
		$fetch_data = $this->Zamestnanci_model->nacitajUdaje();
		$data = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->meno;
			$sub_array[] = $row->telefon;
			$sub_array[] = $row->adresa;
			$sub_array[] = $row->email;

			$sub_array[] = '<a href="'.site_url("Admin_index/Zamestnanci/view/"). $row->id .'" class="fa fa-info-circle" aria-hidden="true"  style="color: #901280"></a><a href="'.site_url("Admin_index/Zamestnanci/edit/"). $row->id .'" class="fa fa-pencil-square" aria-hidden="true"  style="color: #901280"></a><a href="'.site_url("Admin_index/Zamestnanci/delete/"). $row->id .'" class="fa fa-trash" aria-hidden="true"  style="color: red"></a>';
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}

	public function add()
	{
		$data['title']="Pridať zamestnanca";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		$postData = array();
		if ($this->input->post('postSubmit')) {
			$this->form_validation->set_rules('meno', 'Meno', 'trim|required');
			$this->form_validation->set_rules('telefon', 'Telefón', 'trim|required');
			$this->form_validation->set_rules('adresa', 'Adresa', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('datum_narodenia', 'Dátum narodenia', 'trim|required');
			$this->form_validation->set_rules('rodne_cislo', 'Rodné číslo', 'trim|required|max_length[11]');
			$this->form_validation->set_rules('datum_nastupu', 'Dátum nástupu', 'trim|required');
			$noveheslo=$this->encryption->encrypt("noveheslo");
			$postData = array(
				'meno' => $this->input->post('meno'),
				'telefon' => $this->input->post('telefon'),
				'adresa' => $this->input->post('adresa'),
				'email' => $this->input->post('email'),
				'heslo' => $noveheslo,
				'role' =>"1"
			);


				if ($this->form_validation->run() == true) {
					if($this->Zamestnanci_model->controlEmail($this->input->post('email'))){
					$zhoda=$this->Zamestnanci_model->controlEmail($this->input->post('email'));
						$postData = array(
							'role' => "1"
						);
						$insert = $this->Zamestnanci_model->delete($postData,$zhoda['id']);
						$postData2 = array(
							'id_pouzivatelia' => $zhoda['id'],
							'datum_narodenia' => $this->input->post('datum_narodenia'),
							'rodne_cislo' => $this->input->post('rodne_cislo'),
							'datum_nastupu' => $this->input->post('datum_nastupu'),
						);
						$this->Zamestnanci_model->insert2($postData2);
						redirect('Admin_index/Zamestnanci');
					}else {
						$insert = $this->Zamestnanci_model->insert($postData);
						if ($insert) {
							$postData2 = array(
								'id_pouzivatelia' => $insert,
								'datum_narodenia' => $this->input->post('datum_narodenia'),
								'rodne_cislo' => $this->input->post('rodne_cislo'),
								'datum_nastupu' => $this->input->post('datum_nastupu'),
							);
							$this->Zamestnanci_model->insert2($postData2);
							$this->session->set_userdata('success_msg', 'Zamestnanec has been added successfully.');
							$this->poslatEmail($this->input->post('email'),$noveheslo);
							redirect('Admin_index/Zamestnanci');
						} else {
							$data['error_msg'] = 'Some problems occurred, please try again.';
						}
					}
					$this->load->view('stuffs/footer.php');
				}
			}

		$data['post'] = $postData;
		$data['title'] = 'Create Zamestnanec';
		$data['action'] = 'Nový zamestnanec';
		$this->load->view('zamestnanci/add-edit', $data);
	}
	function poslatEmail($email,$hash){
		$to = $email;
		$subject = "Nový zamestnanec";
		$message = '
<html>
<head>
</head>

<body>
<p>Vaše nové heslo je</p>'.$hash.'

</div>
</body>
</html>

';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <mail@mail.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
	}

	public function edit($id)
	{
		$data['title']="Editácia zamestnanca";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		$postData = $this->Zamestnanci_model->nacitajUdaje($id);
		if ($this->input->post('postSubmit')) {
			$this->form_validation->set_rules('meno', 'Meno', 'trim|required');
			$this->form_validation->set_rules('telefon', 'Telefón', 'trim|required');
			$this->form_validation->set_rules('adresa', 'Adresa', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('datum_narodenia', 'Dátum narodenia', 'trim|required');
			$this->form_validation->set_rules('rodne_cislo', 'Rodné číslo', 'trim|required|max_length[11]');
			$this->form_validation->set_rules('datum_nastupu', 'Dátum nástupu', 'trim|required');
			// priprava dat pre aktualizaciu
			$postData = array(
				'meno' => $this->input->post('meno'),
				'telefon' => $this->input->post('telefon'),
				'adresa' => $this->input->post('adresa'),
				'email' => $this->input->post('email')
			);
			$postData2 = array(
				'datum_narodenia' => $this->input->post('datum_narodenia'),
				'rodne_cislo' => $this->input->post('rodne_cislo'),
				'datum_nastupu' => $this->input->post('datum_nastupu'),
			);
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Zamestnanci_model->update($postData,$postData2, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Zamestnanec has been updated successfully.');
					redirect('Admin_index/Zamestnanci');
				} else {
					$data['error_msg'] = 'Some problems occurred, please try again.';
				}
				$this->load->view('stuffs/footer.php');
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Update zamestnanec';
		$data['action'] = 'Uprav zamestnanca';
		$this->load->view('zamestnanci/add-edit', $data);
	}

	public function delete($id)
	{
		if ($id) {
			$postData = array(
				'role' => "0"
			);
			$delete = $this->Zamestnanci_model->delete($postData,$id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Zamestnanec has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
			}
		}
		redirect('Admin_index/Zamestnanci');
	}
}
