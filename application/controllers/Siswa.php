<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_siswa');	
              $this->load->model('Model_pegawai');
            }
            
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Siswa";
		$bread['title2']="Monitoring";
		$bread['list']=array("Siswa");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	function siswa(){
		$bread['title1']="Siswa";
		$bread['title2']="Manajemen Siswa";
		$bread['list']=array("Siswa","Manajemen Siswa");

		$data['title']="Manajemen Siswa | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datasiswa']=$this->Model_siswa->get_siswa($this->session->userdata('id'));

		$content=$this->load->view('siswa/manajemen_siswa',$data,true);
		$this->dashboard($content);
	}
	function autocomplete_siswa(){
		if($this->input->post('autocomplete')=="yes"){
			$idsekolah=$this->session->userdata('id');
			$data=$this->Model_siswa->get_siswa($idsekolah,$this->input->post('value'));
			echo json_encode($data);
		}
	}
	function belajar(){
		$bread['title1']="Siswa";
		$bread['title2']="Kelas Belajar Siswa";
		$bread['list']=array("Siswa","Kelas Belajar Siswa");

		$data['title']="Kelas Belajar Siswa | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$taaktif=$this->session->userdata('ta_aktif');
		$idsekolah=$this->session->userdata('id');
		$data['datapengajar']=$this->Model_pegawai->get_pengajar($idsekolah,$taaktif);

		$data['ketkelasbelajar']=$this->Model_siswa->get_ket_kelas_belajar($this->session->userdata('id'),$taaktif);
		$data['ket_kb']=$this->Model_siswa->array_convert_nest($data['ketkelasbelajar'],"id_mengajar",array("id_mengajar","nama_kelas","nama_mapel","id_ta"));
		$data['kelasbelajar']=$this->Model_siswa->get_kelas_belajar($this->session->userdata('id'));
		$content=$this->load->view('siswa/belajar',$data,true);
		$this->dashboard($content);
	}
	function save_belajar(){
		if($this->input->post('simpan')=="yes"){
			$idsekolah=$this->session->userdata('id');
			$noind=explode(" - ", $this->input->post('no_induk'));
			$data=array(
				'no_induk'=>$noind[0],
				'id_sekolah'=>$idsekolah,
				'id_mengajar'=>$this->input->post('id_mengajar')
				);
			$hasil=$this->Model_siswa->simpan_belajar($data);
			if($hasil){
				$this->session->set_flashdata('siswa','Data telah terganti');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('siswa','Data gagal diganti');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("siswa/belajar");
		}else{
			redirect("siswa/belajar");
		}
	}
	public function edit_siswa(){
		if($this->input->post('simpan')=="yes"){
			$data=$this->input->post();
			$keymap=array_keys($data);
			$dataupdate=array();
			$nisn=$this->input->post('no_induk');
			foreach ($keymap as $key) {
				if($key!="simpan"){
				 $dataupdate[$key]=$data[$key];
				}
			}
			$hasil=$this->Model_siswa->update_siswa($dataupdate,$nisn);
			if($hasil){
				$this->session->set_flashdata('siswaupdate','Data telah terganti');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('siswaupdate','Data gagal diganti');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("siswa/siswa");
		}else{
			redirect("siswa/siswa");
		}
		
	}
	public function save_siswa(){
		if($this->input->post('simpan')=="yes"){
			$namasiswa=$this->input->post('nama');
			$no_induk=$this->input->post('no_induk');
			$no_induk_sekolah=$this->input->post('no_induk_sekolah');
			$idsekolah=$this->session->userdata('id');
			$jenkel=$this->input->post('jenkel');
			$akdm_stat=$this->input->post('akdm_stat');
			$status_masuk=$this->input->post('status_masuk');
			$pas =md5("sia".$no_induk_sekolah);
            $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');
			if($this->input->post('thn_masuk')=="ini"){
				$thnmasuk=date('Y');
			}
			if($this->input->post('thn_masuk')=="lalu"){
				$thnmasuk=$this->input->post('thn_masuk_lalu');
			}	
			$data=array(
				'nama'=>$namasiswa,
				'no_induk'=>$no_induk,
				'no_induk_sekolah'=>$no_induk_sekolah,
				'username'=>$no_induk."".$no_induk_sekolah,
				'password'=>$pass,
				'jenkel'=>$jenkel,
				'id_sekolah'=>$idsekolah,
				'thn_masuk'=>$thnmasuk,
				'akdm_stat'=>$akdm_stat,
				'status_masuk'=>$status_masuk
				);
			$hasil=$this->Model_siswa->simpan_siswa($data);
			if($hasil){
				$this->session->set_flashdata('siswa','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('siswa','Data gagal masuk, pastikan NISN berbeda');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("siswa/siswa");
		}
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
}	