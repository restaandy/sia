<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_guru extends CI_Model
{

  public function get_guru($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_guru where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from obj_guru where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  public function cek_user_guru($username,$status){
    if($status=="gtt"){$kolom="email";}
    else{$kolom="nip";}  
  	$this->db->get_where('obj_guru', array($kolom => $username));
  	return $this->db->affected_rows();
  }
  public function update_siswa($data,$where){
    $this->db->where('no_induk', $where);
    $this->db->update('obj_siswa', $data);
     if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  }
  public function simpan_guru($data,$username,$status){
  	if($this->cek_user_guru($username,$status)>0){
  		return false;
  	}else{
	    $this->db->insert('obj_guru',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    }
  }
  
}