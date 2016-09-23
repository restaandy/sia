<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="P"){
            	redirect('login');
            }else{	
              $this->load->model('Model_user');
              $this->load->model('Model_siswa');
              $this->load->model('Model_mapel');
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
		$taktif=$this->session->userdata('ta_aktif');
		$data['datajabatan']=$this->Model_user->get_jabatan($this->session->userdata('id'));
		if(sizeof($data['datajabatan'])>0){
			$jab=array();
			foreach ($data['datajabatan'] as $key) {
				$jab=$key;
			}	
			$data['jab']=$jab;
			$data['datakelas']=$this->Model_user->get_kelas_aktif($this->session->userdata('id_sekolah'),$this->session->userdata('id'),$taktif);
		}else{
		$data['datakelas']=array();
		}
		
		
		$content=$this->load->view('user/kelas',$data,true);
		$this->dashboard($content);
	}
	public function datasiswa($id){
		$idmengajar=$this->enkripsi->decode($id);
		if(is_numeric($idmengajar)){
			$bread['title1']="Kelas";
			$bread['title2']="Data Siswa";
			$bread['list']=array("Kelas","Data Siswa");
			$data['title']="Data Siswa | Sistem Akademik";	
			$data['id_mengajar']=$idmengajar;
			$data['sidebar']=$this->load->view('sidebar','',true);
			$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
			$data['datasiswa']=$this->Model_user->get_siswa_kelas($this->session->userdata('id_sekolah'),$idmengajar);
			$data['keterangan']=$this->Model_user->get_ket_kelas($idmengajar);
			$data['encrypt']=$id;
			$content=$this->load->view('user/data_siswa',$data,true);
			$this->dashboard($content);		
		}
		
	}
	

//=========================================================================
//action----------
	function save_nilai(){
		if($this->input->post('simpan')=="yes"){
			$id_mapel=$this->input->post('id_mapel');
			$id_mengajar=$this->input->post('id_mengajar');
			$noinduk=$this->input->post('noinduk');
			$id_sk_uts=$this->input->post('id_sk_uts');
			$id_sk_uas=$this->input->post('id_sk_uas');
			$nilai_uts=$this->input->post('uts');
			$nilai_uas=$this->input->post('uas');
			$taktif=$this->session->userdata('ta_aktif');
			$id_sekolah=$this->session->userdata('id_sekolah');
			$data=$this->Model_user->get_nilai_bynoinduk($noinduk,$id_mapel,$id_sekolah,$taktif);		
			$uts=0;$uas=0;
			foreach ($data as $key) {
			  if($key->id_sk==$id_sk_uts){
			  	$this->Model_user->simpan_nilai_uts_uas($key->row_nilai,$nilai_uts);
			  	$uts=1;
			  }
			  if($key->id_sk==$id_sk_uas){
			  	$this->Model_user->simpan_nilai_uts_uas($key->row_nilai,$nilai_uas);
			  	$uas=1;
			  } 			
			}
			if($uts==0){
				$this->Model_user->simpan_nilai($noinduk,$id_sk_uts,$id_sekolah,$nilai_uts,$taktif);
			}
			if($uas==0){
				$this->Model_user->simpan_nilai($noinduk,$id_sk_uas,$id_sekolah,$nilai_uas,$taktif);
			}
			$enc=$this->enkripsi->encode($id_mengajar);
			redirect('user/datasiswa/'.$enc);	
		}
	}
}	