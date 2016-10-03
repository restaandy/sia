<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_wali extends CI_Model
{
  public function get_perwalian($idsekolah){
    $this->db->select("*");
    $this->db->from("obj_perwalian a");
    $this->db->join("obj_kelas b","a.id_kelas=b.id");
    $this->db->where("a.id_sekolah",$idsekolah);
    $data=$this->db->get();
    $data=$data->result();
    return $data;
  }
  public function array_convert($data,$keys,$value){
    $array=array();
    foreach ($data as $key) {
      $array[$key[$keys]]=$key[$value];
    }
    return $array;
  }
  function simpan_perwalian($data){
    $this->db->insert('obj_perwalian',$data);
      if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  }
  function simpan_ekstra_siswa($data){
    $this->db->insert('kbm_ekstra_siswa',$data);
      if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  }
  
}