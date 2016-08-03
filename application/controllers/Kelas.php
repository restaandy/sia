<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{	
              $this->load->model('Model_kelas');
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
		
		$data['datakelas']=$this->Model_kelas->get_kelas_aktif($this->session->userdata('id'));
		$content=$this->load->view('kelas/kelas',$data,true);
		$this->dashboard($content);
	}
	function kelas(){
		$bread['title1']="Kelas";
		$bread['title2']="Manajemen Kelas";
		$bread['list']=array("Kelas","Manajemen Kelas");
		$data['tingkat']=array('X','XI','XII');
		$data['title']="Manajemen Kelas | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datakelas']=$this->Model_kelas->get_kelas($this->session->userdata('id'));

		$content=$this->load->view('kelas/manajemen_kelas',$data,true);
		$this->dashboard($content);
	}
	public function autocomplete(){
		if(isset($_POST['autocomplete'])){
			$idsekolah=$this->session->userdata('id');
			$nama=$this->input->post('value');
			$data=$this->Model_kelas->get_kelas($idsekolah,$nama);
			$dataauto=array();
			foreach ($data as $key) {
				array_push($dataauto,
					array(
						'label'=>$key['nama_kelas']." - ".$key['tingkat'],
						'value'=>$key['id']."-".$key['nama_kelas']
						)
					);
			}
			echo json_encode($dataauto); 
		}else{

		}
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
	public function datasiswa($id){
		$idmengajar=$this->enkripsi->decode($id);
		if(is_numeric($idmengajar)){
			$bread['title1']="Kelas";
			$bread['title2']="Data Siswa";
			$bread['list']=array("Kelas","Data Siswa");
			$data['title']="Data Siswa | Sistem Akademik";		
			$data['sidebar']=$this->load->view('sidebar','',true);
			$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
			$data['datasiswa']=$this->Model_kelas->get_siswa_kelas($this->session->userdata('id'),$idmengajar);

			$content=$this->load->view('kelas/manajemen_kelas',$data,true);
			$this->dashboard($content);		
		}
		
	}

//=========================================================================
//action----------
}	