<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="P"){
            	redirect('login');
            }else{	
              $this->load->model('Model_user');
              $this->load->model('Model_siswa');
              $this->load->model('Model_mapel');
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Kelas";
		$bread['title2']="Monitoring";
		$bread['list']=array("Kelas");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$data['datawali']=$this->Model_user->get_wali_kelas($this->session->userdata('id_sekolah'));
		$data['datakelas']=$this->Model_user->get_kelas_aktif($this->session->userdata('id_sekolah'),$this->session->userdata('id'));
		$content=$this->load->view('user/kelas',$data,true);
		$this->dashboard($content);
	}
	
	public function datasiswa($id){
		$idmengajar=$this->enkripsi->decode($id);
		if(is_numeric($idmengajar)){
			$bread['title1']="Kelas";
			$bread['title2']="Data Siswa";
			$bread['list']=array("Kelas","Data Siswa");
			$data['title']="Data Siswa | Sistem Akademik";	
			$data['id_mengajar']=$idmengajar;
			//$data['mapel']=
			$data['sidebar']=$this->load->view('sidebar','',true);
			$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
			$data['datasiswa']=$this->Model_user->get_siswa_kelas($this->session->userdata('id_sekolah'),$idmengajar);
			$data['keterangan']=$this->Model_user->get_ket_kelas($idmengajar);
			$data['encrypt']=$id;
			$content=$this->load->view('user/data_siswa',$data,true);
			$this->dashboard($content);		
		}
		
	}
	

//=========================================================================
//action----------
}	