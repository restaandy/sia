<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
            parent::__construct();
            $sesarray=array('AS','P','S');
            if(in_array($this->session->userdata('hold'), $sesarray)){
               $this->load->model('Model_home');	
            }else{
            	redirect('login');
              	
            }
            
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
	public function tempat(){
		$bread['title1']="Dashboard";
		$bread['title2']="Monitoring";
		$bread['list']=array("Dashboard");

		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		
		$content=$this->load->view('home/tempat',$data,true);
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