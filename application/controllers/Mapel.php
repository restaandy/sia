<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_mapel');	
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Mapel";
		$bread['title2']="Monitoring";
		$bread['list']=array("Mapel");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	function mapel(){
		$bread['title1']="Mapel";
		$bread['title2']="Manajemen Mapel";
		$bread['list']=array("Mapel","Manajemen Mapel");
		$data['tingkat']=array('X','XI','XII');
		$data['title']="Manajemen Mapel | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datakelas']=$this->Model_mapel->get_kelas($this->session->userdata('id'));

		$content=$this->load->view('mapel/manajemen_mapel',$data,true);
		$this->dashboard($content);
	}
	public function edit_kelas(){
		if($this->input->post('simpan')=="yes"){
				$nama_kelas=$this->input->post('nama_kelas');
				$id=$this->input->post('id');
				$tingkat=$this->input->post('tingkat');
				$dataedit=array(
					'nama_kelas'=>$nama_kelas,
					'tingkat'=>$tingkat
					);
				$hasil=$this->Model_kelas->update_kelas($dataedit,$id);
				if($hasil){
					$this->session->set_flashdata('kelasupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('kelasupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("kelas/kelas");
		}else{
			redirect("kelas/kelas");
		}
		
	}
	public function save_kelas(){
		if($this->input->post('simpan')=="yes"){
			$nama_kelas=$this->input->post('nama_kelas');
			$tingkat=$this->input->post('tingkat');
			$idsekolah=$this->session->userdata('id');
			
			$data=array(
				'nama_kelas'=>$nama_kelas,
				'tingkat'=>$tingkat,
				'id_sekolah'=>$idsekolah
				);
			$hasil=$this->Model_kelas->simpan_kelas($data);
			if($hasil){
				$this->session->set_flashdata('kelas','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('kelas','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("kelas/kelas");
		}
	}

//=========================================================================
//action----------
}	