<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_jurusan extends CI_Model
{
  public function get_bidang_ahli($idsekolah){
    $query=$this->db->get_where('jur_bidang',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }
  public function get_program_ahli($idsekolah){
    $this->db->select('b.id,b.id_sekolah,a.bidang,b.program,b.keterangan');
    $this->db->from('jur_bidang a');
    $this->db->join('jur_program b', 'a.id = b.id_bidang','right');
    $this->db->where('b.id_sekolah', $idsekolah);
    $query = $this->db->get();

   // $query=$this->db->get_where('jur_program',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }
   public function get_paket_ahli_all($idsekolah){
    $this->db->select('c.id,c.id_sekolah,a.bidang,b.program,c.paket,c.keterangan');
    $this->db->from('jur_bidang a');
    $this->db->join('jur_program b', 'a.id = b.id_bidang','right');
    $this->db->join('jur_paket c', 'a.id=c.id_bidang AND b.id=c.id_program','right');
    $this->db->where('b.id_sekolah', $idsekolah);
    $query = $this->db->get();

   // $query=$this->db->get_where('jur_program',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }

  public function get_program_ahli_all($idsekolah,$idbidangfirst){

    $query=$this->db->get_where('jur_program',array('id_sekolah'=>$idsekolah,'id_bidang'=>$idbidangfirst));
    $query=$query->result_array();
    return $query; 
  }
  public function get_paket_ahli($idsekolah){
    $query=$this->db->get_where('jur_paket',array('id_sekolah'=>$idsekolah));
    $query=$query->result_array();
    return $query;
  }
  public function save_bidang($data){
    $this->db->insert('jur_bidang',$data);
    if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  } 
  public function save_program($data){
    $this->db->insert('jur_program',$data);
    if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  } 
  public function save_paket($data){
    $this->db->insert('jur_paket',$data);
    if($this->db->affected_rows()>0){
        return true;
      }else{
        return false;
      }
  } 
  public function update_bidang($data,$id){
       $this->db->where('id', $id);
       $this->db->update('jur_bidang', $data);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
  }
   public function update_program($data,$id){
       $this->db->where('id', $id);
       $this->db->update('jur_program', $data);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
  }
  public function update_paket($data,$id){
       $this->db->where('id', $id);
       $this->db->update('jur_paket', $data);
       if($this->db->affected_rows()>0){
         return true;
       }else{
         return false;
       }
  }
  public function get_kelas($id){
    $query=$this->db->get_where('obj_kelas',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_guru($id){
    $query=$this->db->get_where('obj_guru',array('id'=>$id));
    $query=$query->result_array();
    return $query;
  }
  public function get_prov(){
    $query=$this->db->get('tmpt_prov');
    $query=$query->result_array();
    return $query;	
  }
  public function get_kabkot($idprov){
    $query=$this->db->get_where('tmpt_kabkot',array('id_provinsi'=>$idprov));
    $query=$query->result_array();
    return $query;	
  }
   public function get_kec($idkabkot){
    $query=$this->db->get_where('tmpt_kec',array('id_kabkot'=>$idkabkot));
    $query=$query->result_array();
    return $query;	
  }
   public function get_keldesa($idkec){
    $query=$this->db->get_where('tmpt_keldesa',array('id_kec'=>$idkec));
    $query=$query->result_array();
    return $query;	
  }
}