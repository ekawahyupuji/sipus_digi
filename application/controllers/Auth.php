<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function login_admin()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Admin";
			$this->load->view('layout/header', $data);
			$this->load->view('auth/login_admin');
			$this->load->view('layout/footer');
		} else {
            //validasinya sukses
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

            //jika usernya ada
			if ($user) {
                //cek user aktif
				if ($user['is_active'] == 1) {
                    //cek password
					if (password_verify($password, $user['password'])) {
						$data = [
							'username' => $user['username'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
						];

						$this->session->set_userdata($data);
						if ($user['role_id'] == 1) {
							redirect('admin');
						} else {
							$this->session->set_flashdata(
								'massage',
								'<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<i class="bi bi-check-circle me-1"></i>
								Anda bukan admin!!
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>'
							);
							redirect('auth/login_admin');
						}
					} else {
						$this->session->set_flashdata(
							'massage',
							'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<i class="bi bi-check-circle me-1"></i>
							Password anda tidak sesuai!!!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>'
						);
						redirect('auth/login_admin');
					}
				} else {
					$this->session->set_flashdata(
						'massage',
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="bi bi-check-circle me-1"></i>
						Email belum terdaftar!!!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'
					);
					redirect('auth/login_admin');
				}
			} else {
				$this->session->set_flashdata(
					'massage',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="bi bi-check-circle me-1"></i>
					Email belum terdaftar!!!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);
				redirect('auth/login_admin');
			}
		}
	}


	public function login_anggota()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Anggota";
			$this->load->view('layout/header', $data);
			$this->load->view('auth/login_anggota');
			$this->load->view('layout/footer');
		} else {
            //validasinya sukses
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

            //jika usernya ada
			if ($user) {
                //cek user aktif
				if ($user['is_active'] == 1) {
                    //cek password
					if (password_verify($password, $user['password'])) {
						$data = [
							'username' => $user['username'],
							'email' => $user['email'],
							'role_id' => $user['role_id'],
						];

						$this->session->set_userdata($data);
						if ($user['role_id'] == 1) {
							redirect('admin');
						} else {
							redirect('anggota');
						}
					} else {
						$this->session->set_flashdata(
							'massage',
							'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<i class="bi bi-check-circle me-1"></i>
							Password anda tidak sesuai!!!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>'
						);
						redirect('auth/login_anggota');
					}
				} else {
					$this->session->set_flashdata(
						'massage',
						'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<i class="bi bi-check-circle me-1"></i>
						Email belum terdaftar!!!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'
					);
					redirect('auth/login_anggota');
				}
			} else {
				$this->session->set_flashdata(
					'massage',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="bi bi-check-circle me-1"></i>
					Email belum terdaftar!!!
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);
				redirect('auth/login_anggota');
			}
		}
	}

	public function regristrasi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[5]',
			['min_length' => 'The Password field must be at least 5 characters']
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Regristrasi Anggota";
			$this->load->view('layout/header', $data);
			$this->load->view('auth/regristrasi');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata(
				'massage',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Data anda berhasil ditambahkan
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
			);
			redirect('auth/login_anggota');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('home');
	}
}
