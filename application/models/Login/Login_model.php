<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function prihlasenie($email){

		$query=$this->db->query("SELECT pouzivatelia.id AS id, pouzivatelia.email AS email, pouzivatelia.heslo AS heslo, pouzivatelia.role AS role FROM pouzivatelia WHERE pouzivatelia.email='".$email."'");
		return $query->row_array();

	}
}
