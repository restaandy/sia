<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
            parent::__construct();
            if($this->session->userdata('hold')!="P"){
            	redirect('login');
            }else{	
              $this->load->model('Model_user');
              $this->load->model('Model_siswa');
              $this->load->model('Model_mapel');
            }
    }
	public function dashboard($content){
		$data['content']=$content;
		$this->load->view('index',$data);
	}
	public function index(){
		$bread['title1']="Kelas";
		$bread['title2']="Monitoring";
		$bread['list']=array("Kelas");
		$data['title']="Sistem Akademik";
		$data['sidebar']=$this->load->view('sidebar','',true);
		$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
		$taktif=$this->session->userdata('ta_aktif');
		$data['datajabatan']=$this->Model_user->get_jabatan($this->session->userdata('id_sekolah'),$this->session->userdata('id'),"guru");
		if(sizeof($data['datajabatan'])>0){
			$jab=array();
			foreach ($data['datajabatan'] as $key) {
				$jab=$key;
			}	
			$data['jab']=$jab;
			$data['datakelas']=$this->Model_user->get_kelas_aktif($this->session->userdata('id_sekolah'),$this->session->userdata('id'),$taktif);
		}else{
		$data['datakelas']=array();
		}
		
		
		$content=$this->load->view('user/kelas',$data,true);
		$this->dashboard($content);
	}
	public function datasiswa($id){
		$idmengajar=$this->enkripsi->decode($id);
		if(is_numeric($idmengajar)){
			$bread['title1']="Kelas";
			$bread['title2']="Data Siswa";
			$bread['list']=array("Kelas","Data Siswa");
			$data['title']="Data Siswa | Sistem Akademik";	
			$data['id_mengajar']=$idmengajar;
			$data['sidebar']=$this->load->view('sidebar','',true);
			$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
			$data['datasiswa']=$this->Model_user->get_siswa_kelas($this->session->userdata('id_sekolah'),$idmengajar);
			$data['keterangan']=$this->Model_user->get_ket_kelas($idmengajar);
			$data['encrypt']=$id;
			$content=$this->load->view('user/data_siswa',$data,true);
			$this->dashboard($content);		
		}	
	}
	public function perwalian(){
		if(in_array("wali",$this->session->userdata('jabatan'))){
				$bread['title1']="Perwalian";
				$bread['title2']="Data Siswa";
				$bread['list']=array("Perwalian");
				$data['title']="Data Siswa | Sistem Akademik";	
				$data['sidebar']=$this->load->view('sidebar','',true);
				$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
				$data['idsekolah']=$this->session->userdata('id_sekolah');
				$data['idkelas']=$this->session->userdata('id_kelas');
				$data['ta']=$this->session->userdata('ta_aktif');
				$data['siswa_wali']=$this->Model_user->get_siswa_perwalian($data['idsekolah'],$data['idkelas'],$data['ta']);
				$content=$this->load->view('user/perwalian',$data,true);
				$this->dashboard($content);			
		}else{
			redirect("home");
		}
	}
	function edit_ekstra(){
		$id=$this->input->post("id");
		$id_ekstra=$this->input->post("id_ekstra");
		$nilai=$this->input->post("nilai");
		$noinduk=$this->input->post("no_induk");
		$this->db->where("id",$id);
		$this->db->update("kbm_nilai_ekstra",array('id_ekstra'=>$id_ekstra,'nilai'=>$nilai));
		redirect('user/perwalian');

	}
	function save_ekstra(){
		
		$id_ekstra=$this->input->post("id_ekstra");
		$nilai=$this->input->post("nilai");
		$ta=$this->session->userdata('ta_aktif');
		$noinduk=$this->input->post("no_induk");
		$this->db->insert("kbm_nilai_ekstra",array('id_ekstra'=>$id_ekstra,'nilai'=>$nilai,'no_induk'=>$noinduk,'ta'=>$ta));
		redirect('user/perwalian');
	}
	public function ekstra($id){
		if(in_array("wali",$this->session->userdata('jabatan'))){
				$noinduk=$this->enkripsi->decode($id);
				if(is_numeric($noinduk)){
				$bread['title1']="Perwalian";
				$bread['title2']="Ekstra";
				$bread['list']=array("Perwalian");
				$data['title']="Data Siswa | Sistem Akademik";	
				$data['sidebar']=$this->load->view('sidebar','',true);
				$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
				$data['idsekolah']=$this->session->userdata('id_sekolah');
				$data['siswa']=$this->Model_siswa->get_siswa_by_noinduk($noinduk);
				$data['ekstra_siswa']=$this->Model_user->get_ekstra_siswa($data['idsekolah'],$noinduk);
				$data['ekstra']=$this->Model_user->get_ekstra($data['idsekolah']);
				$ta=$this->session->userdata('ta_aktif');
				$data['nilai_ekstra']=$this->Model_user->get_nilai_ekstra($noinduk,$ta);
				$content=$this->load->view('user/ekstra',$data,true);
				$this->dashboard($content);
				}else{
					redirect("home");
				}			
		}else{
			redirect("home");
		}
	}
	public function perwalian_detail($id){
		if(in_array("wali",$this->session->userdata('jabatan'))){
			$noinduk=$this->enkripsi->decode($id);
			if(is_numeric($noinduk)){
				$bread['title1']="Kelas";
				$bread['title2']="Data Siswa";
				$bread['list']=array("Perwalian","Data Siswa");
				$data['title']="Data Siswa | Sistem Akademik";	
				$data['sidebar']=$this->load->view('sidebar','',true);
				$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
				$data['ta']=$this->session->userdata('ta_aktif');
				$data['datasiswa1']=$this->Model_user->get_detail_siswa_perwalian($this->session->userdata('id_sekolah'),$noinduk,$data['ta'],1);
				$data['datasiswa2']=$this->Model_user->get_detail_siswa_perwalian($this->session->userdata('id_sekolah'),$noinduk,$data['ta'],2);
				$ar_peg=array();
				$ar_mpl=array();
				foreach ($data['datasiswa1'] as $key) {
					array_push($ar_peg,$key->id_pegawai);
					array_push($ar_mpl,$key->id_mapel);
				}
				foreach ($data['datasiswa2'] as $key) {
					array_push($ar_peg,$key->id_pegawai);
					array_push($ar_mpl,$key->id_mapel);
				}
				
				$data['ket_siswa']=$this->Model_user->get_siswa($noinduk);
				$pgw=$this->Model_user->get_pegawai_in($ar_peg);
				$mpl=$this->Model_user->get_mapel_in($ar_mpl);
				$arc_peg=$this->Model_user->array_convert_nest($pgw,"id",array("nama_pegawai"));
				$arc_mpl=$this->Model_user->array_convert_nest($mpl,"id",array("nama_mapel"));
				$data['arc_peg']=$arc_peg;
				$data['arc_mpl']=$arc_mpl;
				$data['sikap']=$this->Model_user->get_sikap_rapot($this->session->userdata('id_sekolah'),$this->session->userdata('id'),$this->session->userdata('ta_aktif'),$noinduk);
				$content=$this->load->view('user/perwalian_detail',$data,true);
				$this->dashboard($content);	
			}
		}	
	}
	public function rapor(){
		if(in_array("wali",$this->session->userdata('jabatan'))){
				$bread['title1']="Kelas";
				$bread['title2']="Data Siswa";
				$bread['list']=array("Kelas","Rapor");
				$data['title']="Data Siswa | Sistem Akademik";	
				$data['sidebar']=$this->load->view('sidebar','',true);
				$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
				
				$content=$this->load->view('user/rapor',$data,true);
				$this->dashboard($content);			
		}else{
			redirect("home");
		}
	}
	public function bk(){
		if(in_array("bk",$this->session->userdata('jabatan'))){
			$bread['title1']="Kelas";
			$bread['title2']="Monitoring";
			$bread['list']=array("Bimbingan Konseling");
			$data['title']="Sistem Akademik";
			$data['sidebar']=$this->load->view('sidebar','',true);
			$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
			$taktif=$this->session->userdata('ta_aktif');
			$data['datajabatan']=$this->Model_user->get_jabatan($this->session->userdata('id_sekolah'),$this->session->userdata('id'),"bk");
			if(sizeof($data['datajabatan'])>0){
				$jab=array();
				foreach ($data['datajabatan'] as $key) {
					$jab=$key;
				}	
				$data['jab']=$jab;
				$data['datakelas']=$this->Model_user->get_kelas_aktif($this->session->userdata('id_sekolah'),$this->session->userdata('id'),$taktif);
			}else{
			$data['datakelas']=array();
			}
			
			$content=$this->load->view('user/bk',$data,true);
			$this->dashboard($content);
		}else{
			redirect("home");
		}
	}
	public function siswa_bk($id){
		if(in_array("bk",$this->session->userdata('jabatan'))){
			$idmengajar=$this->enkripsi->decode($id);
			if(is_numeric($idmengajar)){
				$bread['title1']="Kelas";
				$bread['title2']="Data Siswa";
				$bread['list']=array("Kelas","Data Siswa");
				$data['title']="Data Siswa | Sistem Akademik";	
				$data['id_mengajar']=$idmengajar;
				$data['sidebar']=$this->load->view('sidebar','',true);
				$data['breadcumb']=$this->load->view('breadcumb',$bread,true);
				$data['datasiswa']=$this->Model_user->get_siswa_kelas($this->session->userdata('id_sekolah'),$idmengajar);
				$data['keterangan']=$this->Model_user->get_ket_kelas($idmengajar);
				$data['encrypt']=$id;
				$content=$this->load->view('user/data_siswa_bk',$data,true);
				$this->dashboard($content);		
			}
		}else{
			redirect("home");
		}	
	}
	
