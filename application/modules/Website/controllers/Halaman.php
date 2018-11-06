<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

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

		public function map($cUrl=""){
			$this->load->view('maps');
		}

		public function KodeBooking(){
	      $cText    = 'abcdefg123hijklmn456opqrs789tuvwxyz0';
	      $cNumber  = '1234987650';
	      
	      $nLength  	= 4 ;
	      $nLengthNum 	= 3 ;

	      $cLenText   = strlen($cText)-1;
	      $cLenNum	  = strlen($cNumber)-1;

	      $cResult  = '';
	      $cResult2 = '';

	      for($i=1; $i<=$nLength; $i++){
	       $cResult .= $cText[rand(0, $cLenText)];
	      }

	      for($z=1; $z<=$nLengthNum; $z++){
	       $cResult2 .= $cNumber[rand(0, $cLenNum)];
	      }

	      $cFix =   $cResult.$cResult2;
	      return $cFix ;
	  }

		public function index(){
			$dataHeader['title']	= "Beranda | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "index";
			$data['row']			=  $this->model->ViewWhere('text','id_text','1');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/index',$data);
			$this->load->view('front-end/container/footer');
		}

		public function profil($cUrl=""){	
			$dataHeader['title']	= "Profil | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "profil";	
			$data['row']			=  $this->model->ViewWhere('text','id_text','2');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/profil',$data);
			$this->load->view('front-end/container/footer');
		}

		public function produk($cUrl=""){	
			$dataHeader['title']	= "Produk | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "produk";	
			$data['row']			= $this->model->ViewAsc('v_service','id_service');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/produk',$data);
			$this->load->view('front-end/container/footer');
		}

		public function tutorial($cUrl=""){	
			$dataHeader['title']	= "Tutorial | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "tutorial";	
			$data['row']			= $this->model->ViewAsc('v_blog','id_blog');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/blog',$data);
			$this->load->view('front-end/container/footer');
		}

		public function buku_tamu($cUrl=""){	
			$dataHeader['title']	= "Buku Tamu | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "buku_tamu";	
			$data['info']			= $cUrl;
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/buku_tamu',$data);
			$this->load->view('front-end/container/footer');
		}

		public function login($cUrl=""){	
			$dataHeader['title']	= "Login | Sistem Informasi Panduan Budidaya Jamur";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "login";	
			$data['info']			= $cUrl;
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/login',$data);
			$this->load->view('front-end/container/footer');
		}

		
		public function produk_detail($cUrl=""){
			$vaDataUrl	=	$this->model->ViewWhere('v_blog','url',$cUrl);
			foreach ($vaDataUrl as $key => $vaUrl) {
				$cIdKategori =  $vaUrl['id_kategori'];
				$cJudul      =  $vaUrl['judul'];
				$cIdBlog 	 =  $vaUrl['id_blog'];
			}
			$dataHeader['title']	= "".$cJudul." |  Website Resmi Global Consultant  ";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "blog_detail";
			$data['judul']			= $cJudul ;
			$data['id_kategori']	= $cIdKategori;
			$data['blog']			= $this->model
										   ->ViewWhere('v_blog',
										   			   'url',
										   			   $cUrl);
			$data['recents']	= $this->model->ViewLimitWhere('v_blog','id_blog',3,'id_menu','14');
			$dataFooter['sosmed']		=  $this->model -> ViewAsc('sosialmedia','id');
			$dataFooter['recent']	= $this->model->ViewLimitWhere('v_blog','id_blog',3,'id_menu','4');
			$data['service']			=  $this->model -> ViewAsc('v_service', 'id_service');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/blog-detail',$data);
			$this->load->view('front-end/container/footer',$dataFooter);
		}
		
		public function tutorial_detail($cUrl=""){
			$vaDataUrl	=	$this->model->ViewWhere('v_blog','url',$cUrl);
			foreach ($vaDataUrl as $key => $vaUrl) {
				$cIdKategori =  $vaUrl['id_kategori'];
				$cJudul      =  $vaUrl['judul'];
				$cIdBlog 	 =  $vaUrl['id_blog'];
			}
			$dataHeader['title']	= "".$cJudul." |  Website Resmi Global Consultant  ";
			$dataHeader['menu']		= $this->model->ViewAsc('menu','id_menu');
			$dataHeader['link']		= "blog_detail";
			$data['judul']			= $cJudul ;
			$data['id_kategori']	= $cIdKategori;
			$data['blog']			= $this->model
										   ->ViewWhere('v_blog',
										   			   'url',
										   			   $cUrl);
			$data['recents']	= $this->model->ViewLimitWhere('v_blog','id_blog',3,'id_menu','14');
			$dataFooter['sosmed']		=  $this->model -> ViewAsc('sosialmedia','id');
			$dataFooter['recent']	= $this->model->ViewLimitWhere('v_blog','id_blog',3,'id_menu','4');
			$data['service']			=  $this->model -> ViewAsc('v_service', 'id_service');
			$this->load->view('front-end/container/header',$dataHeader);
			$this->load->view('front-end/blog-detail',$data);
			$this->load->view('front-end/container/footer',$dataFooter);
		}

		public function emails_kontak(){
			$data = array (
				'nama' 		=> $this->input->post('cNama'),
				'email' 	=> $this->input->post('cEmail'),
				'tlp' 		=> $this->input->post('cTlp'),
				'tanggal' 	=> $this->Date2String($this->DateStamp()),
				'pesan' 	=> $this->input->post('cPesan')
				);

			$name = $this->input->post('cNama');
            $from_email = $this->input->post('cEmail');

			$this->model->Insert('bukutamu',$data); 
	        $this->load->library('email');
	        $htmlContent           	 = '<h1>Laporan Komentar</h1>';
	        $htmlContent           	.= '<div>Berikut Pesan Dari</div>';
	        $htmlContent		  	.= '<p>Nama : '.$data['nama'].'</p>';
	        $htmlContent			.= '<p>Email : '.$data['email'].'</p>';
	        $htmlContent			.= '<p>Telepon : '.$data['tlp'].'</p>';
	        $htmlContent			.= '<p>Pesan : '.$data['pesan'].'</p>';
	        $config                 = array();
	        $config['charset']      = 'utf-8';
	        $config['useragent']    = 'Codeigniter'; //bebas sesuai keinginan kamu
	        $config['protocol']     = "smtp";
	        $config['mailtype']     = "html";
	        $config['smtp_host']    = "ssl://smtp.gmail.com";
	        $config['smtp_port']    = "465";
	        $config['smtp_timeout'] = "5";
	        $config['smtp_user']    = "arga.dika77@gmail.com";//isi dengan email kamu
	        $config['smtp_pass']    = "03A06M9491"; // isi dengan password kamu
	        $config['crlf']         = "\r\n"; 
	        $config['newline']      = "\r\n"; 
	        
	        $config['wordwrap'] = TRUE;
	        //memanggil library email dan set konfigurasi untuk pengiriman email
	    
	       $this->email->initialize($config);
	      
	       $this->email->from($from_email, $name);
		   $this->email->to('arga.dika77@gmail.com');

	       $this->email->subject('Buku Tamu SEAMEO BIOTROP');
	       $this->email->message($htmlContent);
	       if($this->email->send()){
	        redirect(site_url('Website/Halaman/buku_tamu/sukses')); 
	       }else{
	        redirect(site_url('Website/Halaman/buku_tamu/gagal')); 
	       }
    	}

		


		
		
}
