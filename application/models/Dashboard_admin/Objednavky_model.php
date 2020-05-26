<?php

class Objednavky_model extends CI_Model
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
			$query = $this->db->query("SELECT pouzivatelia.meno AS meno, objednavky.odkial AS odkial, objednavky.kam AS kam, DATE(objednavky.datum) AS datum, TIME(objednavky.datum) AS cas, objednavky.stav AS stav, objednavky.id_cennik AS id_cennik, cennik.oblast AS oblast 
 										FROM `objednavky` 
 										INNER JOIN pouzivatelia ON objednavky.id_zakaznik = pouzivatelia.id 
 										INNER JOIN cennik ON objednavky.id_cennik = cennik.id
 										WHERE objednavky.id = ".$id);
			return $query->row_array();
		} else {
			$query = $this->db->query("SELECT objednavky.id AS id, pouzivatelia.meno AS menoZakaznika, objednavky.odkial AS odkial, objednavky.kam AS kam, cennik.oblast AS oblast, cennik.cena AS cena, objednavky.datum AS datum, objednavky.stav AS stav  
										FROM `objednavky`
										INNER JOIN pouzivatelia ON objednavky.id_zakaznik = pouzivatelia.id
										INNER JOIN cennik ON objednavky.id_cennik = cennik.id
										ORDER BY objednavky.stav ASC");
			return $query->result();

		}
	}


	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			$update = $this->db->update('objednavky', $data, array('id' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$delete = $this->db->delete('objednavky', array('id' => $id));
		$delete = $this->db->delete('jazdy', array('id_objednavky' => $id));
		return $delete ? true : false;
	}

	//  taxikar
	public function get_cennik()
	{
		$query = $this->db->query("SELECT cennik.id AS id, cennik.oblast AS oblast FROM cennik");
		return $query->result();
	}

	//  auto
	public function get_auto_dropdown($id = "")
	{
		$this->db->order_by('znacka')
			->select('id, znacka')
			->from('auto');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown) {
				$dropdownlist[$dropdown->idauto] = $dropdown->model;
			}
			$dropdownlist[''] = 'Vyberte auto ... ';
			return $dropdownlist;
		}
	}

	//  klient
	public function get_klient_dropdown($id = "")
	{
		$this->db->order_by('meno')
			->select('id, meno')
			->from('pouzivatelia')
			->where('role==0');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown) {
				$dropdownlist[$dropdown->id] = $dropdown->meno;
			}
			$dropdownlist[''] = 'Vyberte klienta ... ';
			return $dropdownlist;
		}
	}
}


