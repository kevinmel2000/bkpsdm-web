<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
		public function Date2String($dTgl){
			//return 2012-11-22
			list($cDate,$cMount,$cYear)	= explode("-",$dTgl) ;
			if(strlen($cDate) == 2){
				$dTgl	= $cYear . "-" . $cMount . "-" . $cDate ;
			}
			return $dTgl ; 
		}
		
		public function String2Date($dTgl){
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


		public function beranda($Aksi="",$Id=""){
			$dataHeader['title']	= "Beranda | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   	= 'Profil';
			$dataHeader['file']   	= 'Beranda';
			$dataHeader['link']		= 'beranda';
			$data['action'] 		= $Aksi ; 
			$data['row']			= $this->model->ViewWhere('text','id_text',1);
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/profil/beranda',$data);
			$this->load->view('back-end/container/footer');
		}

		public function profile($Aksi="",$Id=""){
			$dataHeader['title']	= "Profile | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   	= 'Profil';
			$dataHeader['file']   	= 'Profile' ;
			$dataHeader['link']		= 'profile';
			$data['action'] 		= $Aksi ; 
			$data['row']			= $this->model->ViewWhere('text','id_text',2);
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/profil/profile',$data);
			$this->load->view('back-end/container/footer');
		}

		public function blog($Aksi="",$Id=""){
			$dataHeader['title']		= "Berita | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   		= 'Profil';
			$dataHeader['file']   		= 'Berita' ;
			$dataHeader['link']			= 'blog';
			$data['action'] 			=  $Aksi ; 	
			$data['row']				= $this->model->ViewWhereASC('blog','id_kategori','3','id_blog');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('v_blog','id_blog',$Id);
			}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/profil/blog',$data);
			$this->load->view('back-end/container/footer');
		}
		
}
