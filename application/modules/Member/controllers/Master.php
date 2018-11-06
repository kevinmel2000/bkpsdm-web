<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		      
        $this->load->model('model');
        $this->load->model('relasi');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('download'); 
		$this->load->library('encrypt');
		 
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

		public function signin($Action=""){
		$data = "" ;
		if ($Action == "error"){
			$data['notif'] = "Username / Password Salah" ;
			}
			$msg 			 = 'My secret message';
			$msg_enkrip		 =  $this->encrypt->encode($msg);
			$data['tes']	 =  $this->encrypt->encode($msg);
			$data['tes2']	 =  $this->encrypt->decode($msg_enkrip);
			$this->load->view('back-end/login',$data);
		}
		
		public function index($Aksi=""){
			
			$dataHeader['title']		= "Home | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   		= 'Master';
			$dataHeader['file']   		= 'Index' ;
			$dataHeader['link']			= 'index';
			$data['action'] 			= $Aksi ;
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/home',$data);
			$this->load->view('back-end/container/footer');
		}

		public function pembelajaran($Aksi="",$Id=""){
			$dataHeader['title']		= "Modul Pembelajaran | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   		= 'Pembelajaran';
			$dataHeader['file']   		= 'Modul Pembelajaran' ;
			$dataHeader['link']			= 'pembelajaran';
			$data['action'] 			=  $Aksi ; 	
			$data['kelas']				= $this->model->ViewAsc('v_kelas','id_kelas');
			$data['mapel']				= $this->model->ViewAsc('mapel','id_mapel');
			$data['row']				= $this->model->ViewWhereWhereASC('v_blog','id_kategori','1','id_user',$this->session->userdata('id_user'),'id_blog');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('v_blog','id_blog',$Id);
			}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/pembelajaran',$data);
			$this->load->view('back-end/container/footer');
		}

		public function model_pembelajaran($Aksi="",$Id=""){
			$dataHeader['title']		= "Modul Model Pembelajaran | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   		= 'Pembelajaran';
			$dataHeader['file']   		= 'Modul Model Pembelajaran' ;
			$dataHeader['link']			= 'model_pembelajaran';
			$data['action'] 			=  $Aksi ; 	
			$data['kelas']				= $this->model->ViewAsc('v_kelas','id_kelas');
			$data['mapel']				= $this->model->ViewAsc('mapel','id_mapel');
			$data['row']				= $this->model->ViewWhereASC('v_blog','id_kategori','2','id_user',$this->session->userdata('id_user'),'id_blog');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('v_blog','id_blog',$Id);
			}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/model_pembelajaran',$data);
			$this->load->view('back-end/container/footer');
		}

		public function soal($Aksi="",$Id=""){
			$dataHeader['title']		= "Soal | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['menu']   		= 'Pembelajaran';
			$dataHeader['file']   		= 'Soal' ;
			$dataHeader['link']			= 'soal';
			$data['action'] 			=  $Aksi ; 	
			$data['kelas']				= $this->model->ViewAsc('v_kelas','id_kelas');
			$data['mapel']				= $this->model->ViewAsc('mapel','id_mapel');
			$data['row']				= $this->model->ViewAsc('v_soal','id');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('v_soal','id',$Id);
			}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/soal',$data);
			$this->load->view('back-end/container/footer');
		}


		public function service($Aksi="",$Id=""){
			$dataHeader['title']		= "Service | Company Profile | Web Administrator";
			$dataHeader['link']			= "service";
			$dataHeader['menu']   		= 'Data';
			$dataHeader['file']   		= 'Service' ;
			$data['action']				= $Aksi ;
			$data['service']			= $this->model->ViewWhere('kategori','id_menu','1');
			$data['row']				= $this->model->ViewWhere('v_service','id_kategori','57'); 
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('service','id_service',$Id);
				}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/service',$data);
			$this->load->view('back-end/container/footer');
		}

		public function produk($Aksi="",$Id=""){
			$dataHeader['title']		= "Home | Sistem Panduan Budidaya Jamur | Web Administrator";
			$dataHeader['link']			= "produk";
			$dataHeader['menu']   		= 'Master Produk';
			$dataHeader['file']   		= '#' ;
			$data['action']				= $Aksi ;
			$data['kategori']			= $this->model->ViewWhere('kategori','id_menu','4');
			$data['row']				= $this->model->ViewWhere('v_service','id_menu','4'); 
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('service','id_service',$Id);
				}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/master/produk',$data);
			$this->load->view('back-end/container/footer');
		}

		
}
