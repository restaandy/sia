<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_home');
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		
		$bread['title1']="Dashboard";
		$bread['title2']="Monitoring";
		$bread['list']=array("Sekolah","Dashboard");
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		

		$content=$this->load->view('home/dashboard',$data,true);
		$this->dashboard($content);
	}
	public function sekolah(){
		$data['title']="Manajemen Sekolah | Sistem Akademik";		
		$data['sidebar']=$this->load->view('sidebar','',true);

		$bread['title1']="Sekolah";
		$bread['title2']="Manajemen Sekolah";
		$bread['list']=array("Sekolah","Manajemen Sekolah");
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		

		$content=$this->load->view('home/manajemen_sekolah',$data,true);
		$this->dashboard($content);
	}
}
