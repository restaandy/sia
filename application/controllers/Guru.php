<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_guru');	
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
	function guru(){
		$bread['title1']="Guru";
		$bread['title2']="Manajemen Guru";
		$bread['list']=array("Guru","Manajemen Guru");

		$data['title']="Manajemen Guru | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['dataguru']=$this->Model_guru->get_guru($this->session->userdata('id'));

		$content=$this->load->view('guru/manajemen_guru',$data,true);
		$this->dashboard($content);
	}
	public function edit_guru(){
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
	public function save_guru(){
		if($this->input->post('simpan')=="yes"){
			$namaguru=$this->input->post('nama_guru');
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
				'nama_guru'=>$namaguru,
				'username'=>$username,
				'password'=>$pass,
				'email'=>$email,
				'status'=>$status
				);
			$hasil=$this->Model_guru->simpan_guru($data,$username,$status);
			if($hasil){
				$this->session->set_flashdata('guru','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('guru','Data gagal masuk, pastikan NIP / Email berbeda');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("guru/guru");
		}
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
}	