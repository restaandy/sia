<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_home extends CI_Model
{
 public function get_sekolah($nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from sekolah");
   }else{
   	$query=$this->db->query("select * from sekolah where nama_sekolah like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  
}