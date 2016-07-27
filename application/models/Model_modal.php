<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_modal extends CI_Model
{
  public function get_siswa($nisn){
    $query=$this->db->get_where('obj_siswa',array('no_induk'=>$nisn));
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