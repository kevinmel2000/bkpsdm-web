<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relasi extends CI_Model {

	public function getHotelLimit($nlimit){
		$db = $this->db->query("SELECT * FROM hotel WHERE id_hotel != '9' ORDER BY id_hotel DESC LIMIT 0,$nlimit");
		return $db->result_array();
	}

	public function cariBlog($cKelas,$cMapel,$cBlog) {
		if (empty($cMapel)) {
			$cMapel = "";
		} else {
			$cMapel = "AND id_mapel = '$cMapel'";
		}

		if (empty($cKelas)) {
			$cKelas = "";
		} else {
			$cKelas = "AND id_kelas = '$cKelas'";
		}

		$Query = $this->db->query("SELECT * FROM v_blog WHERE id_kategori = '".$cBlog."' ".$cKelas." ".$cMapel." ");
		return $Query->result_array();	
	}
	
}