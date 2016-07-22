<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')==null){
            	redirect('login');
            }else{}
            $this->load->model('Model_home');
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Dashboard";
		$bread['title2']="Monitoring";
		$bread['list']=array("Dashboard");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}	