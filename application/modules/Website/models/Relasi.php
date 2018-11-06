<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relasi extends CI_Model {

	public function getHotelLimit($nlimit){
		$db = $this->db->query("SELECT * FROM hotel WHERE id_hotel != '9' ORDER BY id_hotel DESC LIMIT 0,$nlimit");
		return $db->result_array();
	}
	
}