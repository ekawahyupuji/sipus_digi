<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->query("select * from user where role_id = 2");
		$data['title'] = "Dashboard";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('anggota/index', $data);
		$this->load->view('layout/footer');
	}

	public function data_ebook()
	{
		$data['data_ebook'] = $this->m_sipus->joinKategoriebook('data_ebook')->result();
		$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();

		$data['title'] = "Data E-Book";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('anggota/data_ebook', $data);
		$this->load->view('layout/footer');
	}

	public function detail($id)
	{
		$data['data_ebook'] = $this->m_sipus->detail_data($id);
		$data['title'] = "Detail E-Book";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('anggota/detail', $data);
		$this->load->view('layout/footer');
	}
}
