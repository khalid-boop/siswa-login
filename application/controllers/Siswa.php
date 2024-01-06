<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function index()
	{
		$data['siswa'] = $this->db->select('*')->from('siswa')->get();
		$this->load->view('siswa/index', $data);
	}

	public function add_view()
	{
		$this->load->view('siswa/add');
	}

	public function save()
	{
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		if ($nama != "" or $nis != "") {
			$cek_nis = $this->db->select('nis')
				->from('siswa')
				->where('nis', $nis)
				->get();
			if ($cek_nis->num_rows() > 0) {
				$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data Telah Ada</div>');
				redirect(base_url('siswa/add_view'));
			} else {
				$save['nama_lengkap'] = $nama;
				$save['nis'] = $nis;
				$this->db->insert('siswa', $save);
				$this->session->set_flashdata('info_siswa', '<div class="alert alert-success">Data(' . $nama . ') Berhasil Dikirim  </div>');
				redirect(base_url('siswa/index'));
			}
		} else {
			$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data GaK Boleh Kosong </div>');
			redirect(base_url('siswa/index'));
		}
	}
	public function destroy()
	{
		$data['siswa'] = $this->db->select('*')->from('siswa')->where('id', $this->uri->segment(3))->get();
		$this->load->view('siswa/destroy' , $data);
	}

	public function delete()
	{
		$nama = $this->input->post('nama');	
		$nis = $this->input->post('nis');	
		$id = $this->input->post('id');
		if($nama != "" or $nis != "" or $id !=""){
		$this->db->where('id' , $id);
		$this->db->delete('siswa');
		$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data Telah Dihapus!!!!</div>');
		redirect(base_url('siswa/index'));
		}else {
			$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data Mu Mana !!!!!</div>');
			redirect(base_url('siswa/index'));
		}
	}

	public function edit()
	{
		$data['siswa'] = $this->db->select('*')->from('siswa')->where('id', $this->uri->segment(3))->get();
		$this->load->view('siswa/edit', $data);
	}

	public function detail()
	{
		$data['siswa'] = $this->db->select('*')->from('siswa')->where('id', $this->uri->segment(3))->get();
		$this->load->view('siswa/detail', $data);
	}

	public function update()
	{
		$nama = $this->input->post('nama');
		$nis = $this->input->post('nis');
		$id = $this->input->post('id');
		if ($nama != "" or $id != "" or $nis != "") {
			$cek_nis = $this->db->select('*')
				->from('siswa')
				->where('nis', $nis)
				->where('nis !=', $nis)
				->get();
			if ($cek_nis->num_rows() > 0) {
				$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data gak Valid Ulang Lagi!!</div>');
				redirect(base_url('siswa/edit/' . $id));
			} else {
				$save['nama_lengkap'] = $nama;
				$save['nis'] = $nis;
				$this->db->where('id', $id);
				$this->db->update('siswa' , $save);
				$this->session->set_flashdata('info_siswa', '<div class="alert alert-success">Data Telah Diubah</div>');
				redirect(base_url('siswa/index'));
			}
		} else {
			$this->session->set_flashdata('info_siswa', '<div class="alert alert-danger">Data Mu Mana !!!!!</div>');
			redirect(base_url('siswa/index'));
		}
	}


}
