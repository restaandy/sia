<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modal extends CI_Controller {

	function __construct(){
            parent::__construct();
            $sesarray=array('AS','P','S');
            if(in_array($this->session->userdata('hold'), $sesarray)){
               $this->load->model('Model_modal');
            	$this->load->model('Model_kelas');
    			$this->load->model('Model_mapel');
    			$this->load->model('Model_user');	
            }else{
            	echo "not-found";
            }            
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
	public function modal_input_nilai_sikap(){
		if(isset($_POST['noinduk'])&&isset($_POST['id_mapel'])){
			$idsekolah=$this->session->userdata('id_sekolah');
			$taktif=$this->session->userdata('ta_aktif');
			$data['noinduk']=$_POST['noinduk'];
			$data['bk']=$_POST['bk'];
			$data['id_mapel']=$_POST['id_mapel'];
			$data['id_mengajar']=$_POST['id_mengajar'];
			$sikap=$this->Model_user->get_sikap($idsekolah,$_POST['noinduk'],$data['id_mengajar']);
		 	 $data['sikap']=$sikap;								
			$this->load->view('modal/modal_input_nilai_sikap',$data);	
		}else{
			echo "not-found";	
		}
	}
	public function modal_input_nilai(){
		if(isset($_POST['noinduk'])&&isset($_POST['id_mapel'])){
			
			$idsekolah=$this->session->userdata('id_sekolah');
			$taktif=$this->session->userdata('ta_aktif');
			$data['sk']=$this->Model_mapel->get_sk($_POST['noinduk'],$taktif,$idsekolah,$_POST['id_mapel']);
			$data['noinduk']=$_POST['noinduk'];
			$data['id_mapel']=$_POST['id_mapel'];
			$data['id_mengajar']=$_POST['id_mengajar'];
			$this->load->view('modal/modal_input_nilai',$data);	
			
			//print_r($_POST);
		}else{
			echo "not-found";	
		}
	}
	public function modal_detail_nilai(){
		if(isset($_POST['idsk'])){
			$idsekolah=$this->session->userdata('id_sekolah');
			$data['detail']=$this->Model_mapel->get_nilai_detail($_POST['idsk'],$_POST['noinduk']);
			$data['idsk']=$_POST['idsk'];
			$data['fill']=$_POST['fill'];
			$data['noinduk']=$_POST['noinduk'];
			$this->load->view('modal/modal_detail_nilai',$data);
		}else{
			echo "not-found";	
		}
	}
	public function save_detail_nilai(){
		if(isset($_POST['id_sk'])&&isset($_POST['no_induk'])){
		$data=$_POST;
		$keymap=array_keys($data);
		$arrayinsert=array();
		$arrayupdate=array();
		$idsk="";$noinduk="";
		foreach ($keymap as $key) {
		  if($key=='id_sk'){
		  	$idsk=$data[$key];
		  }else{
		  	if($key=='no_induk'){
		  	$noinduk=$data[$key];	
		  	}else{
		  	  $ex=explode('_',$key);
			  if($ex[0]=='det'){
			  	array_push($arrayupdate,array(
			  		'id'=>$ex[1],
			  		'ket'=>$data['ket_'.$ex[1]],
			  		'sub_nilai'=>$data['det_'.$ex[1]]
			  	));
			  }
			  if($ex[0]=='newdet'){
			  	array_push($arrayinsert,array(
			  		'id_sk'=>$idsk,
			  		'no_induk'=>$noinduk,
			  		'ket'=>$data['newket_'.$ex[1]],
			  		'sub_nilai'=>$data['newdet_'.$ex[1]]
			  	));
			  }	
			}  
		  }
		}
		//print_r($arrayinsert);
		//print_r($arrayupdate);

		$hasil=$this->Model_modal->save_detail($arrayinsert,$arrayupdate);
	    $taktif=$this->session->userdata('ta_aktif');
	    $hasil=$this->Model_modal->get_nilai($_POST['no_induk'],$_POST['id_sk'],$taktif);
	    
	    if(sizeof($hasil)>0){
	    	$subnilai=$this->Model_modal->get_subnilai($_POST['no_induk'],$_POST['id_sk']);
	    	$temp=0;$x=0;
	    	foreach ($subnilai as $key) {
	    		$x++;
	    	 	$temp=$temp+$key->sub_nilai;
	    	}
	    	$rata2=round(($temp/$x),2);
	    	$idnilai="";
	    	foreach ($hasil as $key) {
	    		$idnilai=$key->id;
	    	}
	    	$nilai=array(
	    		'id'=>$idnilai,
	    		'nilai'=>$rata2
	    		);
	    	$this->Model_modal->update_nilai($nilai);
	    }else{
	    	$subnilai=$this->Model_modal->get_subnilai($_POST['no_induk'],$_POST['id_sk']);
	    	$temp=0;$x=0;
	    	foreach ($subnilai as $key) {
	    		$x++;
	    	 	$temp=$temp+$key->sub_nilai;
	    	}
	    	$rata2=round(($temp/$x),2);
	    	$nilai=array(
	    		'id_sekolah'=>$this->session->userdata('id_sekolah'),
	    		'no_induk'=>$_POST['no_induk'],
	    		'id_sk'=>$_POST['id_sk'],
	    		'nilai'=>$rata2,
	    		'ta'=>$taktif
	    		);
	    	$this->Model_modal->insert_nilai($nilai);
	    }
	    echo $rata2;
	    
	   }	
	}
	public function modal_jabatan(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$idsekolah=$this->session->userdata('id');
			$data['kelas']=$this->Model_kelas->get_kelas($idsekolah);
			$temp=$this->Model_modal->get_jabatan_pegawai($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
			$data['datajabatan']=$temp;
			$this->load->view('modal/modal_jabatan',$data);
		}else{echo "not-found";}
	}
	public function modal_pengajar(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$idsekolah=$this->session->userdata('id');
			$data['pengajar']=$this->Model_modal->get_pengajar($id);
			$data['kelas']=$this->Model_kelas->get_kelas($idsekolah);
			$data['mapel']=$this->Model_mapel->get_mapel($idsekolah);
			$data['ta']=$this->Model_mapel->get_ta();
			$data['pegawai']=$this->Model_modal->get_pegawai($data['pengajar']['id_pegawai']);
			foreach ($data['pegawai'] as $key) {
				$data['pegawai']=$key['nama_pegawai'];
			}
			$this->load->view('modal/modal_pengajar',$data);
		}else{echo "not-found";}
	}
	public function modal_pegawai(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$jenkel=array("L","P");
			$agama=array("islam","kristen","budha","hindu","katholik");
			$status=array("gtt","pns");
			$temp=$this->Model_modal->get_pegawai($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['pegawai']=$temp;
		 $data['agama']=$agama;
		 $data['jenkel']=$jenkel;	
		 $data['status']=$status;
		 $data['prov']=$this->Model_modal->get_prov();
		 $data['kabkot']=$this->Model_modal->get_kabkot($temp['prov']);
		 $data['kec']=$this->Model_modal->get_kec($temp['kabkot']);
		 $data['keldesa']=$this->Model_modal->get_keldesa($temp['kec']);
		 $this->load->view('modal/modal_pegawai',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_kelas(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$tingkat=array("X","XI","XII");
			$temp=$this->Model_modal->get_kelas($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['kelas']=$temp;
		 $data['tingkat']=$tingkat;
		 $this->load->view('modal/modal_kelas',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_bidang(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$temp=$this->Model_modal->get_bidang($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['bidang']=$temp;
		 $this->load->view('modal/modal_bidang',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_paket(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$temp=$this->Model_modal->get_paket($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['paket']=$temp;
		 $this->load->view('modal/modal_paket',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_mapel(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$temp=$this->Model_modal->get_mapel($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['mapel']=$temp;
		 $this->load->view('modal/modal_mapel',$data);
		}else{
			echo "not-found";
		}
	}
	public function modal_program(){
		if(isset($_POST['id'])){
			$id=$_POST['id'];
			$temp=$this->Model_modal->get_program($id);
			foreach ($temp as $key) {
			 	$temp=$key;
			}
		 $data['program']=$temp;
		 $this->load->view('modal/modal_program',$data);
		}else{
			echo "not-found";
		}
	}
    public function get_prov(){
    	$data=$this->Model_modal->get_prov();
    	echo "<option value='0'>-- Pilih Provinsi --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['provinsi']."</option>";
    	}
    }
    public function get_kabkot(){
    	if(isset($_POST['idprov'])){
    	$data=$this->Model_modal->get_kabkot($_POST['idprov']);
    	echo "<option value='0'>-- Pilih Kab / Kota --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['kabkot']."</option>";
    	}
    }
    }
    public function get_kec(){
    	if(isset($_POST['idkabkot'])){
    	$data=$this->Model_modal->get_kec($_POST['idkabkot']);
    	echo "<option value='0'>-- Pilih Kecamatan --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['kecamatan']."</option>";
    	}
    }
    }
    public function get_keldesa(){
    	if(isset($_POST['idkec'])){
    	$data=$this->Model_modal->get_keldesa($_POST['idkec']);
    	echo "<option value='0'>-- Pilih Kelurahan --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['keldesa']."</option>";
    	}
    }
    }
    public function get_program_by_id(){
      if(isset($_POST['id'])){
    	$data=$this->Model_modal->get_program_by_id($_POST['id']);
    	echo "<option value=''>-- Pilih Program --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['program']."</option>";
    	}
    }	
    }
    public function get_paket_by_id(){
      if(isset($_POST['id'])){
    	$data=$this->Model_modal->get_paket_by_id($_POST['id']);
    	echo "<option value=''>-- Pilih Paket --</option>";
    	foreach ($data as $key) {
    		echo "<option value='".$key['id']."'>".$key['paket']."</option>";
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