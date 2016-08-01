<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_mapel');
              $this->load->model('Model_jurusan');	
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
		$data['databidang']=$this->Model_jurusan->get_bidang_ahli($this->session->userdata('id'));

		$data['title']="Manajemen Mapel | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datamapel']=$this->Model_mapel->get_mapel($this->session->userdata('id'));

		$content=$this->load->view('mapel/manajemen_mapel',$data,true);
		$this->dashboard($content);
	}
	public function autocomplete(){
		if(isset($_POST['autocomplete'])){
			$idsekolah=$this->session->userdata('id');
			$nama=$this->input->post('value');
			$data=$this->Model_mapel->get_mapel($idsekolah,$nama);
			$dataauto=array();
			foreach ($data as $key) {
				array_push($dataauto,
					array(
						'label'=>$key['nama_mapel'],
						'value'=>$key['id']."-".$key['nama_mapel']
						)
					);
			}
			echo json_encode($dataauto); 
		}else{

		}
	}
	public function autocompleteta(){
		if(isset($_POST['autocomplete'])){
			$nama=$this->input->post('value');
			$data=$this->Model_mapel->get_ta($nama);
			$dataauto=array();
			foreach ($data as $key) {
				array_push($dataauto,
					array(
						'label'=>$key['ta']." - ".$key['keterangan']." (".$key['tahun'].")",
						'value'=>$key['id']."-".$key['ta']
						)
					);
			}
			echo json_encode($dataauto); 
		}else{

		}
	}
	public function edit_mapel(){
		if($this->input->post('simpan')=="yes"){
			$datapost=$this->input->post();
			$keymap=array_keys($datapost);
			foreach ($keymap as $key) {
				if($key!="simpan" && $key!="id"){
					$data[$key]=$datapost[$key];
				}
			}
				$hasil=$this->Model_mapel->update_mapel($data,$this->input->post('id'));
				if($hasil){
					$this->session->set_flashdata('mapelupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('mapelupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("mapel/mapel");
		}else{
			redirect("mapel/mapel");
		}
		
	}
	public function save_mapel(){
		if($this->input->post('simpan')=="yes"){
			$datapost=$this->input->post();
			$keymap=array_keys($datapost);
			foreach ($keymap as $key) {
				if($key!="simpan"){
					$data[$key]=$datapost[$key];
				}
			}
			$data['id_sekolah']=$this->session->userdata('id');
			$hasil=$this->Model_mapel->simpan_mapel($data);
			if($hasil){
				$this->session->set_flashdata('mapel','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('mapel','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("mapel/mapel");
		}
	}

//=========================================================================
//action----------
}	