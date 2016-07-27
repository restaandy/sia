<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modal extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_modal');
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function modal_siswa(){
		if(isset($_POST['nisn'])){
		 $nisn=$_POST['nisn'];
		 $jenkel=array("L","P");
		 $akdm_stat=array("aktif","lulus","do","wafat");
		 $status_masuk=array("baru","pindahan");
		 $agama=array("islam","kristen","budha","hindu","katholik");
		 $temp=$this->Model_modal->get_siswa($nisn);
		 foreach ($temp as $key) {
		 	$temp=$key;
		 }

		 $data['prov']=$this->Model_modal->get_prov();
		 $data['kabkot']=$this->Model_modal->get_kabkot($temp['prov']);
		 $data['kec']=$this->Model_modal->get_kec($temp['kabkot']);
		 $data['keldesa']=$this->Model_modal->get_keldesa($temp['kec']);

		 $data['siswa']=$temp;
		 $data['agama']=$agama;
		 $data['jenkel']=$jenkel;
		 $data['akdm_stat']=$akdm_stat;
		 $data['nisn']=$nisn;
		 $data['status_masuk']=$status_masuk;
		 $this->load->view('modal/modal_siswa',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_guru(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$jenkel=array("L","P");
			$agama=array("islam","kristen","budha","hindu","katholik");
			$status=array("gtt","pns");
			$temp=$this->Model_modal->get_guru($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['guru']=$temp;
		 $data['agama']=$agama;
		 $data['jenkel']=$jenkel;	
		 $data['status']=$status;
		 $data['prov']=$this->Model_modal->get_prov();
		 $data['kabkot']=$this->Model_modal->get_kabkot($temp['prov']);
		 $data['kec']=$this->Model_modal->get_kec($temp['kabkot']);
		 $data['keldesa']=$this->Model_modal->get_keldesa($temp['kec']);
		 $this->load->view('modal/modal_guru',$data);
		}else{
			echo "not-found";
		}
	}
    public function get_prov(){
    	$data=$this->Model_modal->get_prov();
    	echo "<option>-- Pilih Provinsi --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['provinsi']."</option>";
    	}
    }
    public function get_kabkot(){
    	if(isset($_POST['idprov'])){
    	$data=$this->Model_modal->get_kabkot($_POST['idprov']);
    	echo "<option>-- Pilih Kab / Kota --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['kabkot']."</option>";
    	}
    }
    }
    public function get_kec(){
    	if(isset($_POST['idkabkot'])){
    	$data=$this->Model_modal->get_kec($_POST['idkabkot']);
    	echo "<option>-- Pilih Kecamatan --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['kecamatan']."</option>";
    	}
    }
    }
    public function get_keldesa(){
    	if(isset($_POST['idkec'])){
    	$data=$this->Model_modal->get_keldesa($_POST['idkec']);
    	echo "<option>-- Pilih Kelurahan --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['keldesa']."</option>";
    	}
    }
    }
	public function index(){
		$bread['title1']="Home";
		$bread['title2']="Monitoring";
		$bread['list']=array("Home","Dashboard");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}

}	