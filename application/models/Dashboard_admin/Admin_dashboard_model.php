<?php

class Admin_dashboard_model extends CI_Model
{

	public function __construct()
	{

	}

	// graf na kolko ludi mali taxikari
	public function taxikari_pocet_objednavok()
	{
		$this->db->select('pouzivatelia.meno label, COUNT(*) value');
		$this->db->from('jazdy');
		$this->db->join('pouzivatelia', 'pouzivatelia.id = jazdy.id_zamestnanec');
		$this->db->where('pouzivatelia.role=1');
		$this->db->group_by('label');
		$query = $this->db->get();
		return $query->result_array();
	}

	// graf najpouzivanejsie auta
	public function auta()
	{
		$this->db->select('auta.znacka label, COUNT(jazdy.id_objednavky) value');
		$this->db->from('jazdy');
		$this->db->join('auta', 'auta.id = jazdy.id_auto');
		$this->db->group_by('label');
		$query = $this->db->get();
		return $query->result_array();
	}

	// graf najfrekventovanejsie ulice
	public function ulice()
	{
		$this->db->select('objednavky.kam label, COUNT(*) as value');
		$this->db->from('objednavky');
		$this->db->group_by('label');
		$query = $this->db->get();
		return $query->result_array();
	}


}
