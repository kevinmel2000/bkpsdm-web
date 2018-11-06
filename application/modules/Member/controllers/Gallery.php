<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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

		public function show_gallery(){
			$this->load->view('back-end/prototype/elfinder.html');
		}

		public function slider($Aksi="",$Id=""){
			$dataHeader['title']	= "Slider Foto | Website Backend Kelindoku";
			$dataHeader['menu']   	= 'Prototype';
			$dataHeader['file']   	= 'Slider Foto' ;
			$dataHeader['link']		= 'slider';
			$data['action'] 		= $Aksi ; 
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/prototype/index',$data);
			$this->load->view('back-end/container/footer');
		}


		public function foto($Aksi="",$Id=""){
			$dataHeader['title']	= "Gallery Foto | Website Backend Kelindoku";
			$dataHeader['menu']   	= 'Prototype';
			$dataHeader['file']   	= 'Gallery Foto' ;
			$dataHeader['link']		= 'gallery';
			$data['action'] 		= $Aksi ; 
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/prototype/index',$data);
			$this->load->view('back-end/container/footer');
		}

		public function logo($Aksi="",$Id=""){
			$dataHeader['title']	= "Logo Kelindoku | Website Backend Kelindoku";
			$dataHeader['menu']   	= 'Prototype';
			$dataHeader['file']   	= 'Ubah Logo' ;
			$dataHeader['link']		= 'logo';
			$data['action'] 		= $Aksi ; 
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/prototype/index',$data);
			$this->load->view('back-end/container/footer');
		}

		public function sosial_media($Aksi="",$Id=""){
			$dataHeader['title']	= "Sosial Media | Website Backend Kelindoku";
			$dataHeader['menu']   	= 'Prototype';
			$dataHeader['file']   	= 'Sosial Media' ;
			$dataHeader['link']		= 'sosmed';
			$data['action'] 		= $Aksi ; 
			$data['row']			= $this->model->View('sosialmedia','id');
			if($Aksi == 'edit'){
				$data['field'] = $this->model->ViewWhere('sosialmedia','id',$Id);
			}
			$this->load->view('back-end/container/header',$dataHeader);
			$this->load->view('back-end/prototype/sosmed',$data);
			$this->load->view('back-end/container/footer');
		}

		public function sosmed_act($Type="",$id=""){
			
			if($_POST){

				$data = array (
				'sosmed'			=> $this->input->post('cSosmed'),
				'link'				=> $this->input->post('cLink'),
				);
			}
		
			if($Type == "simpan"){
				$this->model->Insert('sosialmedia',$data);
				redirect(site_url('Administrator/gallery/sosial_media/'));
			}elseif($Type == "ubah"){
				$this->model->Update('sosialmedia','id',$id,$data);
				redirect(site_url('Administrator/gallery/sosial_media/'));
				//redirect(site_url('master/area_kerja/U'));
			}elseif($Type == "hapus"){
				$this->model->Delete('sosialmedia','id',$id);
				//redirect(site_url('master/area_kerja/D'));
			}
		}
		
		
}
