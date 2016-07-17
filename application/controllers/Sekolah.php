<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_home');
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Sekolah";
		$bread['title2']="Monitoring";
		$bread['list']=array("Sekolah");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	public function sekolah(){
		$bread['title1']="Sekolah";
		$bread['title2']="Manajemen Sekolah";
		$bread['list']=array("Sekolah","Manajemen Sekolah");

		$data['title']="Manajemen Sekolah | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$data['datasekolah']=$this->Model_home->get_sekolah();

		$content=$this->load->view('sekolah/manajemen_sekolah',$data,true);
		$this->dashboard($content);
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
}	