<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_siswa extends CI_Model
{

  public function get_siswa($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("select * from obj_siswa where id_sekolah=".$idskolah."");
   }else{
   	$query=$this->db->query("select concat(no_induk,' - ',nama) as value,  nama as label from obj_siswa where id_sekolah=".$idskolah." and nama like '".$nama."%'");
   }
   $query=$query->result_array();
   return $query;
  }
  function simpan_belajar($data){
    $this->db->insert('kbm_belajar',$data);
    if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  }
  public function array_convert_nest($data,$keys,$value){
    $array=array();
    foreach ($data as $key) {
      foreach ($value as $n) {
        $array[$key[$keys]][$n]=$key[$n];  
      }
    }
    return $array;
  }
  public function get_ket_kelas_belajar($idskolah,$ta){
    $this->db->select("a.id AS id_mengajar,b.nama_kelas,c.nama_mapel,a.id_ta");
    $this->db->from("kbm_mengajar a");
    $this->db->join("obj_kelas b","a.id_kelas=b.id");
    $this->db->join("obj_mapel c","a.id_mapel=c.id");
    $this->db->where("a.id_sekolah",$idskolah);
    $this->db->where("a.id_ta",$ta);
    $data=$this->db->get();
    $data=$data->result_array();
    return $data;
  }
  public function get_kelas_belajar($idskolah){
    $this->db->select("*");
    $this->db->from("kbm_belajar a");
    $this->db->join("obj_siswa b","a.no_induk=b.no_induk");
    $this->db->where("a.id_sekolah",$idskolah);
    $data=$this->db->get();
    $data=$data->result();
    return $data;
  }
  public function cek_nisn_siswa($nisn){
  	$this->db->get_where('obj_siswa', array('no_induk' => $nisn));
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
  public function simpan_siswa($data){
  	if($this->cek_nisn_siswa($data['no_induk'])>0){
  		return false;
  	}else{
	    $this->db->insert('obj_siswa',$data);
	    if($this->db->affected_rows()>0){
	      return true;
	    }else{
	      return false;
	    }
    }
  }
  
}