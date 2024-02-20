<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->query("select * from user where role_id = 2");
		$data['title'] = "Dashboard Admin";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('layout/footer');
	}

	public function data_kategori()
	{
		$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();
		$data['title'] = "Data Kategori";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('admin/data_kategori', $data);
		$this->load->view('layout/footer');
	}
	public function act_tambahkategori()
	{
		$nama_kategori = $this->input->post('nama_kategori');

		$this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim');

		if ($this->form_validation->run() != false) {
			$data = array(
				'nama_kategori' => $nama_kategori
			);
			$this->m_sipus->insert_data($data, 'data_kategori');

			$this->session->set_flashdata(
				'massage',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Data anda berhasil ditambahkan!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect('admin/data_kategori');
		} else {
            //$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();
			$data['title'] = "Data Kategori";
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('admin/data_kategori', $data);
			$this->load->view('layout/footer');
		}
	}

	public function edit_kategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_kategori' => $id_kategori
			);
			$data = array(
				'nama_kategori' => $nama_kategori
			);
			$this->m_sipus->update_data($where, $data, 'data_kategori');
			$this->session->set_flashdata(
				'massage',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Data anda berhasil diupdate!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect('admin/data_kategori');
		}
	}

	function hapus_kategori($id)
	{
		$where = array(
			'id_kategori' => $id
		);

		$this->m_sipus->delete_data($where, 'data_kategori');
		$this->session->set_flashdata(
			'massage',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle me-1"></i>
			Data berhasil dihapus!!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect('admin/data_kategori');
	}

	public function data_ebook()
	{
		$data['data_ebook'] = $this->m_sipus->joinKategoriebook('data_ebook')->result();
		$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();

		$data['title'] = "Data E-Book";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('admin/data_ebook', $data);
		$this->load->view('layout/footer');
	}

	public function act_tambahebook()
	{
		$id_kategori = $this->input->post('id_kategori');
		$judul = $this->input->post('judul_ebook');
		$pengarang = $this->input->post('pengarang');
		$thn_terbit = $this->input->post('thn_terbit');
		$penerbit = $this->input->post('penerbit');
		$tgl_input = date('Y-m-d');

		$this->form_validation->set_rules('id_kategori', 'IdKategori', 'required');
		$this->form_validation->set_rules('judul_ebook', 'Judul Ebook', 'required');

        //configurasi upload Gambar
		$config['upload_path'] = './template/dokumen/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '50000';
        //$config['file_name'] = 'ebook' . time();

		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();
			$data['data_ebook'] = $this->m_sipus->get_data('data_ebook')->result();
			$data['title'] = "Data E-Book";
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('admin/data_ebook');
			$this->load->view('layout/footer');
		} else {
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$upload = $file['file_name'];
			} else {
				$upload = '';
			}

			$data = [
				'id_kategori' => $id_kategori,
				'judul_ebook' => $judul,
				'pengarang' => $pengarang,
				'thn_terbit' => $thn_terbit,
				'penerbit' => $penerbit,
				'file' => $upload,
				'tgl_input' => $tgl_input
			];
			$this->m_sipus->insert_data($data, 'data_ebook');
			$this->session->set_flashdata(
				'massage',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Data anda berhasil ditambahkan!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect(base_url() . 'admin/data_ebook');
		}
	}

	function ebook_edit($id)
	{
		$where = array(
			'id_ebook' => $id
		);
		$data['data_ebook'] = $this->m_sipus->joinKategoriebook()->result_array();
		$data['data_kategori'] = $this->m_sipus->get_data('data_kategori')->result();
		$data['data_ebook'] = $this->m_sipus->edit_data($where, 'data_ebook')->result();
		$data['title'] = "Ubah E-Book";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('admin/ubah_ebook', $data);
		$this->load->view('layout/footer');
	}

	public function ubah_ebook()
	{
		$id_ebook = $this->input->post('id_ebook');
		$id_kategori = $this->input->post('id_kategori');
		$judul = $this->input->post('judul_ebook');
		$pengarang = $this->input->post('pengarang');
		$thn_terbit = $this->input->post('thn_terbit');
		$penerbit = $this->input->post('penerbit');
		$tgl_input = date('Y-m-d');

		$this->form_validation->set_rules('judul_ebook', 'Judul Buku', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('thn_penerbit', 'Tahun Penerbit', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');

        //konfigurasi sebelum gambar diupload
		$config['upload_path'] = './template/dokumen/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '10000';
        //$config['file_name'] = 'ebook' . time();

        //memuat atau memanggil library upload
		$this->load->library('upload', $config);

		if ($this->form_validation->run() != false) {
			$data['data_ebook'] = $this->m_sipus->joinKategoriebook('data_ebook')->result();
			$data['data_ebook'] = $this->db->query("select * from data_ebook order by id_ebook")->result();
			$data['title'] = "Ubah E-Book";
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('admin/ubah_ebook', $data);
			$this->load->view('layout/footer');
		} else {
			if ($this->upload->do_upload('file')) {
				$file = $this->upload->data();
				$upload = $file['file_name'];
			} else {
				$upload = '';
			}

			$where = array(
				'id_ebook' => $id_ebook
			);

			$data = [
				'id_kategori' => $id_kategori,
				'judul_ebook' => $judul,
				'pengarang' => $pengarang,
				'thn_terbit' => $thn_terbit,
				'penerbit' => $penerbit,
				'file' => $upload,
				'tgl_input' => $tgl_input
			];
			$this->session->set_flashdata(
				'massage',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Data anda berhasil diupdate!!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);

			$this->m_sipus->update_data($where, $data, 'data_ebook');
			redirect('admin/data_ebook');
		}
	}

	public function detail($id)
	{
		$data['data_ebook'] = $this->m_sipus->detail_data($id);
		$data['title'] = "Detail E-Book";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('admin/detail', $data);
		$this->load->view('layout/footer');
	}

	public function hapus_ebook($id)
	{
		$where = array(
			'id_ebook' => $id
		);

        //menghapus data di database
		$this->m_sipus->delete_data($where, 'data_ebook');
		$this->session->set_flashdata(
			'massage',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle me-1"></i>
			Data anda berhasil dihapus!!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect(base_url() . 'admin/data_ebook');
	}
}
