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
}