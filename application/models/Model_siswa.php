<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_siswa extends CI_Model
{

  public function get_siswa($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_siswa where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from obj_siswa where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  public function cek_nisn_siswa($nisn){
  	$this->db->get_where('obj_siswa', array('no_induk' => $nisn));
  	return $this->db->affected_rows();
  }
  public function simpan_siswa($data){
  	if($this->cek_nisn_siswa($data['no_induk_sekolah'])>0){
  		return false;
  	}else{
	    $this->db->insert('obj_siswa',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    }
  }
  
}