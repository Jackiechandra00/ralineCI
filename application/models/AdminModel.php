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

  public function get_kelas(){
    return $this->db->select("kelas")->group_by("kelas")->get("siswa")->result();
  }

  public function get_akun(){
    return $this->db->get("user")->result();
  }

  public function get_siswa_spesifik($nis){
    return $this->db->where('nis', $nis)->get("siswa")->row();
  }

  public function get_nilai_spesifik($nis){
    // return $this->db->select("n.*")->where("n.nis", $nis)->get("nilai n")->result();
    return $this->db->query("SELECT n.*, k3.*, k4.* FROM nilai n, deskripsik3 k3, deskripsik4 k4 WHERE n.nis='$nis' AND k3.nis = n.nis AND k4.nis = n.nis ORDER BY n.id_mapel ASC")->result_array();
  }

  public function get_tahun_akademik_spesifik($nis){
    return $this->db->query("SELECT * FROM catatan_walikelas WHERE nis='$nis' ORDER BY id_raport DESC LIMIT 1")->row();
  }

  public function update_siswa_spesifik($nama, $nis_x, $nisn_x, $kelas){
    return $this->db->query("
      UPDATE
        siswa
      SET
        nama = '$nama'
      WHERE
        nis = $nis_x
    ");
  }

public function tambah_siswa_spesifik($nis, $nisn, $nama, $kelas){
    $count = $this->db->where("nis", $nis)->get("siswa")->num_rows();
    if($count > 0){
      return false;

    } else {
    
      return $this->db->insert("siswa", [
        'nis' => $nis,
        'nisn' => $nisn,
        'nama' => $nama,
        'kelas' => $kelas
      ]);
    }
  }


  public function delete_siswa_spesifik($nis){
    $count = $this->db->where("nis", $nis)->get("siswa")->num_rows();
    if($count > 0){
      $this->db->where('nis', $nis)->delete("siswa");

      if($this->db->affected_rows() < 1){
       
        return false;
      } else {
  return true;
      }
    } else {
return false;
    }
  }

  public function get_akun_spesifik($id){
    return $this->db->where('id', $id)->get("user")->row();
  }

  public function tambah_akun_spesifik($nama, $username, $password, $jabatan){
    $count = $this->db->where("username", $username)->get("user")->num_rows();
    if($count > 0){
      return false;
    } else {
      return $this->db->insert("user", [
        'nama' => $nama,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'jabatan' => $jabatan
      ]);
    }
  }

  public function update_akun_spesifik($nama, $username, $jabatan, $id){
    return $this->db->query("
      UPDATE
        user
      SET
        nama = '$nama',
        username = '$username',
        jabatan = '$jabatan'
      WHERE
        id = '$id'
    ");
  }

  public function delete_akun_spesifik($id){
    $count = $this->db->where("id", $id)->get("user")->num_rows();
    if($count > 0){
      $this->db->where('id', $id)->delete("user");

      if($this->db->affected_rows() < 1){
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
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
