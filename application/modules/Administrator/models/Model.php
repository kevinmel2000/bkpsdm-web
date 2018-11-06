<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	// Syarat  :  
	
	// 1 . Select  = View 
	// 2 . Insert  = Ins
	// 3 . Update  = Updt
	// 4 . Delete  = Del

class Model extends CI_Model {

	
	
	////// MASTER //////
	
	public function Login($user,$pass) {
		$Query = $this->db->query("SELECT * FROM username WHERE username = '$user' AND password = '$pass' ");
		return $Query;	
	}
	public function View($Table,$Order) {
		$Query = $this->db->query("SELECT * FROM ".$Table." ORDER BY ".$Order." DESC");
		return $Query->result_array();	
	}
	public function ViewGroupBy($Table,$Order) {
		$Query = $this->db->query("SELECT * FROM ".$Table." GROUP BY ".$Order." DESC");
		return $Query->result_array();	
	}
	public function ViewASC($Table,$Order) {
		$Query = $this->db->query("SELECT * FROM ".$Table." ORDER BY ".$Order." ASC");
		return $Query->result_array();	
	}
	public function ViewLimit($Table,$Order,$Limit) {
		$Query = $this->db->query("SELECT * FROM ".$Table." ORDER BY ".$Order." DESC LIMIT 0,$Limit");
		return $Query->result_array();	
	}
	public function ViewLimitGroup($Table,$Group,$Limit) {
		$Query = $this->db->query("SELECT * FROM ".$Table." GROUP BY ".$Group." DESC LIMIT 0,$Limit");
		return $Query->result_array();	
	}
	public function ViewLimitWhere($Table,$Order,$Limit,$WhereField,$WhereValue) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' ORDER BY ".$Order." DESC LIMIT 0,$Limit");
		return $Query->result_array();	
	}
	public function ViewWhere($Table,$WhereField,$WhereValue) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' ");
		return $Query->result_array();	
	}
	public function ViewWhereASC($Table,$WhereField,$WhereValue,$Order) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' ORDER BY ".$Order." ASC ");
		return $Query->result_array();	
	}
	public function ViewWhereAnd($Table,$WhereField,$WhereValue,$WhereField2,$WhereValue2) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' AND ".$WhereField2." = '".$WhereValue2."' ");
		return $Query->result_array();	
	}
	public function ViewWhereGroup($Table,$WhereField,$WhereValue,$cGroup) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' GROUP BY ".$cGroup." ");
		return $Query->result_array();	
	}
	public function ViewWhereLike($Table,$WhereField,$WhereValue) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." LIKE '%".$WhereValue."%'");
		return $Query->result_array();	
	}
	public function ViewWhereAktor($Table,$WhereField,$WhereValue) {
		$Query = $this->db->query("SELECT * FROM ".$Table." WHERE ".$WhereField." = '".$WhereValue."' ORDER BY id DESC");
		return $Query->result_array();	
	}


	public function Insert($Table,$Value){
		$Query = $this->db->insert($Table,$Value);
		return $Query ;
	}
	public function Update($Table,$Where,$WhereValue,$Value){
		$this->db->where($Where,$WhereValue);
		$this->db->update($Table,$Value);
	}
	public function Delete($Table,$Where,$WhereValue){
		$this->db->where($Where,$WhereValue);
		$this->db->delete($Table);
	}


	
}