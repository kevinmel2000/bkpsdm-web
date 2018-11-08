<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_Act extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		//error_reporting(0); 
		ob_start();
		ob_clean();
		ob_end_clean();   
	    //MenLoad model yang berada di Folder Model dan namany model
		$this->load->model('model');
        // Meload Library session 
		$this->load->library('session');
		/*$this->load->library('m_pdf');*/
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
		$Data = date("Y-m-d");
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

	public function signin(){

		$cUsername 	= $this->input->post('user') ;
		$cPassword	= md5($this->input->post('pass')) ;
		/*echo $cUsername.$cPassword;
		exit();*/
		$cModel		= $this->model->Login($cUsername,$cPassword);
		if($cModel->num_rows() > 0 ){
			foreach ($cModel->result_array() as $key => $vaUser) {
				$cIdUser 	=	$vaUser['id_user'] ;
				$cNama 		=	$vaUser['nama'];
				$cLevel 	=	$vaUser['level'];	
			}
			echo "sukses-".$cLevel."";
			$this->session->set_userdata('isLogin','True');
			$this->session->set_userdata('id_user',$cIdUser);
			$this->session->set_userdata('nama',$cNama);
			$this->session->set_userdata('level',$cLevel);
		}else{
			echo "Login Gagal";		
		}

	}

	public function signup(){

				$data = array (
					'tgl_register'  => $this->DateStamp(),
					'nama'      	=> $this->input->post('nama'),
					'asal_sekolah'  => $this->input->post('asal_sekolah'),
					'username'    	=> $this->input->post('user'),
					'password'    	=> md5($this->input->post('pass')),
					'level'     	=> '2'
				);

			$this->model->Insert('username',$data); 

			$cUsername 	= $this->input->post('user') ;
			$cPassword	= md5($this->input->post('pass')) ;

			$cModel		= $this->model->Login($cUsername,$cPassword);
			if($cModel->num_rows() > 0 ){
				foreach ($cModel->result_array() as $key => $vaUser) {
					$cIdUser 	=	$vaUser['id_user'] ;
					$cNama 		=	$vaUser['nama'];
					$cLevel 	=	$vaUser['level'];	
				}
				echo "sukses-".$cLevel."";
				$this->session->set_userdata('isLogin','True');
				$this->session->set_userdata('id_user',$cIdUser);
				$this->session->set_userdata('nama',$cNama);
				$this->session->set_userdata('level',$cLevel);
			}else{
				echo "Login Gagal";		
			}
	}


	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('Front/Halaman/index'));
	}

}