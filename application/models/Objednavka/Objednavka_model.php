<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Objednavka_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_cennik(){

		$query=$this->db->query("SELECT cennik.id AS id, cennik.oblast AS oblast, cennik.cena AS cena FROM cennik");
		return $query->result();
	}
	public function nova_objednavka($odkial, $kam, $cennik, $id){
		$data=array(
			'odkial'=>$odkial,
			'kam'=>$kam,
			'id_cennik'=>$cennik,
			'id_zakaznik'=>$id
		);
		$this->db->insert('objednavky',$data);

	}

}
