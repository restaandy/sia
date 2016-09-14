<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('Model_login');
            $this->load->model('Model_mapel');
    }
	public function index(){
		$this->load->view('login');
	}
	public function cek_authentikasi(){
		
	 if($this->input->post('login')==null && $this->input->post('login')!="masuk"){
	 	redirect('login');
	 }else{
	 	#cek chapta
		$capta=$this->input->post('capta');
		$auth_capta=$this->session->userdata('hasil_capta');
		if($capta!=$auth_capta){
		  $this->session->set_flashdata('login', 'chapta anda salah');	
		  redirect('login');	
		}else{
		#cek user & password
		 $this->session->unset_userdata(array('angka1','angka2','hasil_capta','id','nama_sekolah','username','id_sekolah','nama_pegawai','status'));	
		 
		 if($this->input->post('sebagai')=="AS"){
		 	
		 	$data_login=$this->Model_login->auth_login_sa($this->input->post('username'),$this->input->post('password'));
		 	$ndata=sizeof($data_login);
		 	
		 	if($ndata>0){

		 		$array_ses=array('id','nama_sekolah','username');
		 		
		 		foreach ($data_login as $key) {
		 			$data_temp=array_keys($key);
		 			$data_temp2=$data_temp;
		            foreach ($data_temp2 as $keys) {
		            	if(in_array($keys,$array_ses)){
		            		$this->session->set_userdata($keys,$key[$keys]);
		            	}
		            }
		 		}
		 		$this->session->set_userdata('hold','AS');
		 		$taaktif=$this->Model_mapel->get_ta_active();
		 		$this->session->set_userdata('ta_aktif',$taaktif['tajaran']);
		 		redirect('dashboard');
		 		//print_r($this->session->userdata());
		 	}else{
		 		$this->session->set_flashdata('login', 'kombinasi username & password tidak cocok');
		 		redirect('login');
		 	}
		 }
		 else if($this->input->post('sebagai')=="P"){
		 	$data_login=$this->Model_login->auth_login_p($this->input->post('username'),$this->input->post('password'));
		 	$ndata=sizeof($data_login);
		 	//echo $ndata;
		 	//die;
		 	if($ndata>0){

		 		$array_ses=array('id','id_sekolah','username','nama_pegawai','status');
		 		$data=array();
		 		foreach ($data_login as $key) {
		 			$data_temp=array_keys($key);
		 			$data_temp2=$data_temp;
		            foreach ($data_temp2 as $keys) {
		            	if(in_array($keys,$array_ses)){
		            		$this->session->set_userdata($keys,$key[$keys]);
		            	    $data[$keys]=$key[$keys];
		            	}
		            }
		 		}
		 		$wali=$this->Model_login->cek_wali_kelas($data['id'],$data['id_sekolah']);
		 		if(sizeof($wali)>0){
		 			foreach ($wali as $key) {
		 			 $this->session->set_userdata('jabatan','wali');
		 			 $this->session->set_userdata('id_kelas',$key['id_kelas']);
		 			}
		 			
		 		}
		 		$this->session->set_userdata('hold','P');
		 		$taaktif=$this->Model_mapel->get_ta_active();
		 		$this->session->set_userdata('ta_aktif',$taaktif['tajaran']);
		 		redirect('home');
		 }
		 else if($this->input->post('sebagai')=="S"){

		 } 
		 else{

		 }
		 echo "<h1>website dalam pembangunan</h1>";	
		}
	 }
	}
}
//=========================================================================
//action----------
}	