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

  public function get_catatan_siswa(){
    return $this->db->query("
      SELECT
        s.nama, s.kelas, c.keterangan, s.nis
      FROM
        siswa s, catatan_walikelas c
      WHERE
        c.nis = s.nis
    ")->result();
  }

  public function get_prestasi_siswa(){
    return $this->db->query("
      SELECT
        s.nama, s.kelas, p.kegiatan, p.keterangan, p.catatan_khusus, s.nis
      FROM
        siswa s, prestasi p
      WHERE
        p.nis = s.nis
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

  public function input_ekskul($nis, $deskripsi, $jenis_ekskul){
    $count = $this->db->where("nis", $nis)->get("extra")->num_rows();
    if($count > 0){
      return $this->db->where("nis", $nis)->update("extra", [
        "deskripsi_ex" => $deskripsi,
        "jenis_extra" => $jenis_ekskul
      ]);
    }
    else {
      return $this->db->insert("extra", [
        "deskripsi_ex" => $deskripsi,
        "jenis_extra" => $jenis_ekskul
      ]);
    }
  }

  public function input_catatan($nis, $keterangan){
    $tahun_akademik = $this->db->query("SELECT tahun_akademik FROM catatan_walikelas LIMIT 1")->row();
    $tahun_akademik = $tahun_akademik->tahun_akademik;

    $last_id = $this->db->query("SELECT id_raport FROM catatan_walikelas ORDER BY id_raport DESC LIMIT 1")->row();
    $last_id = $last_id->id_raport;

    $kelas = $this->db->where("nis", $nis)->get("siswa")->row();
    $month = date("n", time());
    $year = date("Y", time());
    $kelas = $kelas->kelas;

    if($month < 7){
      $tahun = ($year-1)."/$year";
    } else {
      $tahun = "$year/".($year+1);
    }

    if(strpos($kelas, 'X ') !== false){
      $semester = ($month < 7 ? "1" : "2");
    } else if (strpos($kelas, 'XI ') !== false) {
      $semester = ($month < 7 ? "3" : "4");
    } else if(strpos($kelas, 'XII ') !== false) {
      $semester = ($month < 7 ? "5" : "6");
    }

    $count = $this->db->where("nis", $nis)->get("catatan_walikelas")->num_rows();
    $count = $this->db->query(
      "
      SELECT * FROM catatan_walikelas WHERE nis = '$nis' AND tahun_akademik LIKE '%$tahun%'
      "
    )->num_rows();

    if($count > 0){
      return $this->db->where("nis", $nis)->update("catatan_walikelas", [
        "keterangan" => $keterangan
      ]);
    } else {
      return $this->db->insert("catatan_walikelas", [
        "nis" => $nis,
        "id_raport" => $last_id,
        "semester" => $semester,
        "tahun_akademik" => $tahun_akademik,
        "keterangan" => $keterangan
      ]);
    }
  }

  public function input_prestasi($nis, $kegiatan, $keterangan, $ck){
    $count = $this->db->where("nis", $nis)->get("prestasi")->num_rows();
    if($count > 0){
      return $this->db->where("nis", $nis)->update("prestasi", [
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

  public function update_prestasi_spesifik($nis, $kegiatan, $keterangan, $catatan_khusus){
    return $this->db->where('nis', $nis)
      ->update("prestasi", [
        'nis' => $nis,
        'kegiatan' => $kegiatan,
        'keterangan' => $keterangan,
        'catatan_khusus' => $catatan_khusus
        
      ]
    );
  }



  public function update_catatan_spesifik($nis, $keterangan){
    return $this->db->where('nis', $nis)
      ->update("catatan_walikelas", [
        'nis' => $nis,
        'keterangan' => $keterangan,
      ]
    );
  }

public function get_catatan_spesifik($nis){
    return $this->db->where('nis', $nis)->get("catatan_walikelas")->row();
  }

  public function get_prestasi_spesifik($nis){
    return $this->db->where('nis', $nis)->get("prestasi")->row();
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
