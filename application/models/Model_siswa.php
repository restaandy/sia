<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_siswa extends CI_Model
{

  public function get_siswa($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from siswa where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from siswa where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  
}