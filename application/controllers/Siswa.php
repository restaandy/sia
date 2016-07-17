<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_siswa');
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
		$data['datasiswa']=$this->Model_siswa->get_siswa(1);

		$content=$this->load->view('siswa/manajemen_siswa',$data,true);
		$this->dashboard($content);
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
}	