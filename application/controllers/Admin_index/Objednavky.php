<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objednavky extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!(isset($_SESSION['email']) && $_SESSION["role"] == 2)){
			redirect(site_url("Welcome"));
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Dashboard_admin/Objednavky_model');
	}
	public function index()
	{

		$data = array();
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$data['objednavky'] = $this->Objednavky_model->nacitajUdaje();
		$data['title'] = 'Zoznam objednávok';
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('objednavky/objednavky', $data);
		$this->load->view('stuffs/footer.php');
	}
	public function getData(){
		$fetch_data = $this->Objednavky_model->nacitajUdaje();
		$data = array();
		foreach ($fetch_data as $row){
			$stav = "";
			if($row->stav==0){
				$stav = "Aktívna";
			}else{
				$stav = "Prevzatá";
			}
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->menoZakaznika;
			$sub_array[] = $row->odkial;
			$sub_array[] = $row->kam;
			$sub_array[] = $row->oblast;
			$sub_array[] = $row->cena;
			$sub_array[] = $row->datum;
			$sub_array[] = $stav;
			$sub_array[] = '<a href="'.site_url("Admin_index/Objednavky/edit/"). $row->id .'" class="fa fa-pencil-square" aria-hidden="true"  style="color: #901280"></a><a href="'.site_url("Admin_index/Objednavky/delete/"). $row->id .'" class="fa fa-trash" aria-hidden="true"  style="color: red"></a>';
			$data[] = $sub_array;
		}
		$output = array(
			"data" => $data
		);
		echo json_encode($output);
	}

	public function view($id)
	{
		$data = array();
		if (!empty($id)) {
			$data['objednavky'] = $this->Objednavky_model->nacitajUdaje($id);
			$data['title'] = $data['objednavky']['datum'];
			$this->load->view('objednavky/view', $data);
		} else {
			redirect('Admin_index/Objednavky');
		}
	}

	public function edit($id)
	{
		$data = array();
		$postData = $this->Objednavky_model->nacitajUdaje($id);
		if ($this->input->post('postSubmit')) {
			$this->form_validation->set_rules('odkial', 'Odkiaľ', 'required');
			$this->form_validation->set_rules('kam', 'Kam', 'required|min_length[1]|max_length[45]');
			$this->form_validation->set_rules('datum', 'Datum', 'required');
			$this->form_validation->set_rules('cas', 'Cas', 'required');
			$postData = array(
				'odkial' => $this->input->post('odkial'),
				'kam' => $this->input->post('kam'),
				'datum' => $this->input->post('datum')." ".$this->input->post('cas'),
				'id_cennik' => $this->input->post('cennik'),
				'stav' => $this->input->post('stav')
			);
			if ($this->form_validation->run() == true) {
				// aktualizacia dat
				$update = $this->Objednavky_model->update($postData, $id);
				if ($update) {
					$this->session->set_userdata('success_msg', 'Objednavka has been updated successfully.');
					redirect('Admin_index/Objednavky');
				} else {
					$data['error_msg'] = 'Some problems occurred, please try again.';
				}
			}
		}

		$data['post'] = $postData;
		$data['getCennik']= $this->Objednavky_model->get_cennik();
		$data['title'] = 'Update Objednavka';
		$data['action'] = 'Uprav objednávku';
		$this->load->view('stuffs/header.php',$data);
		$this->load->view('stuffs/nav.php');
		$this->load->view('objednavky/add-edit', $data);
		$this->load->view('stuffs/footer.php');
	}

	public function delete($id)
	{
		if ($id) {
			$delete = $this->Objednavky_model->delete($id);
			if ($delete) {
				$this->session->set_userdata('success_msg', 'Objednavka has been removed successfully.');
			} else {
				$this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
			}
		}
		redirect('Admin_index/Objednavky');
	}

}
