<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
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
	function pegawai(){
		$bread['title1']="Pegawai";
		$bread['title2']="Manajemen Pegawai";
		$bread['list']=array("Pegawai","Manajemen Pegawai");

		$data['title']="Manajemen Pegawai | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datapegawai']=$this->Model_pegawai->get_pegawai($this->session->userdata('id'));

		$content=$this->load->view('pegawai/manajemen_pegawai',$data,true);
		$this->dashboard($content);
	}
	public function autocomplete(){
		$data=array(
			array('value'=>'aaa',
			'label'=>'eee'),
		    array('value'=>'ddd',
			'label'=>'fff')
			);
		echo json_encode($data);
	}
	public function pengajar(){
		$bread['title1']="Pegawai";
		$bread['title2']="Pengajar";
		$bread['list']=array("Pegawai","Pengajar");

		$data['title']="Pengajar | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$content=$this->load->view('pegawai/pengajar',$data,true);
		$this->dashboard($content);
	}
	public function edit_pegawai(){
		if($this->input->post('simpan')=="yes"){
				$data=$this->input->post();
				$datakey=array_keys($data);
				$dataedit=array();
				foreach ($datakey as $key) {
					if($key!="simpan"){
						$dataedit[$key]=$data[$key];
					}
				}
				$hasil=$this->Model_pegawai->update_pegawai($dataedit,$dataedit['id'],$dataedit['status']);
				if($hasil){
					$this->session->set_flashdata('pegawaiupdate','Data telah terganti');
			    	$this->session->set_flashdata('warna','blue');
				}else{
					$this->session->set_flashdata('pegawaiupdate','Data gagal diganti');
			    	$this->session->set_flashdata('warna','red');
				}
			redirect("pegawai/pegawai");
		}else{
			redirect("pegawai/pegawai");
		}
		
	}
	public function save_pegawai(){
		if($this->input->post('simpan')=="yes"){
			$namapegawai=$this->input->post('nama_pegawai');
			$nip=$this->input->post('nip');
			$email=$this->input->post('email');
			$status=$this->input->post('status');
			$idsekolah=$this->session->userdata('id');
			if($status=="gtt"){
				$username=$email;
				$pas=md5("gurumulia");
                $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');
			}else{
				$username=$nip;
				$pas=md5("sia".$nip);
                $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');
			}
			$data=array(
				'nip'=>$nip,
				'id_sekolah'=>$idsekolah,
				'nama_pegawai'=>$namapegawai,
				'username'=>$username,
				'password'=>$pass,
				'email'=>$email,
				'status'=>$status
				);
			$hasil=$this->Model_pegawai->simpan_pegawai($data,$username,$status);
			if($hasil){
				$this->session->set_flashdata('pegawai','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('pegawai','Data gagal masuk, pastikan NIP / Email berbeda');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("pegawai/pegawai");
		}
	}

//=========================================================================
//action----------

}	