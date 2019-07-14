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
		$this->load->view('Admin/map');
	}

	public function akun()
	{
		$this->load->view('admin/user_akun');
	}
	
	public function tambah_akun()
	{
		$this->load->view('Admin/tambah_akun');
	}

	public function tambah_siswa()
	{
		$this->load->view('Admin/tambah_siswa');
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