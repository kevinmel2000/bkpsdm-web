<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		      
        $this->load->model('model');
        $this->load->model('relasi');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download'); 
		 
    }
		public  function Date2String($dTgl){
			//return 2012-11-22
			list($cDate,$cMount,$cYear)	= explode("-",$dTgl) ;
			if(strlen($cDate) == 2){
				$dTgl	= $cYear . "-" . $cMount . "-" . $cDate ;
			}
			return $dTgl ; 
		}
		
		public  function String2Date($dTgl){
			//return 22-11-2012  
			list($cYear,$cMount,$cDate)	= explode("-",$dTgl) ;
			if(strlen($cYear) == 4){
				$dTgl	= $cDate . "-" . $cMount . "-" . $cYear ;
			} 
			return $dTgl ; 	
		}
		
		public function TimeStamp() {
			date_default_timezone_set("Asia/Jakarta");
			$Data = date("H:i:s");
			return $Data ;
		}
			
		public function DateStamp() {
   			date_default_timezone_set("Asia/Jakarta");
			$Data = date("d-m-Y");
			return $Data ;
		}  
			
		public function DateTimeStamp() {
   			date_default_timezone_set("Asia/Jakarta");
			$Data = date("Y-m-d h:i:s");
			return $Data ;
		} 

		public function bukutamu($Aksi="",$Id=""){
			$dataHeader['title']	= "Buku Tamu | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   	= 'Data User';
			$dataHeader['file']   	= 'Buku Tamu' ;
			$dataHeader['link']		= 'bukutamu';
			$data['action'] 		= $Aksi ; 
			$data['row']			= $this->model->ViewAsc('bukutamu','id_bukutamu');
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/user/bukutamu',$data);
			$this->load->view('back-end/container/footer');
		}

		public function username($Aksi="",$Id=""){
			$dataHeader['title']	= "Member | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   	= 'Data User';
			$dataHeader['file']   	= 'Username' ;
			$dataHeader['link']		= 'username';
			$data['action'] 		= $Aksi ; 
			$data['row']			= $this->model->View('username','id_user');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('username','id_user',$Id);
				}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/user/user',$data);
			$this->load->view('back-end/container/footer');
		}

		

		
		
}
