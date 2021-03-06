<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_modal extends CI_Model
{
  public function get_siswa($nisn){
    $query=$this->db->get_where('obj_siswa',array('no_induk'=>$nisn));
    $query=$query->result_array();
    return $query;
  }
  public function get_kelas($id){
    $query=$this->db->get_where('obj_kelas',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_pengajar($id){
    $query=$this->db->get_where('kbm_mengajar',array('id'=>$id));
    $query=$query->result_array();
    $data=array();
    foreach ($query as $key) {
      $data=$key;
    }
    return $data;
  }
  public function get_jabatan_pegawai($id){
    $query=$this->db->query("SELECT a.id,a.id_kelas,b.nip,b.nama_pegawai,a.jabatan,c.nama_kelas,c.tingkat FROM obj_jabatan a LEFT JOIN obj_pegawai b ON a.id_pegawai=b.id LEFT JOIN obj_kelas c ON a.id_kelas=c.id WHERE a.id=".$id.";");
    $query=$query->result_array();
   return $query;
  }
  public function get_mapel($id){
    $query=$this->db->get_where('obj_mapel',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_pegawai($id){
    $query=$this->db->get_where('obj_pegawai',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
 public function get_bidang($id){
    $query=$this->db->get_where('jur_bidang',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
   public function get_program($id){
    $query=$this->db->get_where('jur_program',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_paket($id){
    $query=$this->db->get_where('jur_paket',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_program_by_id($idbidang){
    $query=$this->db->get_where('jur_program',array('id_bidang'=>$idbidang));
    $query=$query->result_array();
    return $query;
  }
  public function get_paket_by_id($idpaket){
    $query=$this->db->get_where('jur_paket',array('id_program'=>$idpaket));
    $query=$query->result_array();
    return $query;
  }
  public function get_prov(){
    $query=$this->db->get('tmpt_prov');
    $query=$query->result_array();
    return $query;	
  }
  public function get_kabkot($idprov){
    $query=$this->db->get_where('tmpt_kabkot',array('id_provinsi'=>$idprov));
    $query=$query->result_array();
    return $query;	
  }
   public function get_kec($idkabkot){
    $query=$this->db->get_where('tmpt_kec',array('id_kabkot'=>$idkabkot));
    $query=$query->result_array();
    return $query;	
  }
   public function get_keldesa($idkec){
    $query=$this->db->get_where('tmpt_keldesa',array('id_kec'=>$idkec));
    $query=$query->result_array();
    return $query;	
  }
  public function get_nilai($noinduk,$idsk,$ta){
    $this->db->where('no_induk',$noinduk);
    $this->db->where('id_sk',$idsk);
    $this->db->where('ta',$ta);
    $data=$this->db->get('kbm_nilai');
    $data=$data->result();
    return $data;
  }
  public function get_subnilai($noinduk,$idsk){
    $this->db->where('no_induk',$noinduk);
    $this->db->where('id_sk',$idsk);
    $data=$this->db->get('kbm_subnilai');
    $data=$data->result();
    return $data;
  }
  public function update_nilai($data){
    $this->db->where('id',$data['id']);
    $this->db->update('kbm_nilai',$data);
  }
  public function insert_nilai($data){
    $this->db->insert('kbm_nilai',$data);
  }
  public function save_detail($insert,$update){
    $hasil=0;
     if(sizeof($insert)>0){
       $this->db->insert_batch('kbm_subnilai',$insert);
       $hasil=$hasil+$this->db->affected_rows(); 
      }
     if(sizeof($update)>0){
      $this->db->update_batch('kbm_subnilai',$update,'id');
      $hasil=$hasil+$this->db->affected_rows();
     } 
    return true;
  }
}