<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auta_model extends CI_Model
{
	public function __construct()
	{

	}

	function getRows($id = "")
	{
		if (!empty($id)) {
			$query = $this->db->query("SELECT * FROM  auta WHERE auta.id=".$id);
			return $query->row_array();
		} else {
			$query = $this->db->get('auta');
			return $query->result();
		}
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert('auta', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			$update = $this->db->update('auta', $data,
				array('id' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$delete = $this->db->delete('auta', array('id' => $id));
		return $delete ? true : false;
	}
}
?>
