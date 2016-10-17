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

  public function get_jabatan($idsekolah,$id,$jab){
   $this->db->where('id_sekolah',$idsekolah); 
   $this->db->where('id_pegawai',$id);
   $this->db->where('jabatan',$jab);
   $query=$this->db->get('obj_jabatan');
   $query=$query->result_array();
   return $query;
  }
  function get_nilai_ekstra($noinduk,$ta){
    $this->db->where('no_induk',$noinduk);
    $this->db->where('ta',$ta);
   $query=$this->db->get('kbm_nilai_ekstra');
   $query=$query->result();
   return $query;
  }
  function get_ekstra_siswa($idsekolah,$noinduk){
    $this->db->where('no_induk',$noinduk);
    $this->db->where('id_sekolah',$idsekolah);
   $query=$this->db->get('kbm_ekstra_siswa');
   $query=$query->result();
   return $query;
  }
  function get_ekstra($idsekolah){
    $this->db->where('id_sekolah',$idsekolah);
   $query=$this->db->get('obj_ekstra');
   $query=$query->result();
   return $query;
  }
  function get_sekolah($id){
    $this->db->where('id',$id);
    $query=$this->db->get('obj_sekolah');
    $query=$query->result();
    $data=array();
    foreach ($query as $key) {
      $data=$key;
    }
    return $data;
  }
  function get_siswa_rapot($id){
    $this->db->where('no_induk',$id);
    $query=$this->db->get('obj_siswa');
    $query=$query->result();
    $data=array();
    foreach ($query as $key) {
      $data=$key;
    }
    return $data;
  }
  function get_kelas_rapot($noinduk){
    $this->db->select('*');
    $this->db->from('obj_perwalian a');
    $this->db->join('obj_kelas b', 'a.id_kelas = b.id');
    $this->db->where('a.no_induk', $noinduk);
    $query=$this->db->get();
     $query=$query->result();
    $data=array();
    foreach ($query as $key) {
      $data=$key;
    }
    return $data;

  }
  public function get_sikap($idsekolah,$noinduk,$idmengajar){
     $this->db->where('id_sekolah',$idsekolah); 
     $this->db->where('no_induk',$noinduk);
     $this->db->where('id_mengajar',$idmengajar);
     $query=$this->db->get('kbm_nilai_sikap');
     $query=$query->result();
     return $query;
  }
  public function update_nilai_sikap($data){
    $this->db->where('id',$data['id']);
    $this->db->update('kbm_nilai_sikap', $data);
      if($this->db->affected_rows()>0){
         return true;
      }else{
         return false;
      }
  }
  public function simpan_nilai_sikap($data){
    $this->db->insert('kbm_nilai_sikap', $data);
      if($this->db->affected_rows()>0){
         return true;
      }else{
         return false;
      }
  }
  public function get_nilai_bynoinduk($no_induk,$idmapel,$idskolah,$ta){
    $this->db->select('a.`id` AS id_sk,b.id as row_nilai,b.`nilai`');
    $this->db->from('kbm_sk a');
    $this->db->join('kbm_nilai b', 'a.id = b.id_sk','left');
    $this->db->where('a.id_sekolah', $idskolah);
    $this->db->where('a.id_mapel', $idmapel);
    $this->db->where('b.no_induk', $no_induk);
    $this->db->where('b.ta', $ta);
    $query = $this->db->get();
    $data=$query->result();
    return $data;
  }
  public function get_siswa($noinduk){
    $this->db->where_in('no_induk',$noinduk);
    $data=$this->db->get("obj_siswa");
    $data=$data->result();
    return $data;
  }
  public function get_pegawai_in($in){
    $this->db->where_in('id',$in);
    $data=$this->db->get("obj_pegawai");
    $data=$data->result_array();
    return $data;
  }
    public function get_mapel_in($in){
    $this->db->where_in('id',$in);
    $data=$this->db->get("obj_mapel");
    $data=$data->result_array();
    return $data;
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
  public function get_siswa_perwalian($idskolah,$id_kelas,$ta){
    $this->db->select('*');
    $this->db->from('obj_perwalian a');
    $this->db->join("obj_siswa b","a.no_induk=b.no_induk");
    $this->db->where('a.id_sekolah', $idskolah);
    $this->db->where('a.id_kelas', $id_kelas);
    $this->db->where('a.ta', $ta);
    $query = $this->db->get();
    $data=$query->result();
    return $data;
  }
  public function generate_rapot($idskolah,$semester,$ta,$noinduk,$idwali){
     $this->db->select("*");
    $this->db->from("kbm_nilai a");
    $this->db->join("kbm_sk b","a.id_sk=b.id");
    $this->db->where('a.id_sekolah',$idskolah);
    $this->db->where('b.semester',$semester);
    $this->db->where('a.ta',$ta);
    $this->db->where('a.no_induk',$noinduk);
    $data=$this->db->get();
    $data=$data->result();
    $nilai_teori=0;
    $nilai_praktek=0;
    $bobot_teori=0;
    $bobot_praktek=0;
    foreach ($data as $key) {
      if($key->kategori=="Teori"){
        $nilai_teori+=($key->nilai*$key->bobot);
        $bobot_teori+=$key->bobot;
      }else if($key->kategori=="Praktek"){
        $nilai_praktek+=($key->nilai*$key->bobot);
        $bobot_praktek+=$key->bobot;
      }else if($key->kategori=="Uts"||$key->kategori=="Uas"){
        $nilai_teori+=($key->nilai*$key->bobot);
        $bobot_teori+=$key->bobot;
      }
    }

      $teori=round(($nilai_teori/$bobot_teori),2);
      $praktek=round(($nilai_praktek/$bobot_praktek),2);
      $this->db->where('id_sekolah',$idskolah);
      $this->db->where('semester',$semester);
      $this->db->where('ta',$ta);
      $this->db->where('no_induk',$noinduk);
      $this->db->where('id_wali',$idwali);
      $this->db->update('kbm_rapot',array('jml_nilai_teori'=>$teori,'jml_nilai_praktek'=>$praktek));
  }
  function data_rapot($idskolah,$noinduk,$ta,$semester){
    $data=$this->db->query("SELECT a.id,
  c.nama_mapel,
  c.kb,
  c.kb_p,
  a.nilai_teori,
  GROUP_CONCAT(
    CONCAT(
      CASE d.kategori WHEN 'Teori' THEN 
  CASE 
    WHEN a.nilai_teori>=86 THEN CONCAT('Sangat Menonjol dalam ',d.standar_kompetensi) 
    WHEN a.nilai_teori>=71 THEN CONCAT('Menonjol dalam ',d.standar_kompetensi)
  ELSE CONCAT('Kurang dalam ',d.standar_kompetensi)
  END     
      END
      ) SEPARATOR ', ') AS skt,
   a.nilai_praktek,
   GROUP_CONCAT(
    CONCAT(
      CASE d.kategori WHEN 'Praktek' THEN 
  CASE 
    WHEN a.nilai_praktek>=86 THEN CONCAT('Sangat Menonjol dalam ',d.standar_kompetensi) 
    WHEN a.nilai_praktek>=71 THEN CONCAT('Menonjol dalam ',d.standar_kompetensi)
  ELSE CONCAT('Kurang dalam ',d.standar_kompetensi)
  END  
      END
      ) SEPARATOR ', ') AS skp 
 FROM kbm_nilai_akhir a 
  JOIN kbm_mengajar b ON a.id_mengajar=b.id
  JOIN obj_mapel c ON c.id=b.id_mapel
  LEFT JOIN kbm_sk d ON d.id_mapel=c.id
WHERE a.semester=".$semester." AND d.semester=".$semester." AND a.no_induk='".$noinduk."' 
    AND a.id_sekolah=".$idskolah." 
    AND a.ta='".$ta."';");
    $data=$data->result();
    return $data;
  }
  function get_sikap_rapot($idskolah,$idwali,$ta,$noinduk){
      $this->db->where('id_sekolah',$idskolah);
      $this->db->where('ta',$ta);
      $this->db->where('no_induk',$noinduk);
      $this->db->where('id_wali',$idwali);
      $data=$this->db->get("kbm_rapot");
      $data=$data->result();
      return $data;
  }
  public function get_detail_siswa_perwalian($idskolah,$noinduk,$ta,$semester){
    $this->db->select("*");
    $this->db->from("kbm_mengajar a");
    $this->db->join("kbm_belajar b","a.id=b.id_mengajar");
    $this->db->join("kbm_nilai_akhir c","c.id_mengajar=a.id AND c.semester=".$semester."","left");
    $this->db->join("kbm_nilai_sikap d","d.id_mengajar=a.id AND d.semester=".$semester."","left");
    $this->db->where('a.id_sekolah', $idskolah);
    $this->db->where('a.id_ta', $ta);
    $this->db->where('b.no_induk', $noinduk);
    $data=$this->db->get();
    $data=$data->result();
    return $data;
  }
  function simpan_sikap_wali($data){
      $this->db->where('id_sekolah',$data['id_sekolah']);
      $this->db->where('ta',$data['ta']);
      $this->db->where('no_induk',$data['no_induk']);
      $this->db->where('id_wali',$data['id_wali']);
      $this->db->where('semester',$data['semester']);
      $this->db->get("kbm_rapot");
      if($this->db->affected_rows()>0){
        $this->db->where('id_sekolah',$data['id_sekolah']);
        $this->db->where('ta',$data['ta']);
        $this->db->where('no_induk',$data['no_induk']);
        $this->db->where('id_wali',$data['id_wali']);
        $this->db->where('semester',$data['semester']);
        $this->db->update('kbm_rapot',$data);
         if($this->db->affected_rows()>0){
            return true;
         }else{
           return false;
         }
      }else{
         $this->db->insert('kbm_rapot', $data);
         if($this->db->affected_rows()>0){
            return true;
         }else{
           return false;
         }
      }
  }
  public function simpan_nilai_uts_uas($idnilai,$nilai){
    $this->db->where('id',$idnilai);
    $this->db->update('kbm_nilai',array('nilai'=>$nilai));  
  }
  public function simpan_nilai($noinduk,$id_sk_uts_uas,$id_sekolah,$nilai_uts_uas,$taktif){
    $this->db->insert('kbm_nilai',array(
      'id_sekolah'=>$id_sekolah,
      'no_induk'=>$noinduk,
      'id_sk'=>$id_sk_uts_uas,
      'nilai'=>$nilai_uts_uas,
      'ta'=>$taktif
      ));
  }
  public function get_kelas_aktif($idskolah,$id,$taaktif){
   
    $query=$this->db->query("SELECT a.`id`,a.id_sekolah,
  b.`nip`,
  b.`nama_pegawai`,
  b.`id` as id_pegawai,
  c.id as id_kelas,c.`nama_kelas`,c.tingkat,
  d.`nama_mapel`,a.id_ta as ta
FROM kbm_mengajar a LEFT JOIN obj_pegawai b ON (a.`id_pegawai`=b.`id`) 
      LEFT JOIN obj_kelas c ON (a.`id_kelas`=c.`id`) 
      LEFT JOIN obj_mapel d ON (a.`id_mapel`=d.`id`)
WHERE a.`id_sekolah`=".$idskolah." and a.id_pegawai=".$id." and a.id_ta='".$taaktif."';");  
  $query=$query->result_array();
  return $query;
  }


  public function get_siswa_kelas($idskolah,$idmengajar){
    $query=$this->db->query("SELECT a.`id`,b.*,c.id_mapel FROM kbm_belajar a
       LEFT JOIN obj_siswa b ON a.`no_induk`=b.`no_induk`
       JOIN kbm_mengajar c ON a.`id_mengajar`=c.`id`
       WHERE a.`id_sekolah`=".$idskolah." AND c.`id`=".$idmengajar.";");
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