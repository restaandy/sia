<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_sekolah extends CI_Model
{
 public function get_sekolah($nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_sekolah");
   }else{
   	$query=$this->db->query("select * from obj_sekolah where nama_sekolah like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }

  public function save_sekolah($data){
    $this->db->insert('obj_sekolah',$data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }

  public function cek_username_sekolah($uname){
    $query=$this->db->query("select username from obj_sekolah where username='".$uname."'");
    return $query->num_rows();
  }
  public function get_siswa($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_siswa where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from ob_siswa where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  
}