<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{	
              $this->load->model('Model_wali');
               $this->load->model('Model_kelas');
               $this->load->model('Model_siswa');
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Perwalian";
		$bread['title2']="Monitoring";
		$bread['list']=array("Wali");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$idskolah=$this->session->userdata('id');
		
		$content=$this->load->view('wali/index',$data,true);
		$this->dashboard($content);
	}
	public function perwalian(){
		$bread['title1']="Ekstrakulikuler";
		$bread['title2']="Monitoring";
		$bread['list']=array("Ekstrakulikuler","Data Ekstrakulikuler");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$idskolah=$this->session->userdata('id');
		$data['siswa']=$this->Model_siswa->get_siswa($idskolah);
		$data['siswa']=$this->Model_wali->array_convert($data['siswa'],"no_induk","nama");
		$data['perwalian']=$this->Model_wali->get_perwalian($idskolah);
		$data['kelas']=$this->Model_kelas->get_kelas($idskolah);
		$content=$this->load->view('wali/data_perwalian',$data,true);
		$this->dashboard($content);
	}
	
//=========================================================================
//action----------
	public function save_perwalian(){
		if($this->input->post('simpan')=="yes"){
			$id_kelas=$this->input->post('id_kelas');
			$no_induk=$this->input->post('no_induk');
			$idsekolah=$this->session->userdata('id');
			$ta=$this->session->userdata('ta_aktif');
			$no_induk=explode(" - ",$no_induk);
			$data=array(
				'id_kelas'=>$id_kelas,
				'no_induk'=>$no_induk[0],
				'id_sekolah'=>$idsekolah,
				'ta'=>$ta
				);
			$hasil=$this->Model_wali->simpan_perwalian($data);
			if($hasil){
				$this->session->set_flashdata('wali','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('wali','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("wali/perwalian");
		}
	}
	public function save_ekstra_siswa(){
		if($this->input->post('simpan')=="yes"){
			$no_induk=explode(" - ",$this->input->post('no_induk'));
			$id_ekstra=$this->input->post('id_ekstra');
			$idsekolah=$this->session->userdata('id');
			
			$data=array(
				'id_ekstra'=>$id_ekstra,
				'no_induk'=>$no_induk[0],
				'id_sekolah'=>$idsekolah
				);
			$hasil=$this->Model_ekstra->simpan_ekstra_siswa($data);
			if($hasil){
				$this->session->set_flashdata('ekstra','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('ekstra','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("ekstra/data_ekstra");
		}
	}
}	