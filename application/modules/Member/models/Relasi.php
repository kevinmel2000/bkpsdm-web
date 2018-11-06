<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relasi extends CI_Model {


	public function ViewRegistrasi($dTgl) {
		$Query = $this->db->query("SELECT * FROM v_client WHERE tgl = '$dTgl' ORDER BY id_client DESC ");
		return $Query->result_array();	
	}

	public function ViewRegistrasiPerTanggal($dTglAwal,$dTglAkhir) {
		$Query = $this->db->query("SELECT * FROM v_client WHERE tgl BETWEEN '".$dTglAwal."' and '".$dTglAkhir."'  ORDER BY id_client DESC ");
		return $Query->result_array();	
	}

	public function ViewRegistrasiPerBulan($cBulan,$cTahun) {
		$Query = $this->db->query("SELECT * FROM v_client WHERE  bulan =  '".$cBulan."' and tahun = '".$cTahun."'  ORDER BY id_client DESC ");
		return $Query->result_array();	
	}

}