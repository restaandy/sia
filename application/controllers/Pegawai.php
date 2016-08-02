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
		if(isset($_POST['autocomplete'])){
			$idsekolah=$this->session->userdata('id');
			$nama=$this->input->post('value');
			$data=$this->Model_pegawai->get_pegawai($idsekolah,$nama);
			$dataauto=array();
			foreach ($data as $key) {
				array_push($dataauto,
					array(
						'label'=>$key['nama_pegawai'],
						'value'=>$key['id']."-".$key['nama_pegawai'],
						'foto'=>$key['foto']
						)
					);
			}
			echo json_encode($dataauto); 
		}else{

		}
	}
	public function pengajar(){
		$bread['title1']="Pegawai";
		$bread['title2']="Pengajar";
		$bread['list']=array("Pegawai","Pengajar");

		$data['title']="Pengajar | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);

		$idsekolah=$this->session->userdata('id');
		$data['datapengajar']=$this->Model_pegawai->get_pengajar($idsekolah);
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
	public function save_pengajar(){
		if($this->input->post('simpan')=="yes"){
			$id_pegawai=$this->input->post('pegawai');
			$id_kelas=$this->input->post('kelas');
			$id_mapel=$this->input->post('mapel');
			$id_ta=$this->input->post('ta');
			$idsekolah=$this->session->userdata('id');
			$id_pegawai=explode("-",$id_pegawai);
			$id_pegawai=$id_pegawai[0];

			$id_kelas=explode("-",$id_kelas);
			$id_kelas=$id_kelas[0];

			$id_mapel=explode("-",$id_mapel);
			$id_mapel=$id_mapel[0];

			$id_ta=explode("-",$id_ta);
			$id_ta=$id_ta[0];

			$data=array(
				'id_sekolah'=>$idsekolah,
				'id_pegawai'=>$id_pegawai,
				'id_kelas'=>$id_kelas,
				'id_mapel'=>$id_mapel,
				'id_ta'=>$id_ta
				);
			$hasil=$this->Model_pegawai->simpan_pengajar($data);
			if($hasil){
				$this->session->set_flashdata('pengajar','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('pengajar','Data gagal masuk, ');
			    $this->session->set_flashdata('warna','red');
			}
			redirect("pegawai/pengajar");			

		}else{
			redirect("pegawai/pengajar");
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