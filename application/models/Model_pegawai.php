<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_pegawai extends CI_Model
{

  public function get_pegawai($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_pegawai where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from obj_pegawai where id_sekolah=".$idskolah." and nama_pegawai like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  public function cek_user_pegawai($username,$status){
    if($status=="gtt"){$kolom="email";}
    else{$kolom="nip";}  
  	$this->db->get_where('obj_pegawai', array($kolom=>$username));
  	return $this->db->affected_rows();
  }
  public function cek_user_update_pegawai($username,$status,$id){
    if($status=="gtt"){
      $this->db->select('id,nip,email');
      $this->db->from('obj_pegawai');
      $this->db->where('id !=', $id);
      $this->db->where('email', $username);
      $this->db->get();
      //$this->db->where('obj_guru', array('email'=>$username,'id !='=>$id));
    }
    else{
      $this->db->select('id,nip,email');
      $this->db->from('obj_pegawai');
      $this->db->where('id !=', $id);
      $this->db->where('nip', $username);
      $this->db->get();
      //$this->db->where('obj_guru', array('nip'=>$username,'id !='=>$id));
    }  
    return $this->db->affected_rows();
  }
  public function update_pegawai($data,$id,$status){
    if($data['status']=="gtt"){
      $cek=$this->cek_user_update_pegawai($data['email'],$data['status'],$id);  
      if($cek>0){return false;}
      else{
       $this->db->where('id', $id);
       $this->db->update('obj_pegawai', $data);
      }
    }else{
      $cek=$this->cek_user_update_pegawai($data['nip'],$data['status'],$id);
      if($cek>0){return false;}
      else{
       $this->db->where('id', $id);
       $this->db->update('obj_pegawai', $data);
      }
    }
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    
  }
  public function simpan_pegawai($data,$username,$status){
  	if($this->cek_user_pegawai($username,$status)>0){
  		return false;
  	}else{
	    $this->db->insert('obj_pegawai',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    }
  }
  
}