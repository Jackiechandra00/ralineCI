<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_guru(){
    return $this->db->query("
      SELECT
        g.nip, g.nama, m.mapel
      FROM
        guru g, mata_pelajaran m
      WHERE
        g.id_mapel = m.id_mapel
    ")->result();
  }

  public function get_siswa(){
    return $this->db->get("siswa")->result();
  }

  public function get_guru_spesifik($nip){
    return $this->db->query("
      SELECT g.nama, g.nip, g.id_mapel, m.mapel
      FROM guru g, mata_pelajaran m
      WHERE g.nip = $nip AND g.id_mapel = m.id_mapel;
    ")->row();
  }

  public function tambah_guru_spesifik($nama, $nip, $idmapel){
    $count = $this->db->where("nip", $nip)->get("guru")->num_rows();
    if($count > 0){
      return false;
    } else {
      return $this->db->insert("guru", [
        'nama' => $nama,
        'nip' => $nip,
        'id_mapel' => $idmapel
      ]);
    }
  }

  public function update_guru_spesifik($nama, $nip_x, $idmapel){
    return $this->db->query("
      UPDATE
        guru
      SET
        nama = '$nama',
        id_mapel = '$idmapel'
      WHERE
        nip = '$nip_x'
    ");
  }

  public function delete_guru_spesifik($nip){
    $count = $this->db->where("nip", $nip)->get("guru")->num_rows();
    if($count > 0){
      $this->db->where('nip', $nip)->delete("guru");

      if($this->db->affected_rows() < 1){
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  }

  public function get_mapel(){
    return $this->db->get("mata_pelajaran")->result(); 
  }
}
