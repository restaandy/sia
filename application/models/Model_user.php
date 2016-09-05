<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_user extends CI_Model
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
  public function get_wali_kelas($idskolah){
   $query=$this->db->query("SELECT a.id,b.nip,b.nama_pegawai,a.jabatan,c.id AS id_kelas,c.nama_kelas,c.tingkat FROM obj_jabatan a LEFT JOIN obj_pegawai b ON a.id_pegawai=b.id LEFT JOIN obj_kelas c ON a.id_kelas=c.id WHERE a.id_sekolah=".$idskolah." AND a.jabatan='wali';"); 
   $query=$query->result_array();
   return $query;
  }
  public function get_kelas_aktif($idskolah,$id){
   
    $query=$this->db->query("SELECT a.`id`,a.id_sekolah,
  b.`nip`,
  b.`nama_pegawai`,
  c.id as id_kelas,c.`nama_kelas`,c.tingkat,
  d.`nama_mapel`,
  e.`ta`,e.`keterangan`,e.`tahun` 
FROM kbm_mengajar a LEFT JOIN obj_pegawai b ON (a.`id_pegawai`=b.`id`) 
      LEFT JOIN obj_kelas c ON (a.`id_kelas`=c.`id`) 
      LEFT JOIN obj_mapel d ON (a.`id_mapel`=d.`id`)
      LEFT JOIN kbm_ta e ON (a.`id_ta`=e.`id`)
WHERE a.`id_sekolah`=".$idskolah." and a.id_pegawai=".$id." and e.status='aktif';");
  
  $query=$query->result_array();
  return $query;
  }

  public function get_siswa_kelas($idskolah,$idkelas){
    $query=$this->db->query("SELECT a.`id`,b.* FROM kbm_belajar a
       LEFT JOIN obj_siswa b ON a.`no_induk`=b.`no_induk`
       JOIN kbm_mengajar c ON a.`id_mengajar`=c.`id`
       WHERE a.`id_sekolah`=".$idskolah." AND c.`id`=".$idkelas.";");
    $query=$query->result_array();
    return $query; 
  }
  public function get_ta_aktif($aktif=false){
   if($aktif){
    $query=$this->db->query("Select * from kbm_ta where status='aktif'");
   }else{
    $query=$this->db->query("Select * from kbm_ta");
   }
   $query=$query->result_array();
   return $query;
  }
  public function cek_kelas_exist($idkelas,$idskolah){
    $this->db->get_where('obj_kelas',array('id_sekolah'=>$idskolah,'id'=>$idkelas));
    return $this->db->affected_rows();
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
  public function input_siswa_kelas($datatemp){
    $this->db->insert_batch('kbm_belajar',$datatemp);
    if($this->db->affected_rows()>0){
         return true;
    }else{
         return false;
    }
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
  public function get_ket_kelas($id){
    $query=$this->db->query("SELECT a.id,b.nama_pegawai,c.nama_kelas,c.tingkat,e.id as id_mapel,d.*,e.* FROM kbm_mengajar a LEFT JOIN obj_pegawai b ON a.id_pegawai=b.id 
  LEFT JOIN obj_kelas c ON a.id_kelas=c.id
  LEFT JOIN obj_mapel d ON a.id_mapel=d.id
  LEFT JOIN kbm_ta e ON a.id_ta=e.id WHERE a.id=".$id.";");
  $query=$query->result_array();
    return $query; 
  }
}