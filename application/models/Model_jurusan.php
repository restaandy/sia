<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_jurusan extends CI_Model
{
  public function get_bidang_ahli($idsekolah){
    $query=$this->db->get_where('jur_bidang',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }
  public function get_program_ahli($idsekolah){
    $query=$this->db->get_where('jur_program',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }
  public function get_paket_ahli($idsekolah){
    $query=$this->db->get_where('jur_paket',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  } 
  
  public function get_kelas($id){
    $query=$this->db->get_where('obj_kelas',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_guru($id){
    $query=$this->db->get_where('obj_guru',array('id'=>$id));
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