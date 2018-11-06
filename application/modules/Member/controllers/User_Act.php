<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Act extends CI_Controller {

    public function __construct(){
        
        parent::__construct();
              
        //MenLoad model yang berada di Folder Model dan namany model
        $this->load->model('model');
        $this->load->model('relasi');
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
      list($cDate,$cMount,$cYear) = explode("-",$dTgl) ;
      if(strlen($cDate) == 2){
        $dTgl = $cYear . "-" . $cMount . "-" . $cDate ;
      }
      return $dTgl ; 
    }
    
    public  function String2Date($dTgl){
      //return 22-11-2012  
      list($cYear,$cMount,$cDate) = explode("-",$dTgl) ;
      if(strlen($cYear) == 4){
        $dTgl = $cDate . "-" . $cMount . "-" . $cYear ;
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

    public function user($Type="",$id=""){
      
      if($_POST){ 
        if($this->input->post('password') == ""){
          $data = array (
          'tgl_register'  => $this->Date2String($this->input->post('tanggal_register')),
          'nama'      => $this->input->post('nama'),
          'asal_sekolah'      => $this->input->post('asal_sekolah'),
          'username'    => $this->input->post('username'),
          'level'     => $this->input->post('level')
          );
        }else{
          $data = array (
          'tgl_register'  => $this->Date2String($this->input->post('tanggal_register')),
          'nama'      => $this->input->post('nama'),
          'asal_sekolah'      => $this->input->post('asal_sekolah'),
          'username'    => $this->input->post('username'),
          'password'    => md5($this->input->post('password')),
          'level'     => $this->input->post('level')
          );
        }
        
      }
    
      if($Type == "simpan"){
        $this->model->Insert('username',$data); 
        //redirect(site_url('master/area_kerja/I'));
      }elseif($Type == "ubah"){
        $this->model->Update('username','id_user',$id,$data);
        //redirect(site_url('master/area_kerja/U'));
      }elseif($Type == "hapus"){
        $this->model->Delete('username','id_user',$id);
        //redirect(site_url('master/area_kerja/D'));
      }
    }

    public function bukutamu($Type="",$id=""){
      
      if($Type == "hapus"){
        $this->model->Delete('bukutamu','id_bukutamu',$id);
        //redirect(site_url('master/area_kerja/D'));
      }
    }

}