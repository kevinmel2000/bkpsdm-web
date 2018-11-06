<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Master_Act extends CI_Controller {



	public function __construct(){

		

        parent::__construct();

		      

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



		public function signin(){



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

			redirect(site_url('Administrator/master/signin'));

		}

		

		public function menu($Type="",$id=""){

			

			if($_POST){

				$data = array (

				'nama_menu' 	=> $this->input->post('nama')

				);

			}

		

			if($Type == "simpan"){

				$this->model->Insert('menu',$data); 

				//redirect(site_url('master/area_kerja/I'));

			}elseif($Type == "ubah"){

				$this->model->Update('menu','id_menu',$id,$data);

				//redirect(site_url('master/area_kerja/U'));

			}elseif($Type == "hapus"){

				$this->model->Delete('menu','id_menu',$id);

				//redirect(site_url('master/area_kerja/D'));

			}

		}



		public function kategori($Type="",$id=""){

			

			if($_POST){

				if(empty($this->input->post('gambar'))) {

					$data = array (

					'id_menu' 	=> $this->input->post('id_menu'),

					'nama_kategori'=>$this->input->post('name'),

					'headline'	=>$this->input->post('headline'),

					'url'		=>$this->JudulSeo($this->input->post('name')).".html"

					);

				} else {

					$data = array (

					'id_menu' 	=> $this->input->post('id_menu'),

					'nama_kategori'=>$this->input->post('name'),

					'headline'	=>$this->input->post('headline'),

					'gambar'	=> $this->input->post('gambar'),

					'url'		=>$this->JudulSeo($this->input->post('name')).".html"

					);

				}

			}

		

			if($Type == "simpan"){

				$this->model->Insert('kategori',$data); 

				//redirect(site_url('master/area_kerja/I'));

			}elseif($Type == "ubah"){

				$this->model->Update('kategori','id_kategori',$id,$data);

				//redirect(site_url('master/area_kerja/U'));

			}elseif($Type == "hapus"){

				$this->model->Delete('kategori','id_kategori',$id);

				//redirect(site_url('master/area_kerja/D'));

			}

		}



		public function sub_kategori($Type="",$id=""){

			

			if($_POST){

				$data = array (

				'id_kategori' 	=> $this->input->post('id_kategori'),

				'sub_kategori'=>$this->input->post('name'),

				);

			}

		

			if($Type == "simpan"){

				$this->model->Insert('sub_kategori',$data); 

				//redirect(site_url('master/area_kerja/I'));

			}elseif($Type == "ubah"){

				$this->model->Update('sub_kategori','id_sub_kategori',$id,$data);

				//redirect(site_url('master/area_kerja/U'));

			}elseif($Type == "hapus"){

				$this->model->Delete('sub_kategori','id_sub_kategori',$id);

				//redirect(site_url('master/area_kerja/D'));

			}

		}





		public function service($Type="",$id=""){

			

			if($_POST){



				$Waktu 			= date("dmYhis");

				//$cGambar		= $this->input->post('cGambar');

				//$cDokumen		= $this->input->post('cDokumen');



				$cGambar 	= (!empty($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "" ;

					if (strlen($cGambar)>0) {

						if (is_uploaded_file($_FILES['foto']['tmp_name'])) {

						move_uploaded_file ($_FILES['foto']['tmp_name'], "assets-admin/upload/service/".$Waktu.$cGambar);

						}

					}

				

				if ($cGambar == "") {

					$data = array (

					'id_kategori'			=> $this->input->post('cIdKategori'),

					'nama'					=> $this->input->post('cNama'),

					'keterangan'			=> $this->input->post('cKeterangan'),

					'headline'				=> $this->input->post('cHeadline')

					);

				}else{

					$data = array (

					'id_kategori'			=> $this->input->post('cIdKategori'),

					'nama'					=> $this->input->post('cNama'),

					'gambar'				=> "assets-admin/upload/service/".$Waktu.$cGambar,

					'keterangan'			=> $this->input->post('cKeterangan'),

					'headline'				=> $this->input->post('cHeadline'),

					);

				}

			}

		

			if($Type == "simpan"){

				$this->model->Insert('service',$data); 

				redirect(site_url('Administrator/master/'.$this->input->post('url').'/'));

			}elseif($Type == "ubah"){

				$this->model->Update('service','id_service',$id,$data);

				redirect(site_url('Administrator/master/'.$this->input->post('url').'/'));

			}elseif($Type == "hapus"){

				$this->model->Delete('service','id_service',$id);

				

			}

		}

		

	

		function upload_foto_soal() {



		  $imagename = $_FILES['file']['name'];

          $source    = $_FILES['file']['tmp_name'];

          $type      = $_FILES['file']["type"]  ;

          $target    = "assets/upload/soal/".date("ymdhis").$imagename;

          move_uploaded_file($source, $target);



          $imagepath = date("ymdhis").$imagename;

          $save = "assets/upload/soal/" . $imagepath; //This is the new file you saving

          $file = "assets/upload/soal/" . $imagepath; //This is the original file



          list($width, $height) = getimagesize($file) ; 



          $tn = imagecreatetruecolor($width, $height) ; 

          if($type == 'image/jpeg'){

            $image = imagecreatefromjpeg($file) ;

          }elseif ($type == 'image/gif') {

            $image = imagecreatefromgif($file) ;

          }elseif ($type == 'image/png') {

            $image = imagecreatefrompng($file) ;

          } 

          imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ; 



          imagejpeg($tn, $save, 70) ;

			     echo '

				<img src="'.base_url().$target.'" 

				    id="zoom" 

				    class="img-responsive img-thumbnail img-rounded" 

				    style="height:150px;width:250px;border-radius:5px 5px 5px ">

				<input type="hidden" id="cFotoFix" 

				value="'.$target.'">	     

				 ';

			$this->session->set_userdata('foto_soal',$target);

		}



		public function pembelajaran($Type="",$id=""){

	

			if($_POST){

				if($this->session->userdata('foto_blog') == ""){

				$cGambar = $this->input->post('cFotoFix');

				}else{

					$cGambar = $this->session->userdata('foto_blog');

				}

				$cLink = $this->input->post('cLink');

				$data = array (

				'id_kelas'  		=> $this->input->post('cIdKelas'),

				'id_kategori'  		=> '1',

				'id_mapel'  		=> $this->input->post('cIdMapel'),

				'tanggal'			=> $this->Date2String($this->input->post('dTgl')),

				'judul'				=> $this->input->post('cJudul'),

				'gambar'			=> $cGambar,

				'headline'			=> $this->input->post('cHeadline'),

				'link_youtube'		=> $this->input->post('cLink'),

				'isi'				=> $this->input->post('cIsi'),

				'id_aktor'  		=> $this->input->post('cAktor'),

				'waktu'				=> $this->input->post('cJam') ,

				'status'			=> $this->input->post('cStatus') ,

				'url'				=> $this->JudulSeo($this->input->post('cJudul')).".html" 

				);

			}

		

			if($Type == "simpan"){

				$this->model->Insert('blog',$data); 

				$this->session->unset_userdata('foto_blog');

				redirect(site_url('Administrator/Master/'.$cLink.''));

			}elseif($Type == "ubah"){

				$this->model->Update('blog','id_blog',$id,$data);

				$this->session->unset_userdata('foto_blog');

				redirect(site_url('Administrator/Master/'.$cLink.''));

			}elseif($Type == "hapus"){

				$this->model->Delete('blog','id_blog',$id);

			}

		}



		public function model_pembelajaran($Type="",$id=""){

	

			if($_POST){

				if($this->session->userdata('foto_blog') == ""){

				$cGambar = $this->input->post('cFotoFix');

				}else{

					$cGambar = $this->session->userdata('foto_blog');

				}

				$cLink = $this->input->post('cLink');

				$data = array (

				'id_kelas'  		=> $this->input->post('cIdKelas'),

				'id_mapel'  		=> $this->input->post('cIdMapel'),

				'id_kategori'  		=> '2',

				'tanggal'			=> $this->Date2String($this->input->post('dTgl')),

				'judul'				=> $this->input->post('cJudul'),

				'gambar'			=> $cGambar,

				'headline'			=> $this->input->post('cHeadline'),

				'link_youtube'		=> $this->input->post('cLink'),

				'isi'				=> $this->input->post('cIsi'),

				'id_aktor'  		=> $this->input->post('cAktor'),

				'waktu'				=> $this->input->post('cJam') ,

				'status'			=> $this->input->post('cStatus') ,

				'url'				=> $this->JudulSeo($this->input->post('cJudul')).".html" 

				);

			}

		

			if($Type == "simpan"){

				$this->model->Insert('blog',$data); 

				$this->session->unset_userdata('foto_blog');

				redirect(site_url('Administrator/Master/'.$cLink.''));

			}elseif($Type == "ubah"){

				$this->model->Update('blog','id_blog',$id,$data);

				$this->session->unset_userdata('foto_blog');

				redirect(site_url('Administrator/Master/'.$cLink.''));

			}elseif($Type == "hapus"){

				$this->model->Delete('blog','id_blog',$id);

			}

		}





		function upload_foto() {



		  $imagename = $_FILES['file']['name'];

          $source    = $_FILES['file']['tmp_name'];

          $type      = $_FILES['file']["type"]  ;

          $target    = "assets/upload/blog/".date("ymdhis").$imagename;

          move_uploaded_file($source, $target);



          $imagepath = date("ymdhis").$imagename;

          $save = "assets/upload/blog/" . $imagepath; //This is the new file you saving

          $file = "assets/upload/blog/" . $imagepath; //This is the original file



          list($width, $height) = getimagesize($file) ; 



          $tn = imagecreatetruecolor($width, $height) ; 

          if($type == 'image/jpeg'){

            $image = imagecreatefromjpeg($file) ;

          }elseif ($type == 'image/gif') {

            $image = imagecreatefromgif($file) ;

          }elseif ($type == 'image/png') {

            $image = imagecreatefrompng($file) ;

          } 

          imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ; 



          imagejpeg($tn, $save, 70) ;

			     echo '

				<img src="'.base_url().$target.'" 

				    id="zoom" 

				    class="img-responsive img-thumbnail img-rounded" 

				    style="height:150px;width:250px;border-radius:5px 5px 5px ">

				<input type="hidden" id="cFotoFix" 

				value="'.$target.'">	     

				 ';

			$this->session->set_userdata('foto_blog',$target);

		}



	}