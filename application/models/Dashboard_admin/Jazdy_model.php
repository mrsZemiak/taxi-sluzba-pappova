<?php

class Jazdy_model extends CI_Model
{
	public function __construct()
	{

	}

	function nacitajUdaje($id = "")
	{

		$query = $this->db->query("SELECT p.meno AS menoTaxikara, po.meno AS menoZakaznika, auta.ecv AS auto, objednavky.odkial AS odkial,
										objednavky.kam AS kam, objednavky.id AS id, jazdy.datum AS datum_jazdy , cennik.oblast AS oblast, cennik.cena AS cena FROM jazdy INNER JOIN objednavky 
										ON objednavky.id = jazdy.id_objednavky INNER JOIN pouzivatelia p ON jazdy.id_zamestnanec = p.id INNER JOIN 
										pouzivatelia po ON po.id = objednavky.id_zakaznik INNER JOIN auta ON auta.id = jazdy.id_auto INNER JOIN cennik 
										ON cennik.id = objednavky.id_cennik GROUP BY menoTaxikara, menoZakaznika, odkial, kam ORDER BY datum_jazdy DESC");

			return $query->result();
		}
	}











