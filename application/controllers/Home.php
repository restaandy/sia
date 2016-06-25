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
		$bread['title1']="Dashboard";
		$bread['title2']="Monitoring";
		$bread['list']=array("Sekolah","Dashboard");

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

		$content=$this->load->view('home/manajemen_sekolah',$data,true);
		$this->dashboard($content);
	}
	public function kotakota(){
		$myfile = fopen("./kotakota.txt", "r") or die("Unable to open file!");
		// Output one line until end-of-file
		while(!feof($myfile)) {
			$this->db->query("insert into kabkota (id,kabkota) values (10,'".fgets($myfile)."')");
		  //echo fgets($myfile) . "<br>";
		}
		fclose($myfile);
	}

//=========================================================================
//action----------
	public function save_sekolah(){
		print_r($this->input->post());
	}
}	