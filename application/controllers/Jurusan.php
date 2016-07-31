<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_jurusan');	
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Jurusan";
		$bread['title2']="Monitoring";
		$bread['list']=array("Jurusan");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	function bidang_ahli(){
		$bread['title1']="Jurusan";
		$bread['title2']="Bidang Keahlian";
		$bread['list']=array("Jurusan","Bidang Keahlian");
		$data['title']="Bidang Keahlian | Sistem Akademik";		
		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['databidang']=$this->Model_jurusan->get_bidang_ahli($this->session->userdata('id'));

		$content=$this->load->view('jurusan/bidang_ahli',$data,true);
		$this->dashboard($content);
	}
	function program_ahli(){
		$bread['title1']="Jurusan";
		$bread['title2']="Program Keahlian";
		$bread['list']=array("Jurusan","Program Keahlian");
		$data['title']="Program Keahlian | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['databidang']=$this->Model_jurusan->get_bidang_ahli($this->session->userdata('id'));
		
		$data['dataprogram']=$this->Model_jurusan->get_program_ahli($this->session->userdata('id'));
		$content=$this->load->view('jurusan/program_ahli',$data,true);
		$this->dashboard($content);
	}
	function paket_ahli(){
		$bread['title1']="Jurusan";
		$bread['title2']="Paket Keahlian";
		$bread['list']=array("Jurusan","Paket Keahlian");
		$data['title']="Paket Keahlian | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['databidang']=$this->Model_jurusan->get_bidang_ahli($this->session->userdata('id'));
	  
		//if(isset($data['databidang'][0]['id'])){$idbidangfirst=$data['databidang'][0]['id'];}
		//else{$idbidangfirst=0;}
		
		//$data['dataprogram']=$this->Model_jurusan->get_program_ahli_all($this->session->userdata('id'),$idbidangfirst);
		$data['datapaket']=$this->Model_jurusan->get_paket_ahli_all($this->session->userdata('id'));

		$content=$this->load->view('jurusan/paket_ahli',$data,true);
		$this->dashboard($content);
	}
	public function save_bidang(){
		if($this->input->post('simpan')=="yes"){
			$bidang=$this->input->post('bidang');
			$keterangan=$this->input->post('keterangan');
			$idsekolah=$this->session->userdata('id');
			$data=array(
					'bidang'=>$bidang,
					'id_sekolah'=>$idsekolah,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->save_bidang($data);
				if($hasil){
					$this->session->set_flashdata('bidang','Data telah tersimoan');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('bidang','Data gagal disimpan');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/bidang_ahli");
		}else{
			redirect("jurusan/bidang_ahli");
		}		
	}
	public function save_program(){
		if($this->input->post('simpan')=="yes"){
			$id_bidang=$this->input->post('id_bidang');
			$program=$this->input->post('program');
			$keterangan=$this->input->post('keterangan');
			$idsekolah=$this->session->userdata('id');
			$data=array(
					'id_bidang'=>$id_bidang,
					'id_sekolah'=>$idsekolah,
					'program'=>$program,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->save_program($data);
				if($hasil){
					$this->session->set_flashdata('program','Data telah tersimoan');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('program','Data gagal disimpan');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/program_ahli");
		}else{
			redirect("jurusan/program_ahli");
		}		
	}
	public function save_paket(){
		if($this->input->post('simpan')=="yes"){
			print_r($this->input->post());
		
			$id_bidang=$this->input->post('id_bidang');
			$id_program=$this->input->post('id_program');
			$paket=$this->input->post('paket');
			$keterangan=$this->input->post('keterangan');
			$idsekolah=$this->session->userdata('id');
			$data=array(
					'id_bidang'=>$id_bidang,
					'id_program'=>$id_program,
					'id_sekolah'=>$idsekolah,
					'paket'=>$paket,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->save_paket($data);
				if($hasil){
					$this->session->set_flashdata('paket','Data telah tersimpan');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('paket','Data gagal disimpan');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/paket_ahli");
			
		}else{
			redirect("jurusan/paket_ahli");
		}		
	}
	public function edit_bidang(){
		if($this->input->post('simpan')=="yes"){
				$id=$this->input->post('id');
				$bidang=$this->input->post('bidang');
				$keterangan=$this->input->post('keterangan');
				
				$dataedit=array(
					'bidang'=>$bidang,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->update_bidang($dataedit,$id);
				if($hasil){
					$this->session->set_flashdata('bidangupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('bidangupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/bidang_ahli");
		}else{
			redirect("jurusan/bidang_ahli");
		}
		
	}
	public function edit_program(){
		if($this->input->post('simpan')=="yes"){
				$id=$this->input->post('id');
				$program=$this->input->post('program');
				$keterangan=$this->input->post('keterangan');
				$dataedit=array(
					'program'=>$program,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->update_program($dataedit,$id);
				if($hasil){
					$this->session->set_flashdata('programupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('programupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/program_ahli");
		}else{
			redirect("jurusan/program_ahli");
		}
		
	}
	public function edit_paket(){
		if($this->input->post('simpan')=="yes"){
				$id=$this->input->post('id');
				$paket=$this->input->post('paket');
				$keterangan=$this->input->post('keterangan');
				$dataedit=array(
					'paket'=>$paket,
					'keterangan'=>$keterangan
					);
				$hasil=$this->Model_jurusan->update_paket($dataedit,$id);
				if($hasil){
					$this->session->set_flashdata('paketupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('paketupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("jurusan/paket_ahli");
		}else{
			redirect("jurusan/paket_ahli");
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