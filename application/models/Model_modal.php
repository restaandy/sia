<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_modal extends CI_Model
{
  public function get_siswa($nisn){
    $query=$this->db->get_where('obj_siswa',array('no_induk'=>$nisn));
    $query=$query->result_array();
    return $query;
  }
}