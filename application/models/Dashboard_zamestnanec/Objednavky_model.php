<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Objednavky_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getObjednavky(){

		$query=$this->db->query("SELECT objednavky.id AS id, objednavky.odkial, objednavky.kam AS kam, DATE(objednavky.datum) AS datum FROM objednavky WHERE objednavky.stav = 0");
		return $query->result();

	}

	public function prijatObjednavku($id,$id_zamestnanec,$id_auto){
		$data = array(
			'stav'=>"1"
		);
		$this->db->where('id',$id);
		$this->db->update('objednavky',$data);

		$data1 = array(
			'id_zamestnanec'=>$id_zamestnanec,
			'id_auto'=>$id_auto,
			'id_objednavky'=>$id
		);

		$this->db->insert('jazdy',$data1);


		}

}
