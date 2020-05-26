<?php
class Jazdy_model extends CI_Model
{
public function __construct()
{

}

function nacitajUdaje($id)
{

$query = $this->db->query("SELECT jazdy.datum, objednavky.odkial, objednavky.kam, cennik.cena FROM jazdy 
INNER JOIN objednavky ON objednavky.id = jazdy.id_objednavky 
INNER JOIN cennik ON objednavky.id_cennik = cennik.id WHERE jazdy.id_zamestnanec =".$id);

return $query->result();
}
function getPeniaze($id){
	$query = $this->db->query("SELECT SUM(cennik.cena) AS suma, jazdy.datum FROM jazdy 
INNER JOIN objednavky ON jazdy.id_objednavky = objednavky.id 
INNER JOIN cennik ON cennik.id = objednavky.id_cennik WHERE jazdy.id_zamestnanec = ".$id." HAVING DAY(jazdy.datum) = DAY(NOW())");

	return $query->row_array();
}
}