//=========================================================================
//action----------
	function save_sikap_wali(){
		if($this->input->post('simpan')=="yes"){
			$data=array(
				"no_induk"=>$this->input->post("no_induk"),
				"id_sekolah"=>$this->session->userdata("id_sekolah"),
				"id_wali"=>$this->session->userdata("id"),
				"nilai_sikap"=>$this->input->post("sikap"),
				"ta"=>$this->session->userdata("ta_aktif"),
				"semester"=>$this->input->post("semester")
				);
			$hasil=$this->Model_user->simpan_sikap_wali($data);
			$idskolah=$this->session->userdata("id_sekolah");
			$semester=$this->input->post("semester");
			$ta=$this->session->userdata("ta_aktif");
			$idwali=$this->session->userdata("id");
			$noinduk=$this->input->post("no_induk");
			$this->Model_user->generate_rapot($idskolah,$semester,$ta,$noinduk,$idwali);
			//$noinduk=$this->enkripsi->encode($this->input->post("no_induk"));
			$data['rapot']=$this->Model_user->data_rapot($idskolah,$noinduk,$ta,$semester);
			$data['semester']=$semester;
			$data['noinduk']=$noinduk;
			$data['sekolah']=$this->Model_user->get_sekolah($this->session->userdata("id_sekolah"));
			$data['siswa']=$this->Model_user->get_siswa_rapot($noinduk);
			$data['kelas']=$this->Model_user->get_kelas_rapot($noinduk);
			$data['ta']=$ta;
			$data['sikap']=$this->input->post("sikap");
			$this->load->view('user/rapor',$data);

			//$noinduk=$this->enkripsi->encode($this->input->post("no_induk"));
			//redirect("user/perwalian_detail/".$noinduk);
		}
	}
	function generate_rapot(){
		if($this->input->post('simpan')=="yes"){
		$idskolah=$this->session->userdata("id_sekolah");
		$semester=$this->input->post("semester");
		$ta=$this->session->userdata("ta_aktif");
		$idwali=$this->session->userdata("id");
		$noinduk=$this->input->post("no_induk");
		$this->Model_user->generate_rapot($idskolah,$semester,$ta,$noinduk,$idwali);
		//$noinduk=$this->enkripsi->encode($this->input->post("no_induk"));
		$data['rapot']=$this->Model_user->data_rapot($idskolah,$noinduk,$ta,$semester);
		$this->load->view('user/rapor',$data);
		//redirect("user/perwalian_detail/".$noinduk);
		}
	}
	function save_nilai(){
		if($this->input->post('simpan')=="yes"){
			$id_mapel=$this->input->post('id_mapel');
			$id_mengajar=$this->input->post('id_mengajar');
			$noinduk=$this->input->post('noinduk');
			$id_sk_uts=$this->input->post('id_sk_uts');
			$id_sk_uas=$this->input->post('id_sk_uas');
			$nilai_uts=$this->input->post('uts');
			$nilai_uas=$this->input->post('uas');
			$semester=$this->input->post('semester');
			$taktif=$this->session->userdata('ta_aktif');
			$id_sekolah=$this->session->userdata('id_sekolah');
			$data=$this->Model_user->get_nilai_bynoinduk($noinduk,$id_mapel,$id_sekolah,$taktif);		
			$uts=0;$uas=0;
			foreach ($data as $key) {
			  if($key->id_sk==$id_sk_uts){
			  	$this->Model_user->simpan_nilai_uts_uas($key->row_nilai,$nilai_uts);
			  	$uts=1;
			  }
			  if($key->id_sk==$id_sk_uas){
			  	$this->Model_user->simpan_nilai_uts_uas($key->row_nilai,$nilai_uas);
			  	$uas=1;
			  } 			
			}
			if($uts==0){
				$this->Model_user->simpan_nilai($noinduk,$id_sk_uts,$id_sekolah,$nilai_uts,$taktif);
			}
			if($uas==0){
				$this->Model_user->simpan_nilai($noinduk,$id_sk_uas,$id_sekolah,$nilai_uas,$taktif);
			}

			$hasil=$this->Model_mapel->generate_nilai($id_sekolah,$id_mengajar,$noinduk,$taktif,$id_mapel,$semester);
			if($hasil){
				$this->session->set_flashdata('nilai','Data sudah masuk');
			    $this->session->set_flashdata('warna','blue');
			}else{
				$this->session->set_flashdata('nilai','Data gagal masuk,');
			    $this->session->set_flashdata('warna','red');
			}
			$enc=$this->enkripsi->encode($id_mengajar);
			redirect('user/datasiswa/'.$enc);	
		}
	}
	function save_nilai_sikap(){
		if($this->input->post('simpan')=="yes"){
		  $bk=$this->input->post('is_bk');
		  $semester=$this->input->post('semester');
		  $id_mengajar=$this->input->post('id_mengajar');
		  if($this->input->post('id_nilai_sikap')!=NULL){
		  	$data['id']=$this->input->post('id_nilai_sikap');
		  	$sikap=$this->input->post('sikap');
		  	$nsikap=array();
		  	foreach ($sikap as $key) {
		  		if($key!=""){
		  			array_push($nsikap,$key);
		  		}
		  	}
		  	$data['sikap']=implode(",",$nsikap);
		  	$hasil=$this->Model_user->update_nilai_sikap($data);
		  }else{
		  	$data['no_induk']=$this->input->post('no_induk');
		  	$data['id_mengajar']=$this->input->post('id_mengajar');
		  	$data['id_sekolah']=$this->session->userdata('id_sekolah');
		  	$data['semester']=$semester;
		  	$sikap=$this->input->post('sikap');
		  	$data['sikap']=implode(",",$sikap);
		  	$hasil=$this->Model_user->simpan_nilai_sikap($data);
		  }
		  $enc=$this->enkripsi->encode($id_mengajar);
		  if($bk=="yes"){
		  	redirect('user/siswa_bk/'.$enc);
		  }else{
		  	redirect('user/datasiswa/'.$enc);
		  }
		}
	}
}	