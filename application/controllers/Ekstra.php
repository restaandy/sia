<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstra extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{	
              $this->load->model('Model_ekstra');
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Ekstrakulikuler";
		$bread['title2']="Monitoring";
		$bread['list']=array("Ekstrakulikuler");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$idskolah=$this->session->userdata('id');
		$data['ekstra']=$this->Model_ekstra->get_ekstra($idskolah);
		$content=$this->load->view('ekstra/index',$data,true);
		$this->dashboard($content);
	}
	public function data_ekstra(){
		$bread['title1']="Ekstrakulikuler";
		$bread['title2']="Monitoring";
		$bread['list']=array("Ekstrakulikuler","Data Ekstrakulikuler");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$idskolah=$this->session->userdata('id');
		$data['ekstra']=$this->Model_ekstra->get_ekstra($idskolah);
		$content=$this->load->view('ekstra/data_ekstra',$data,true);
		$this->dashboard($content);
	}
	
//=========================================================================
//action----------
	public function save_ekstra(){
		if($this->input->post('simpan')=="yes"){
			$nama_ekstra=$this->input->post('nama_ekstra');
			$deskripsi=$this->input->post('deskripsi');
			$idsekolah=$this->session->userdata('id');
			
			$data=array(
				'nama_ekstra'=>$nama_ekstra,
				'deskripsi'=>$deskripsi,
				'id_sekolah'=>$idsekolah
				);
			$hasil=$this->Model_ekstra->simpan_ekstra($data);
			if($hasil){
				$this->session->set_flashdata('ekstra','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('ekstra','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("ekstra");
		}
	}
}	