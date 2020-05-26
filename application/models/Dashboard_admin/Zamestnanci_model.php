<?php

class Zamestnanci_model extends CI_Model
{
	public function __construct()
	{

	}

	function nacitajUdaje($id = "")
	{
		if (!empty($id)) {
			/*$query = $this->db->query("SELECT p.meno AS menoTaxikara, po.meno AS menoZakaznika, auta.ecv AS auto, objednavky.odkial AS odkial,
										objednavky.kam AS kam, cennik.oblast AS oblast, cennik.cena AS cena FROM jazdy INNER JOIN objednavky
										ON objednavky.id = jazdy.id_objednavky INNER JOIN pouzivatelia p ON jazdy.id_zamestnanec = p.id INNER JOIN
										pouzivatelia po ON po.id = objednavky.id_zakaznik INNER JOIN auta ON auta.id = jazdy.id_auto INNER JOIN cennik
										ON cennik.id = objednavky.id_cennik GROUP BY menoTaxikara, menoZakaznika, odkial, kam");*/
			$query = $this->db->query("SELECT pouzivatelia.meno AS meno, pouzivatelia.telefon AS telefon, pouzivatelia.adresa AS adresa, pouzivatelia.email AS email, zamestnanci.id AS id, zamestnanci.datum_narodenia AS datum_narodenia, zamestnanci.rodne_cislo AS rodne_cislo, zamestnanci.datum_nastupu AS datum_nastupu, zamestnanci.ukoncenie_sluzby AS ukoncenie_sluzby 
									FROM zamestnanci  INNER JOIN pouzivatelia ON pouzivatelia.id = zamestnanci.id_pouzivatelia WHERE zamestnanci.id_pouzivatelia =".$id);
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT pouzivatelia.id AS id, pouzivatelia.meno AS meno, pouzivatelia.telefon AS telefon, pouzivatelia.adresa AS adresa, pouzivatelia.email AS email FROM pouzivatelia  WHERE pouzivatelia.role=1 ");
			return $query->result();

		}
	}

	public function controlEmail($email) {
		$query = $this->db->query("SELECT * FROM pouzivatelia WHERE pouzivatelia.email ='".$email."'");
	return $query->row_array();
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert('pouzivatelia', $data);
		if ($insert) {

			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	public function insert2($data = array())
	{
		$insert = $this->db->insert('zamestnanci', $data);
		if ($insert) {

			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function update($data,$data2, $id)
	{
		if (!empty($data) && !empty($id)) {
			$update = $this->db->update('pouzivatelia', $data, array('id' => $id));
			$update = $this->db->update('zamestnanci', $data2, array('id_pouzivatelia' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}

	public function delete($data, $id)
	{
		$delete = $this->db->update('pouzivatelia', $data, array('id' => $id));
		$delete= $this->db->delete('zamestnanci',array('id_pouzivatelia' => $id));

		return $delete ? true : false;
	}



}


