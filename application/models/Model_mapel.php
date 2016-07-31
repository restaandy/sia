<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_mapel extends CI_Model
{

  public function get_kelas($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_kelas where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from obj_kelas where id_sekolah=".$idskolah." and nama_kelas like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  public function cek_user_guru($username,$status){
    if($status=="gtt"){$kolom="email";}
    else{$kolom="nip";}  
  	$this->db->get_where('obj_guru', array($kolom=>$username));
  	return $this->db->affected_rows();
  }
  public function cek_user_update_guru($username,$status,$id){
    if($status=="gtt"){
      $this->db->get_where('obj_guru', array('email'=>$username,'id !='=>$id));
    }
    else{
      $this->db->get_where('obj_guru', array('nip'=>$username,'id !='=>$id));
    }  
    
    return $this->db->affected_rows();
  }
  public function update_kelas($data,$id){
       $this->db->where('id', $id);
       $this->db->update('obj_kelas', $data);
       
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    
  }
  public function simpan_kelas($data){ 	
	    $this->db->insert('obj_kelas',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    
  }
  
}