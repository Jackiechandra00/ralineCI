<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TeacherModel extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_siswa(){
    return $this->db->get("siswa")->result();
  }

  public function get_siswa_spesifik($nis){
    return $this->db->where('nis', $nis)->get("siswa")->row();
  }

  public function get_mapel(){
    return $this->db->get("mata_pelajaran")->result();
  }

  public function get_nilai_by_nis($nis){
    return $this->db->query("
      SELECT s.nis, n.id_mapel, s.nama, s.kelas, m.mapel, n.k3, n.k4, n.semester
      FROM siswa s, nilai n, mata_pelajaran m
      WHERE n.nis = '$nis' AND n.nis = s.nis AND n.id_mapel = m.id_mapel
      ")->result();
  }

  public function get_absen_siswa(){
    return $this->db->query("
      SELECT
        s.nama, s.kelas, a.alpha, a.izin, a.sakit, s.nis
      FROM
        siswa s, absen a
      WHERE
        a.nis = s.nis
    ")->result();
  }

  public function get_nilai_spesifik($nis, $idmapel){
    return $this->db->query("SELECT s.nis, n.id_mapel, s.nama, s.kelas, m.mapel, n.k3, n.k4, n.semester
          FROM siswa s, nilai n, mata_pelajaran m
          WHERE n.nis = '$nis' AND n.id_mapel = '$idmapel' AND n.nis = s.nis AND n.id_mapel = m.id_mapel")->row();
  }

  public function update_nilai_spesifik($k3, $k4, $idmapel, $nis){
    return $this->db->query("
      UPDATE
        nilai
      SET
        k3 = '$k3',
        k4 = '$k4'
      WHERE
        nis = '$nis'
        AND
        id_mapel = '$idmapel'
    ");
  }

  public function hapus_nilai_spesifik($nis, $idmapel){
    $delete = $this->db->where('nis', $nis)
                    ->where('id_mapel', $idmapel)
                    ->delete('nilai');
    if($this->db->affected_rows() < 1){
      return false;
    } else {
      return true;
    }
  }

  public function input_nilai_spesifik($k3, $k4, $idmapel, $nis, $semester){
    if($k3 >= 91){
      $predikat = "SB";
    }
    else if ($k3 >=81 && $k3 < 91){
      $predikat = "B";
    }
    else if ($k3 >= 70 && $k3 < 81){
      $predikat = "C";
    }
    else {
      $predikat = "K";
    }
    $count = $this->db->where('nis', $nis)
                      ->where('id_mapel', $idmapel)
                      ->get('nilai')->num_rows();
    if($count > 0){
      return false;
    } else {
      return $this->db->insert('nilai', [
        'nis' => $nis,
        'id_mapel' => $idmapel,
        'k3' => $k3,
        'k4' => $k4,
        'predikat' => $predikat,
        'tahun_akademik' => date("Y", time()).'/'.(int)date("Y", time())+1,
        'semester' => $semester
      ]);
    }
  }

  public function input_prestasi($nis, $kegiatan, $keterangan, $ck){
    $count = $this->db->where("nis", $nis)->get("prestasi")->num_rows();
    if($count > 0){
      return $this->db->where("nis", $nis)->update("prestasi", [
        "nis" => $nis,
        "kegiatan" => $kegiatan,
        "keterangan" => $keterangan,
        "catatan_khusus" => $ck
      ]);
    }
    else {
      return $this->db->insert("prestasi", [
        "nis" => $nis,
        "kegiatan" => $kegiatan,
        "keterangan" => $keterangan,
        "catatan_khusus" => $ck
      ]);
    }
  }

  public function get_absen_spesifik($nis){
    return $this->db->where('nis', $nis)->get("absen")->row();
  }

  public function input_absen_spesifik($nis, $alpha, $izin, $sakit){
    $count = $this->db->where('nis', $nis)->get("absen")->num_rows();

    if($count > 0){
      return $this->db->where('nis', $nis)
        ->update("absen", [
          'alpha' => $alpha,
          'izin' => $izin,
          'sakit' => $sakit
        ]
      );
    } else {
      return $this->db->insert("absen", [
        'nis' => $nis,
        'alpha' => $alpha,
        'izin' => $izin,
        'sakit' => $sakit
      ]);
    }
  }

  public function update_absen_spesifik($nis, $alpha, $izin, $sakit){
    return $this->db->where('nis', $nis)
      ->update("absen", [
        'alpha' => $alpha,
        'izin' => $izin,
        'sakit' => $sakit
      ]
    );
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
}
