<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminis extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->jabatan == "Guru"){
			redirect('Teacher');
	    } else if ($this->session->jabatan == "admin") {
	      // redirect("Adminis/Admin");
	    } else {
	    	redirect('');
	    }
	    $this->load->model('AdminModel');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function Admin()
	{
		$this->load->view('Admin/dashboard');
	}

	public function daftar_guru()
	{
		$data = [
			"gurus" => $this->AdminModel->get_guru()
		];
		$this->load->view('Admin/icons', $data);
	}

	public function daftar_siswa()
	{
		$data = [
			"siswas" => $this->AdminModel->get_siswa()
		];
		$this->load->view('Admin/map', $data);
	}

	public function akun()
	{
		$data = [
			"akuns" => $this->AdminModel->get_akun()
		];
		$this->load->view('admin/user_akun', $data);
	}
	
	public function tambah_akun()
	{
		if(isset($_POST['tambahAkun'])){
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$jabatan = $this->input->post('jabatan');

			if($this->AdminModel->tambah_akun_spesifik($nama, $username, $password, $jabatan)){
				redirect('Adminis/akun');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal menambah guru");
				redirect("Adminis/akun");
			}
		}
		else
		{
			$this->load->view('admin/tambah_akun');
		}
	}

	public function edit_akun(){
		if(isset($_POST['editAkun'])){
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$jabatan = $this->input->post('jabatan');
			$id = $this->input->post('id_x');

			// var_dump([$nama, $idmapel, $nip]);die;

			if($this->AdminModel->update_akun_spesifik($nama, $username, $jabatan)){
				redirect('Adminis/akun');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal mengubah info akun");
				redirect("Adminis/tambah_akun");
			}
		}
		else
		{
			$id = $this->input->get('id');
			$data = [
				"akun" => $this->AdminModel->get_akun_spesifik($id)
			];
			// var_dump($data["guru"]);die;
			$this->load->view('admin/edit_akun', $data);
		}
	}

	public function hapus_akun(){
		$id = $this->input->get('id');
		if($this->AdminModel->delete_akun_spesifik($id)){
			redirect("Adminis/akun");
		} else {
			$this->session->flashdata("pesanerror", "Gagal menghapus akun.");
			redirect("Adminis/akun");
		}
	}

	public function tambah_siswa()
	{
		if(isset($_POST['editSiswa'])){
			$nama = $this->input->post('nama');
			$idmapel = $this->input->post('idmapel');
			$nip = $this->input->post('nip_x');

			// var_dump([$nama, $idmapel, $nip]);die;

			if($this->AdminModel->update_guru_spesifik($nama, $nip, $idmapel)){
				redirect('Adminis/daftar_guru');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal menambah guru");
				redirect("Adminis/tambah_siswa");
			}
		}
		else
		{
			$nis = $this->input->get('nis');
			$data = [
				"siswa" => $this->AdminModel->get_siswa_spesifik($nis),
				"kelass" => $this->AdminModel->get_kelas()
			];
			// var_dump($data["guru"]);die;
			$this->load->view('admin/edit_siswa', $data);
		}
	}

	public function tambah_guru()
	{
		if(isset($_POST['tambahGuru'])){
			$nama = $this->input->post('nama');
			$idmapel = $this->input->post('idmapel');
			$nip = $this->input->post('nip');

			if($this->AdminModel->tambah_guru_spesifik($nama, $nip, $idmapel)){
				redirect('Adminis/daftar_guru');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal menambah guru");
				redirect("Adminis/tambah_guru");
			}
		}
		else
		{
			$data = [
				"mapels" => $this->AdminModel->get_mapel()
			];
			$this->load->view('admin/tambah_guru', $data);
		}
	}

	public function edit_siswa(){
		if(isset($_POST['editSiswa'])){
			$nama = $this->input->post('nama');
			$nis = $this->input->post('nis_x');
			$nisn = $this->input->post('nisn_x');
			$kelas = $this->input->post('kelas');

			// var_dump([$nama, $idmapel, $nip]);die;

			if($this->AdminModel->update_siswa_spesifik($nama, $nis, $nisn, $kelas)){
				redirect('Adminis/daftar_siswa');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal mengubah informasi siswa.");
				redirect("Adminis/edit_siswa?nis=$nis");
			}
		}
		else
		{
			$nis = $this->input->get('nis');
			$data = [
				"siswa" => $this->AdminModel->get_siswa_spesifik($nis),
				"kelass" => $this->AdminModel->get_kelas()
			];
			$this->load->view('admin/edit_siswa', $data);
		}
	}

	public function edit_guru(){
		if(isset($_POST['editGuru'])){
			$nama = $this->input->post('nama');
			$idmapel = $this->input->post('idmapel');
			$nip = $this->input->post('nip_x');

			// var_dump([$nama, $idmapel, $nip]);die;

			if($this->AdminModel->update_guru_spesifik($nama, $nip, $idmapel)){
				redirect('Adminis/daftar_guru');
			} else {
				$this->session->set_userdata("pesanerror", "Gagal menambah guru");
				redirect("Adminis/edit_guru?nip=$nip");
			}
		}
		else
		{
			$nip = $this->input->get('nip');
			$data = [
				"guru" => $this->AdminModel->get_guru_spesifik($nip),
				"mapels" => $this->AdminModel->get_mapel()
			];
			// var_dump($data["guru"]);die;
			$this->load->view('admin/edit_guru', $data);
		}
	}

	public function hapus_guru(){
		$nip = $this->input->get('nip');
		if($this->AdminModel->delete_guru_spesifik($nip)){
			redirect("Adminis/daftar_guru");
		} else {
			$this->session->flashdata("pesanerror", "Gagal menghapus guru.");
			redirect("Adminis/daftar_guru");
		}
	}
}
