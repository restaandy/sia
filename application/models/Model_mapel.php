<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_mapel extends CI_Model
{

  public function get_mapel($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("SELECT a.id,a.id_sekolah,b.`bidang`,c.`program`,d.`paket`,a.`nama_mapel`,a.`komp_dasar`,a.`komp_inti`,a.`status_mapel` FROM obj_mapel a LEFT JOIN jur_bidang b ON a.`id_bidang`=b.`id` LEFT JOIN jur_program c ON a.`id_program`=c.`id` LEFT JOIN jur_paket d ON a.`id_paket`=d.`id` where a.id_sekolah=".$idskolah.";");
   }else{
   	$query=$this->db->query("SELECT a.id,a.id_sekolah,b.`bidang`,c.`program`,d.`paket`,a.`nama_mapel`,a.`komp_dasar`,a.`komp_inti`,a.`status_mapel` FROM obj_mapel a LEFT JOIN jur_bidang b ON a.`id_bidang`=b.`id` LEFT JOIN jur_program c ON a.`id_program`=c.`id` LEFT JOIN jur_paket d ON a.`id_paket`=d.`id` where a.id_sekolah=".$idskolah." and a.nama_mapel='".$nama."';");
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
  public function update_mapel($data,$id){
       $this->db->where('id', $id);
       $this->db->update('obj_mapel', $data);
       
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
    
  }
  public function simpan_mapel($data){ 	
	    $this->db->insert('obj_mapel',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    
  }
  
}