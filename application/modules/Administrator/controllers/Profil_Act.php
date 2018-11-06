<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_Act extends CI_Controller {

	public function __construct(){
		
        parent::__construct();
		   error_reporting(0);    
	    //MenLoad model yang berada di Folder Model dan namany model
        $this->load->model('model');
        // Meload Library session 
       $this->load->library('session');
        //Meload database
        $this->load->database();
        //Meload url 
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

		function JudulSeo($s) {
		$s = trim($s) ; 
		$c = array (' ');
		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','"',
					'{','}',')','(','|','`','~','!','@','%','$','^','&',
					'*','=','?','+');
	
		$s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
		
		$s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
		return $s;
	  }  

		public function text($id=""){		
			if($_POST){
				$data = array (
				'deskripsi'	=> $this->input->post('cText')
				);
			}
			$this->model->Update('text','id_text',$id,$data);
			redirect(site_url('Administrator/profil/'.$this->input->post('link').''));
		}

	public function blog($Type="",$id=""){
	
			if($_POST){
				if($this->session->userdata('foto_blog') == ""){
				$cGambar = $this->input->post('cFotoFix');
				}else{
					$cGambar = $this->session->userdata('foto_blog');
				}
				$cLink = $this->input->post('cLink');
				$data = array (
				'id_kategori'  		=> '3',
				'tanggal'			=> $this->Date2String($this->input->post('dTgl')),
				'judul'				=> $this->input->post('cJudul'),
				'gambar'			=> $cGambar,
				'headline'			=> $this->input->post('cHeadline'),
				'isi'				=> $this->input->post('cIsi'),
				'aktor'  			=> $this->input->post('cAktor'),
				'waktu'				=> $this->input->post('cJam') ,
				'status'			=> $this->input->post('cStatus') ,
				'url'				=> $this->JudulSeo($this->input->post('cJudul')).".html" 
				);
			}
		
			if($Type == "simpan"){
				$this->model->Insert('blog',$data); 
				$this->session->unset_userdata('foto_blog');
				redirect(site_url('Administrator/Profil/'.$cLink.''));
			}elseif($Type == "ubah"){
				$this->model->Update('blog','id_blog',$id,$data);
				$this->session->unset_userdata('foto_blog');
				redirect(site_url('Administrator/Profil/'.$cLink.''));
			}elseif($Type == "hapus"){
				$this->model->Delete('blog','id_blog',$id);
			}
		}

		
	}