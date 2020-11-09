<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}


	public function index()
	{
		if ($this->session->userdata("email")) {
			redirect("landing");
		}

		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Login";
			$this->load->view("_components/auth/auth_header", $data);
			$this->load->view("auth/login_view");
			$this->load->view("_components/auth/auth_footer");
		} else {
			$this->_loginAction();
		}
	}

	private function _loginAction()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$userData = $this->db->get_where("users", ["email" => $email])->row_array();


		if ($userData) {
			if ($userData['is_active'] == 1) {
				if (password_verify($password, $userData["password"])) {
					$data = [
						"email" => $userData["email"],
						"role_id" => $userData["role_id"]
					];

					$this->session->set_userdata($data);

					if ($userData["role_id"] == 1) {
						redirect("dashboard");
					} elseif ($userData["role_id"] == 2) {
						redirect("dashboard");
					} else {
						redirect("home");
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password yang kamu masukkan salah</div>');
					redirect("auth");
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu belum diaktivasi</div>');
				redirect("auth");
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu belum terdaftar</div>');
			redirect("auth");
		}
	}

	public function register()
	{
		if ($this->session->userdata("email")) {
			redirect("landing");
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nickname', 'Nama Panggilan', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'E-mail ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Register";
			$this->load->view("_components/auth/auth_header", $data);
			$this->load->view("auth/register_view");
			$this->load->view("_components/auth/auth_footer");
		} else {
			$userData = [
				'user_id' => uniqid(),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nickname' => htmlspecialchars($this->input->post('nickname', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'avatar' => 'default.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->Auth_model->userRegistration($userData);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Register! Silahkan Login</div>');
			redirect("auth");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Kamu berhasil logout</div>');
		redirect("auth");
	}

	public function blocked()
	{

		$data["title"] = "Akses Ditolak";
		$this->load->view("_components/backend/header", $data);
		$this->load->view("auth/blocked_view");
		$this->load->view("_components/backend/footer");
	}
}
