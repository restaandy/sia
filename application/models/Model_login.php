<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_login extends CI_Model
{
 public function auth_login_sa($username,$password){
   $pas =md5($password);
   $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');
   $sql = "SELECT * FROM obj_sekolah WHERE username = ? AND password = ?";
   $query=$this->db->query($sql, array($username,$pass));
   $query=$query->result_array();
   return $query;
 }
 public function auth_login_p($username,$password){
   $pas =md5($password);
   $pass = sha1('jksdhf832746aiH{}{()&(*&(*'.$pas.'HdfevgyDDw{}{}{;;*766&*&*');
   $sql = "SELECT * FROM obj_pegawai WHERE (username = ? OR nip = ?) AND password = ?";
   $query=$this->db->query($sql, array($username,$username,$pass));
   $query=$query->result_array();
   return $query;
 }
 public function cek_wali_kelas($idpegawai,$idsekolah){
  $this->db->where('id',$idpegawai);
  $this->db->where('id_sekolah',$idsekolah);
  $this->db->where('jabatan','wali');
  $query=$this->db->get('obj_jabatan');
  $query=$query->result_array();
  return $query;
 }
 public function get_sekolah($nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_sekolah");
   }else{
   	$query=$this->db->query("select * from obj_sekolah where nama_sekolah like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  
  public function save_sekolah($data){
    $this->db->insert('obj_sekolah',$data);
    if($this->db->affected_rows()>0){
      return true;
    }else{
      return false;
    }
  }

  public function cek_username_sekolah($uname){
    $query=$this->db->query("select username from obj_sekolah where username='".$uname."'");
    return $query->num_rows();
  }
  public function get_siswa($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_siswa where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select * from ob_siswa where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  
}