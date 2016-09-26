<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_mapel extends CI_Model
{

  public function get_mapel($idskolah='',$nama=''){
   if($nama==''){
   	$query=$this->db->query("SELECT a.id,a.id_sekolah,b.`bidang`,c.`program`,d.`paket`,a.`nama_mapel`,a.`komp_dasar`,a.`komp_inti`,a.`status_mapel` FROM obj_mapel a LEFT JOIN jur_bidang b ON a.`id_bidang`=b.`id` LEFT JOIN jur_program c ON a.`id_program`=c.`id` LEFT JOIN jur_paket d ON a.`id_paket`=d.`id` where a.id_sekolah=".$idskolah.";");
   }else{
   	$query=$this->db->query("SELECT a.id,a.id_sekolah,b.`bidang`,c.`program`,d.`paket`,a.`nama_mapel`,a.`komp_dasar`,a.`komp_inti`,a.`status_mapel` FROM obj_mapel a LEFT JOIN jur_bidang b ON a.`id_bidang`=b.`id` LEFT JOIN jur_program c ON a.`id_program`=c.`id` LEFT JOIN jur_paket d ON a.`id_paket`=d.`id` where a.id_sekolah=".$idskolah." and a.nama_mapel like '".$nama."%';");
   }
   $query=$query->result_array();
   return $query;
  }
  public function get_sk_mapel($idskolah){
   $query=$this->db->query("SELECT b.id,a.nama_mapel,b.standar_kompetensi,b.kategori,a.status_mapel FROM obj_mapel a LEFT JOIN kbm_sk b ON a.id=b.id_mapel where b.id_sekolah=".$idskolah.";");
   $query=$query->result_array();
   return $query;
  }
  public function cek_sk_uts_uas($id_sekolah,$id_mapel){
    $this->db->where('id_sekolah',$id_sekolah);
    $this->db->where('id_mapel',$id_mapel);
    $this->db->where("kategori = 'Uts' OR kategori = 'Uas'");
    $data=$this->db->get('kbm_sk');
    $data=$data->result();
    return $data;
  }
  public function get_nilai_detail($idsk,$noinduk){
   $this->db->where('id_sk',$idsk);
   $this->db->where('no_induk',$noinduk);
   $query=$this->db->get('kbm_subnilai');
   $query=$query->result();
   return $query;
  }
  public function get_sk($noinduk,$ta,$idskolah,$idmapel){
    $query=$this->db->query("SELECT * FROM kbm_sk a LEFT JOIN (SELECT nilai,id_sk FROM kbm_nilai WHERE id_sekolah=".$idskolah." AND no_induk='".$noinduk."' AND ta=".$ta.") b
ON a.id=b.id_sk
WHERE a.id_sekolah=".$idskolah." AND a.id_mapel=".$idmapel.";");
   $query=$query->result_array();
   return $query;
  }
  public function get_ta_active(){
    $query=$this->db->query("Select * from kbm_ta where status='aktif'");
    $query=$query->result_array();
    $data=array();
    foreach ($query as $key) {
      $data['id_ta']=$key['id'];
      $data['tajaran']=$key['tajaran'];
      $data['ta']=$key['ta'];
      $data['tahun']=$key['tahun'];
      $data['ket']=$key['keterangan'];
    }
   return $data;
  }
  public function get_ta($nama=''){
   if($nama==''){
    $query=$this->db->query("Select * from kbm_ta");
   }else{
    $query=$this->db->query("Select * from kbm_ta where ta like '".$nama."%'");
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
  public function input_sk($data){  
      $this->db->insert_batch('kbm_sk',$data);
      if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
    
  }
  
}