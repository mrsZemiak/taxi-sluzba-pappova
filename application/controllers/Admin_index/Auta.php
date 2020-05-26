<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auta extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 2)){
			redirect(site_url("Welcome"));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Dashboard_admin/Auta_model');
	}

	public function index()
	{
		$data['title']="Autá";
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
		$data['auto'] = $this->Auta_model->getRows();
		$data['title'] = 'Auto List';
		$this->load->view('auto/auto.php', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function view($id)
	{	$data['title']="Detail auta";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		if (!empty($id)) {
			$data['auto'] = $this->Auta_model->getRows($id);
			$data['title'] = $data['auto']['ecv'];
			$this->load->view('auto/view', $data);
		} else {
			redirect('Admin_index/Auta');
		}
		$this->load->view('stuffs/footer.php');
	}
	public function getData(){
		$fetch_data = $this->Auta_model->getRows();
		$data = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->znacka;
			$sub_array[] = '<a href="'.site_url("Admin_index/Auta/view/"). $row->id .'" class="fa fa-info-circle" aria-hidden="true"  style="color: #901280"></a><a href="'.site_url("Admin_index/Auta/edit/"). $row->id .'" class="fa fa-pencil-square" aria-hidden="true"  style="color: #901280"></a><a href="'.site_url("Admin_index/Auta/delete/"). $row->id .'" class="fa fa-trash" aria-hidden="true"  style="color: red"></a>';
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}

	public function add()
	{
		$data['title']="Nové auto";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		$postData = array();
		if ($this->input->post('postSubmit')) {
			$this->form_validation->set_rules('pocet_miest', 'počet miest', 'trim|required');
			$this->form_validation->set_rules('ecv', 'ecv', 'trim|required|min_length[7]');
			$this->form_validation->set_rules('znacka', 'znacka', 'trim|required|min_length[1]|max_length[45]');
			$postData = array(
				'pocet_miest' => $this->input->post('pocet_miest'),
				'ecv' => $this->input->post('ecv'),
				'znacka' => $this->input->post('znacka'),
			);
			if ($this->form_validation->run() == true) {
				$insert = $this->Auta_model->insert($postData);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'Auto has been added successfully.');
					redirect('Admin_index/Auta');
				} else {
					$data['error_msg'] = 'Some problems occurred, please try again.';
				}
				$this->load->view('stuffs/footer.php');
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Create Auto';
		$data['action'] = 'Nové auto';
		$this->load->view('auto/add-edit', $data);
	}

	public function edit($id)
	{
		$data['title']="Editácia auta";
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$data = array();
		$postData = $this->Auta_model->getRows($id);
		if ($this->input->post('postSubmit')) {
			$this->form_validation->set_rules('pocet_miest', 'počet miest', 'trim|required');
			$this->form_validation->set_rules('ecv', 'ecv', 'trim|required|min_length[7]');
			$this->form_validation->set_rules('znacka', 'značka', 'trim|required|min_length[1]|max_length[45]');
			// priprava dat pre aktualizaciu
			$postData = array(
				'pocet_miest' => $this->input->post('pocet_miest'),
				'ecv' => $this->input->post('ecv'),
				'znacka' => $this->input->post('znacka'),
			);
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Auta_model->update($postData, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Auto has been updated successfully.');
					redirect('Admin_index/Auta');
				} else {
					$data['error_msg'] = 'Some problems occurred, please try again.';
				}
				$this->load->view('stuffs/footer.php');
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Update auto';
		$data['action'] = 'Uprav auto';
		$this->load->view('auto/add-edit', $data);
	}

	public function delete($id)
	{
		if ($id) {
			$delete = $this->Auta_model->delete($id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Auto has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
			}
		}
		redirect('Admin_index/Auta');
	}
}
