<?php


class Cennik_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_cena( ) {
		$query=$this->db->query("SELECT cennik.oblast AS oblast, cennik.cena AS cena FROM cennik");
		return $query->result();

	}
}
?>
