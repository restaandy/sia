<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_ekstra extends CI_Model
{
  public function get_ekstra($idskolah='',$nama=''){
   
    if($nama!=''){
      $this->db->select('concat(id," - ",nama_ekstra) as value,nama_ekstra as label');
      $this->db->where('nama_ekstra like ',$nama."%");
      $this->db->where('id_sekolah',$idskolah);
    }else{
      $this->db->select('*');
      $this->db->where('id_sekolah',$idskolah);
    }
    $this->db->order_by('nama_ekstra','ASC');
    $data=$this->db->get('obj_ekstra');
    $data=$data->result();
    return $data;
  }
  function simpan_ekstra($data){
    $this->db->insert('obj_ekstra',$data);
      if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  }
  
}