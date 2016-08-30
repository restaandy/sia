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

		$data['dataprov']=$this->db->query("SELECT * FROM tmpt_prov order by provinsi asc;");
		$data['dataprov']=$data['dataprov']->result_array();
		$content=$this->load->view('home/tempat',$data,true);
		$this->dashboard($content);
	}
	public function save_camat(){
		$datainput=$this->input->post('kecamatan');
		$idkab=$this->input->post('idkab');
		$datatemp=array();
		foreach ($datainput as $key) {
			array_push($datatemp,
				array(
					'id_kabkot'=>$idkab,
					'kecamatan'=>$key
					)
				);
		}
		$this->db->insert('tmpt_kec',$datatemp);
		redirect('Dashboard2');
	}
	public function save_lurah(){
		$datainput=$this->input->post('kelurahan');
		$idkec=$this->input->post('idkec');
		$datatemp=array();
		foreach ($datainput as $key) {
			array_push($datatemp,
				array(
					'id_kec'=>$idkec,
					'keldesa'=>$key
					)
				);
		}
		$this->db->insert('tmpt_keldesa',$datatemp);
		redirect('Dashboard2');
	}

//=========================================================================
//action----------
	public function get_kab(){
		if(isset($_POST['idprov'])){	
			$idprov=$_POST['idprov'];
			$query=$this->db->query("select * from tmpt_kabkot where id_provinsi=".$idprov."");
			$query=$query->result_array();
			?>
			<select class="form-control" id="idkab" onchange="fillkec(event)">
			<?php
			$x=1;
			foreach ($query as $key) {
				if($x==1){
				?>
				<option value="">-- pilih kabupaten --</option>
				<?php
				$x++;
				}
				?>
				<option value="<?php echo $key['id']; ?>"><?php echo $key['kabkot']; ?></option>
				<?php
			}
			?>
			</select>
			<?php
		}
	}
		public function get_kec(){
		if(isset($_POST['idkab'])){	
			$idkab=$_POST['idkab'];
			$query=$this->db->query("select * from tmpt_kec where id_kabkot=".$idkab."");
			$query=$query->result_array();
			?>
			<select class="form-control" id="idkec" onchange="fillkel(event)">

			<?php
			$x=1;
			foreach ($query as $key) {
				if($x==1){
				?>
				<option value="">-- pilih kecamatan --</option>
				<?php
				$x++;
				}
				?>
				<option value="<?php echo $key['id']; ?>"><?php echo $key['kecamatan']; ?></option>
				<?php
			}
			?>
			</select>
			<?php
		}
	}
	public function get_kel(){
		if(isset($_POST['idkec'])){	
			$idkec=$_POST['idkec'];
			$query=$this->db->query("select * from tmpt_keldesa where id_kec=".$idkec."");
			$query=$query->result_array();
			?>
			<select class="form-control" id="idkel">

			<?php
			$x=1;
			foreach ($query as $key) {
				if($x==1){
				?>
				<option value="">-- pilih kelurahan/desa --</option>
				<?php
				$x++;
				}
				?>
				<option value="<?php echo $key['id']; ?>"><?php echo $key['keldesa']; ?></option>
				<?php
			}
			?>
			</select>
			<?php
		}
	}
	public function list_kec(){
		if(isset($_POST['idkab'])){
			$data['title']="list kecamatan";
			$data['idkab']=$_POST['idkab'];
			$this->load->view('home/list_kec',$data);
		}
	}
	public function list_kel(){
		if(isset($_POST['idkec'])){
			$data['title']="list kecamata";
			$data['idkec']=$_POST['idkec'];
			$this->load->view('home/list_kel',$data);
		}
	}
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