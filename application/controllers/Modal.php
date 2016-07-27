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
		 $data['siswa']=$temp;
		 $data['agama']=$agama;
		 $data['jenkel']=$jenkel;
		 $data['akdm_stat']=$akdm_stat;
		 $data['status_masuk']=$status_masuk;
		 $this->load->view('modal/modal_siswa',$data);
		}else{
			echo "not-found";
		}
	}
	public function create(){
		 $this->load->view('modal/modal_siswa');
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