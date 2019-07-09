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
				redirect("err");
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

	
}
