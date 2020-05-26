<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registracia_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function registracia($meno, $telefon, $adresa, $email,$heslo) {
		$data = array(
			'meno'=>$meno,
			'telefon'=>$telefon,
			'adresa'=>$adresa,
			'email'=>$email,
			'heslo'=>$heslo
		);

		$this->db->insert('pouzivatelia',$data);

	}
	function email_validation($email){
			$query=$this->db->query("SELECT pouzivatelia.email FROM pouzivatelia WHERE pouzivatelia.email='".$email."'");
			return $query->result();
	}
}

?>

