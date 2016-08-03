<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

	function __construct(){
            parent::__construct();
            /*
            if($this->session->userdata('hold')!="AS"){
            	redirect('login');
            }else{
              $this->load->model('Model_home');	
            }
            */
            
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
		$data['datatempat']=$this->db->query("SELECT a.`id`,a.`kabkot`,b.`kecamatan` FROM tmpt_kabkot a LEFT JOIN tmpt_kec b ON a.`id`=b.`id_kabkot` WHERE b.kecamatan IS NOT NULL;");
		$data['datatempat']=$data['datatempat']->result_array();

		$data['datakab']=$this->db->query("SELECT * FROM tmpt_kabkot order by kabkot asc;");
		$data['datakab']=$data['datakab']->result_array();
		$content=$this->load->view('home/tempat',$data,true);
		$this->dashboard($content);
	}
	

//=========================================================================
//action----------
	public function req_tempat($id){
		$data['datatempat']=$this->db->query("SELECT a.`id`,a.`kabkot`,b.`kecamatan` FROM tmpt_kabkot a LEFT JOIN tmpt_kec b ON a.`id`=b.`id_kabkot` WHERE b.kecamatan IS NOT NULL and a.id=".$id.";");
		$data['datatempat']=$data['datatempat']->result_array();		
		$this->load->view('home/tempat',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}	