<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_sekolah');
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Sekolah";
		$bread['title2']="Monitoring";
		$bread['list']=array("Sekolah");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	public function sekolah(){
		$bread['title1']="Sekolah";
		$bread['title2']="Manajemen Sekolah";
		$bread['list']=array("Sekolah","Manajemen Sekolah");

		$data['title']="Manajemen Sekolah | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datasekolah']=$this->Model_sekolah->get_sekolah();

		$content=$this->load->view('sekolah/manajemen_sekolah',$data,true);
		$this->dashboard($content);
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		$data=$this->input->post();
		$data_temp=array_keys($data);
		$data_input=array();
		foreach ($data_temp as $key) {
			if($key=='simpan'){
			  
			}else if($key=="password"){
		     $pas =md5($data[$key]);
             $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');		
			 $data_input[$key]=$pass;	
			}else{
			 $data_input[$key]=$data[$key];	
			}
		}
		#cek username exist
		$nuser=$this->Model_sekolah->cek_username_sekolah($data_input['username']);
		if($nuser>0){
			$this->session->set_flashdata('sekolah','Username sudah ada, silahkan ganti');
			$this->session->set_flashdata('warna','red');
			redirect('sekolah/sekolah');
		}else{

			$bool=$this->Model_sekolah->save_sekolah($data_input);
			if($bool==true){
				$this->session->set_flashdata('sekolah','Sekolah Berhasil Ditambah');
				$this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('warna','red');
				$this->session->set_flashdata('sekolah','Sekolah Gagal Ditambah');
			}
		}
		redirect('sekolah/sekolah');
		//print_r($data_input);
	}
}	