<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->jabatan == "Guru"){

	    } else if ($this->session->jabatan == "admin") {
	      redirect("Adminis/Admin");
	    } else {
	    	redirect('');
	    }
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function guru()
	{
		$this->load->view('guru/dashboard');
	}

	public function daftar_nilai()
	{
		$this->load->model('TeacherModel');
		$data = [
			'siswas' => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/daftar_nilai', $data);
	}

	public function daftar_ekskul()
	{
		$this->load->model('TeacherModel');
		$data = [
			'ekskull' => $this->TeacherModel->get_ekskul()
		];
		$this->load->view('guru/daftar_ekskul', $data);
	}

	public function edit_ekskul()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editEkskul"])){
			$nis = $this->input->post('nis_x');
			$deskripsi_ex = $this->input->post('deskripsi_ex');
			$jenis_extra = $this->input->post('jenis_extra');
			$nilai_ex = $this->input->post('nilai_ex');


			if($this->TeacherModel->update_ekskul_spesifik($nis, $deskripsi_ex, $jenis_extra, $nilai_ex)){
				redirect("Teacher/daftar_ekskul");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit Ekstra.');
				redirect("Teacher/edit_ekskul?nis=$nis");
			}
		}
		else
		{
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"ekstra" => $this->TeacherModel->get_ekskul_spesifik($nis)
			];
			$this->load->view('guru/edit_ekskul', $data);
		}
	}
	// public function input_nilai()
	// {
	// 	$this->load->view('guru/map');
	// }

	public function input_absen()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["tambahAbsen"])){
			$nis = $this->input->post('nis');
			$alpha = $this->input->post('alpha');
			$izin = $this->input->post('izin');
			$sakit = $this->input->post('sakit');

			if($this->TeacherModel->input_absen_spesifik($nis, $alpha, $izin, $sakit)){
				redirect("Teacher/daftar_absen");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput absen.');
				redirect("Teacher/input_absen?nis=$nis");
			}
		}
		else
		{
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/absen', $data);
		}
	}

	public function edit_absen()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editAbsen"])){
			$nis = $this->input->post('nis');
			$alpha = $this->input->post('alpha');
			$izin = $this->input->post('izin');
			$sakit = $this->input->post('sakit');

			if($this->TeacherModel->update_absen_spesifik($nis, $alpha, $izin, $sakit)){
				redirect("Teacher/daftar_absen");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit absen.');
				redirect("Teacher/input_absen?nis=$nis");
			}
		}
		else
		{
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"absen" => $this->TeacherModel->get_absen_spesifik($nis)
			];
			$this->load->view('guru/edit_absen', $data);
		}
	}
	
	public function daftar_absen()
	{
		$this->load->model("TeacherModel");
		$data = [
			"absens" => $this->TeacherModel->get_absen_siswa()
		];
		$this->load->view('guru/daftar_absen', $data);
	}

	public function daftar_siswa()
	{
		$this->load->model("TeacherModel");


		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/daftar_siswa', $data);
	}

	public function lihat_nilai()
	{
		$nis = $this->input->get('nis');
		$this->load->model('TeacherModel');
		$data = [
			'nilais' => $this->TeacherModel->get_nilai_by_nis($nis),
			'nis' => $nis
		];
		$this->load->view('guru/icons', $data);
	}

	public function input_nilai(){

		$this->load->model('TeacherModel');
		if(isset($_POST['tambahNilai'])){
			$k3 = $this->input->post('k3');
			$k4 = $this->input->post('k4');
			$nis = $this->input->post('nis');
			$semester = $this->input->post('semester');
			$idmapel = $this->input->post('mapel');

			if($this->TeacherModel->input_nilai_spesifik($k3, $k4, $idmapel, $nis, $semester)){
				redirect("Teacher/lihat_nilai?nis=$nis");
			} else {
				$this->session->set_flashdata('pesanerror', 'Gagal menambahkan nilai.');
				redirect("Teacher/input_nilai?nis=$nis");
			}
		}
		else {
			$nis = $this->input->get('nis');
			$data = [
				'siswa' => $this->TeacherModel->get_siswa_spesifik($nis),
				'mapels' => $this->TeacherModel->get_mapel(),
				'nis' => $nis
			];
			$this->load->view('guru/input_nilai', $data);
		}
	}

	public function hapus_nilai(){
		$nis = $this->input->get('nis');
		$idmapel = $this->input->get('id_mapel');
		$this->load->model('TeacherModel');
		if($this->TeacherModel->hapus_nilai_spesifik($nis, $idmapel)){
			redirect("Teacher/lihat_nilai?nis=$nis");
		} else {
			$this->session->set_flashdata('pesanerror', 'Gagal menghapus nilai.');
			// var_dump($this->session->flashdata('pesanerror'));
			redirect("Teacher/lihat_nilai?nis=$nis");
		}
	}

	public function edit_nilai(){
		if(isset($_POST['editNilai'])){
			$k3 = $this->input->post('k3');
			$k4 = $this->input->post('k4');
			$idmapel = $this->input->post('mapel');
			$nis = $this->input->post('nis');

			$this->load->model('TeacherModel');
			if($this->TeacherModel->update_nilai_spesifik($k3, $k4, $idmapel, $nis)){
				redirect("Teacher/lihat_nilai?nis=$nis");
			} else {
				redirect("Teacher/edit_nilai?nis=$nis&id_mapel=$idmapel");
			}
		}
		else {
			$nis = $this->input->get('nis');
			$idmapel = $this->input->get('id_mapel');
			$this->load->model('TeacherModel');
			$data = [
				'nilai' => $this->TeacherModel->get_nilai_spesifik($nis, $idmapel)
			];
			$this->load->view('guru/lihat_nilai', $data);
		}
	}

	public function daftar_guru()
	{
		$this->load->model("TeacherModel");
		$data = [
			'gurus' => $this->TeacherModel->get_guru()
		];
		$this->load->view('guru/daftar_guru', $data);
	}

	public function catatan()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/catatan', $data);
	}

	public function input_catatan()
	{
		$this->load->model('TeacherModel');

		if(isset($_POST["addCatatan"])){
			$nis = $this->input->post("nis_x");
			$keterangan = $this->input->post("keterangan");

			if($this->TeacherModel->input_catatan($nis, $keterangan)){
				redirect("Teacher/daftar_catatan");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput prestasi.');
				redirect("Teacher/input_catatan?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_catatan', $data);
		}
	}

	public function edit_catatan()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editCatatan"])){
			$nis = $this->input->post('nis_x');
			$id_raport = $this->input->post('id_raport');
			$semester = $this->input->post('semester');
			$tahun_akademik = $this->input->post('tahun_akademik');
			$keterangan = $this->input->post('keterangan');
			
			if($this->TeacherModel->update_catatan_spesifik($nis, $keterangan)){
				redirect("Teacher/daftar_catatan");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit catatan.');
				redirect("Teacher/edit_catatan?nis=$nis");
			}
		}
		else
		{
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"catatan_walikelas" => $this->TeacherModel->get_catatan_spesifik($nis)
			];
			$this->load->view('guru/edit_catatan', $data);
		}
	}

	public function daftar_catatan()
	{
		$this->load->model("TeacherModel");
		$data = [
			"catatans" => $this->TeacherModel->get_catatan_siswa()
		];
		$this->load->view('guru/daftar_catatan', $data);
	}

	public function prestasi()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/prestasi', $data);
	}

	public function input_prestasi()
	{
		$this->load->model('TeacherModel');

		if(isset($_POST["addPrestasi"])){
			$nis = $this->input->post("nis_x");
			$keterangan = $this->input->post("keterangan");
			$ck = $this->input->post("catatan_khusus");
			$kegiatan = $this->input->post("kegiatan");

			if($this->TeacherModel->input_prestasi($nis, $kegiatan, $keterangan, $ck)){
				redirect("Teacher/daftar_prestasi");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput prestasi.');
				redirect("Teacher/input_prestasi?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_prestasi', $data);
		}
	}	

	public function edit_prestasi()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editPrestasi"])){
			$nis = $this->input->post('nis_x');
			$kegiatan = $this->input->post('kegiatan');
			$keterangan = $this->input->post('keterangan');
			$catatan_khusus = $this->input->post('catatan_khusus');
			
			if($this->TeacherModel->update_prestasi_spesifik($nis ,$kegiatan ,$keterangan , $catatan_khusus)){
				redirect("Teacher/daftar_prestasi");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit catatan.');
				redirect("Teacher/edit_prestasi?nis=$nis");
			}
		}
		else
		{
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"prestasi" => $this->TeacherModel->get_prestasi_spesifik($nis)
			];
			$this->load->view('guru/edit_prestasi', $data);
		}
	}

	public function daftar_prestasi()
	{
		$this->load->model("TeacherModel");
		$data = [
			"prestasii" => $this->TeacherModel->get_prestasi_siswa()
		];
		$this->load->view('guru/daftar_prestasi', $data);
	}


	public function ekskul()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/ekskul', $data);
	}

	public function input_ekskul()
	{

		$this->load->model('TeacherModel');
		
		if(isset($_POST["addEkskul"])){
			$nis = $this->input->post("nis_x");
			$deskripsi = $this->input->post("deskripsi");
			$jenis_ekskul = $this->input->post("jenis_ekstra");
			$nilai_ex = $this->input->post('nilai_ex');

			if($this->TeacherModel->input_ekskul($nis, $deskripsi, $jenis_ekskul ,$nilai_ex)){
				redirect("Teacher/daftar_ekskul");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput ekskul.');
				redirect("Teacher/input_ekskul?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_ekskul', $data);
		}
	}	

	public function deskripsip()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/deskripsip', $data);
	}

	public function input_deskripsip()
	{
		$this->load->model('TeacherModel');

		if(isset($_POST["addDeskripsip"])){
			$nis = $this->input->post("nis_x");
			$id_mapel = $this->input->post("mapel");
			$deskripsi_k3 = $this->input->post("deskripsi_k3");

			if($this->TeacherModel->insert_deskripsip_spesifik($nis, $id_mapel, $deskripsi_k3)){
				redirect("Teacher/daftar_deskripsip");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput prestasi.');
				redirect("Teacher/input_deskripsip?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [
				"deskripsik3" => $this->TeacherModel->get_siswa_spesifik($nis),
				"mapels"=>$this->TeacherModel->get_mapel($nis),
				"siswa"=>$this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_deskripsip', $data);
		}
	}

	public function edit_deskripsip()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editDeskripsip"])){
			$nis = $this->input->post('nis_x');
			$id_mapel = $this->input->post("mapel");
			$deskripsi_k3 = $this->input->post("deskripsi_k3");

			if($this->TeacherModel->update_deskripsip_spesifik($nis, $id_mapel, $deskripsi_k3)){
				redirect("Teacher/daftar_deskripsip");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit Ekstra.');
				redirect("Teacher/edit_deskripsip?nis=$nis");
			}
		}
		else
		{
			$data = [
				"deskripsik3" => $this->TeacherModel->get_siswa_spesifik($nis),
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"mapels"=>$this->TeacherModel->get_mapel($nis),
				"ekstra" => $this->TeacherModel->get_deskripsip_spesifik($nis)
			];
			$this->load->view('guru/edit_deskripsip', $data);
		}
	}

	public function daftar_deskripsip()
	{
		$this->load->model('TeacherModel');
		$data = [
			'deskripsik3'=>$this->TeacherModel->get_deskripsip(),
			'siswas' => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/daftar_deskripsip', $data);
	}

	public function hapus_deskripsip(){
		$nis = $this->input->get('nis');
		$idmapel = $this->input->get('id_mapel');
		$this->load->model('TeacherModel');
		if($this->TeacherModel->hapus_deskripsip_spesifik($nis, $idmapel)){
			redirect("Teacher/daftar_deskripsip?nis=$nis");
		} else {
			$this->session->set_flashdata('pesanerror', 'Gagal menghapus nilai.');
			// var_dump($this->session->flashdata('pesanerror'));
			redirect("Teacher/daftar_deskripsip?nis=$nis");
		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function deskripsik()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/deskripsik', $data);
	}

	public function input_deskripsik()
	{
		$this->load->model('TeacherModel');

		if(isset($_POST["addDeskripsik"])){
			$nis = $this->input->post("nis_x");
			$id_mapel = $this->input->post("mapel");
			$deskripsi_k4 = $this->input->post("deskripsi_k4");

			if($this->TeacherModel->insert_deskripsik_spesifik($nis, $id_mapel, $deskripsi_k4)){
				redirect("Teacher/daftar_deskripsik");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput prestasi.');
				redirect("Teacher/input_deskripsik?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [
				"deskripsik4" => $this->TeacherModel->get_siswa_spesifik($nis),
				"mapels"=>$this->TeacherModel->get_mapel($nis),
				"siswa"=>$this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_deskripsik', $data);
		}
	}

	public function edit_deskripsik()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editDeskripsik"])){
			$nis = $this->input->post('nis_x');
			$id_mapel = $this->input->post("mapel");
			$deskripsi_k4 = $this->input->post("deskripsi_k4");

			if($this->TeacherModel->update_deskripsik_spesifik($nis, $id_mapel, $deskripsi_k4)){
				redirect("Teacher/daftar_deskripsik");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit Ekstra.');
				redirect("Teacher/edit_deskripsik?nis=$nis");
			}
		}
		else
		{
			$data = [
				"deskripsik4" => $this->TeacherModel->get_siswa_spesifik($nis),
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
				"mapels"=>$this->TeacherModel->get_mapel($nis),
				"ekstra" => $this->TeacherModel->get_deskripsik_spesifik($nis)
			];
			$this->load->view('guru/edit_deskripsik', $data);
		}
	}

	public function daftar_deskripsik()
	{
		$this->load->model('TeacherModel');
		$data = [
			'deskripsik4'=>$this->TeacherModel->get_deskripsik(),
			'siswas' => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/daftar_deskripsik', $data);
	}

	public function hapus_deskripsik(){
		$nis = $this->input->get('nis');
		$idmapel = $this->input->get('id_mapel');
		$this->load->model('TeacherModel');
		if($this->TeacherModel->hapus_deskripsik_spesifik($nis, $idmapel)){
			redirect("Teacher/daftar_deskripsik?nis=$nis");
		} else {
			$this->session->set_flashdata('pesanerror', 'Gagal menghapus nilai.');
			// var_dump($this->session->flashdata('pesanerror'));
			redirect("Teacher/daftar_deskripsik?nis=$nis");
		}
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function deskripsi_siswa()
	{
		$this->load->model("TeacherModel");

		$data = [
			"siswas" => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/deskripsi_siswa', $data);
	}

	public function input_deskripsi_siswa()
	{
		$this->load->model('TeacherModel');

		if(isset($_POST["addDeskripsiSiswa"])){
			$nis = $this->input->post("nis_x");
			$predikat_sosial = $this->input->post("predikat_sosial");
			$deskripsi_sosial = $this->input->post("deskripsi_sosial");
			$deskripsi_spiritual = $this->input->post("deskripsi_spiritual");
			$predikat_spiritual = $this->input->post("predikat_spiritual");

			if($this->TeacherModel->insert_deskripsi_siswa_spesifik($nis, $predikat_sosial, $deskripsi_sosial, $deskripsi_spiritual, $predikat_spiritual)){
				redirect("Teacher/daftar_deskripsi_siswa");
			} else {
				$this->session->flashdata('pesanerror', 'Gagal menginput prestasi.');
				redirect("Teacher/input_deskripsi_siswa?nis=$nis");
			}
		} else {

			$nis = $this->input->get("nis");
			$data = [			
				'deskripsii'=>$this->TeacherModel->get_deskripsi_siswa(),
				"mapels"=>$this->TeacherModel->get_mapel($nis),
				"siswa"=>$this->TeacherModel->get_siswa_spesifik($nis)
			];
			$this->load->view('guru/input_deskripsi_siswa', $data);
		}
	}

	public function edit_deskripsi_siswa()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if(isset($_POST["editDeskripsiSiswa"])){
			$nis = $this->input->post('nis_x');
			$predikat_sosial = $this->input->post("predikat_sosial");
			$deskripsi_sosial = $this->input->post("deskripsi_sosial");
			$deskripsi_spiritual = $this->input->post("deskripsi_spiritual");
			$predikat_spiritual = $this->input->post("predikat_spiritual");

			
			if($this->TeacherModel->update_deskripsi_siswa_spesifik($nis, $predikat_sosial, $deskripsi_sosial, $deskripsi_spiritual, $predikat_spiritual)){
				redirect("Teacher/daftar_deskripsi_siswa");
			}  else {
				$this->session->flashdata('pesanerror', 'Gagal mengedit Ekstra.');
				redirect("Teacher/edit_deskripsi_siswa?nis=$nis");
			}
		}
		else
		{
			$data = [
	 			'deskripsi_spiritual'=>$this->TeacherModel->get_deskripsi_siswa(),
				'deskripsi_sosial'=>$this->TeacherModel->get_deskripsi_siswa(),
				"siswa" => $this->TeacherModel->get_siswa_spesifik($nis)
				
			];
			$this->load->view('guru/edit_deskripsi_siswa', $data);
		}
	}
	public function hapus_deskripsi_siswa()
	{
		$nis = $this->input->get("nis");
		$this->load->model("TeacherModel");

		if($this->TeacherModel->hapus_deskripsi_siswa($nis)){
			redirect("Teacher/deskripsi_siswa");
		} else {
			$this->session->flashdata('pesanerror', 'Gagal menghapus deskripsi siswa.');
			redirect("Teacher/daftar_deskripsi_siswa?nis=$nis");
		}
	}
	// public function edit_deskripsi_siswa()
	// {
	// 	$nis = $this->input->get("nis");
	// 	$this->load->model("TeacherModel");

	// 	if(isset($_POST["editDeskripsiSiswa"]))
	// 	{
	// 		$nis = $this->input->post('nis_x');
	// 		$predikat_sosial = $this->input->post("predikat_sosial");
	// 		$deskripsi_sosial = $this->input->post("deskripsi_sosial");
	// 		$deskripsi_spiritual = $this->input->post("deskripsi_spiritual");
	// 		$predikat_spiritual = $this->input->post("predikat_spiritual");

	// 		if($this->TeacherModel->update_deskripsi_siswa_spesifik($nis, $predikat_sosial, $deskripsi_sosial, $deskripsi_spiritual, $predikat_spiritual)){
	// 			redirect("Teacher/daftar_deskripsi_siswa");
	// 		} 
	// 		} else {
	// 			$this->session->flashdata('pesanerror', 'Gagal mengedit Ekstra.');
	// 			redirect("Teacher/edit_deskripsi_siswa?nis=$nis");
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$data = [
	// 			'deskripsi_spiritual'=>$this->TeacherModel->get_deskripsi_siswa(),
	// 			'deskripsi_sosial'=>$this->TeacherModel->get_deskripsi_siswa(),
	// 			"siswa" => $this->TeacherModel->get_siswa_spesifik($nis),
	// 			"mapels"=>$this->TeacherModel->get_mapel($nis),
	// 			"ekstra" => $this->TeacherModel->get_deskripsi_siswa_spesifik($nis)
	// 		];
	// 		$this->load->view('guru/edit_deskripsik', $data);
	// 	}
	// }

	public function daftar_deskripsi_siswa()
	{
		$this->load->model('TeacherModel');
		$data = [
			'deskripsii'=>$this->TeacherModel->get_deskripsi_siswa(),
			'siswas' => $this->TeacherModel->get_siswa()
		];
		$this->load->view('guru/daftar_deskripsi_siswa', $data);
	}

}
