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

		$data["page_title"] = "Login";

		$this->_loginValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("auth/login_view", $data);
		} else {
			// memanggil method aksi login
			$this->_loginAction();
		}
	}

	private function _loginAction()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		// cek apakah dengan email yang di input ada
		$userData = $this->db->get_where("users", ["email" => $email])->row_array();
		if ($userData) {
			// cek apakah akun user sudah aktif
			if ($userData['is_active'] == 1) {
				// cek apakah password yang dimasukkan benar
				if (password_verify($password, $userData["password"])) {
					$data = [
						"email" => $userData["email"],
						"role_id" => $userData["role_id"]
					];

					$this->session->set_userdata($data);

					// Cek hak akses
					if ($userData["role_id"] == 1) {
						redirect("dashboard");
					} elseif ($userData["role_id"] == 2) {
						redirect("dashboard");
					} else {
						redirect("home");
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password kamu salah</div>');
					redirect("login");
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu belum diaktivasi</div>');
				redirect("login");
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu belum terdaftar</div>');
			redirect("login");
		}
	}

	public function register()
	{
		if ($this->session->userdata("email")) {
			redirect("landing");
		}

		$data["page_title"] = "Register";

		$this->_registerValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("auth/register_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$nickname = strtolower(htmlspecialchars($this->input->post("nickname", true)));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = "default.jpg";
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$roleId = 3;
			$isActive = 1;
			$dateCreated = time();

			// Set Data
			$userData = [
				'name' => $name,
				'nickname' => $nickname,
				'avatar' => $avatar,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password,
				'role_id' => $roleId,
				'is_active' => $isActive,
				'date_created' => $dateCreated
			];
			$this->Auth_model->userRegistration($userData);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Register! Silahkan Login</div>');
			redirect("login");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Kamu berhasil logout</div>');
		redirect("login");
	}

	public function blocked()
	{
		$data["page_title"] = "Akses Ditolak";

		$this->load->view("auth/blocked_view", $data);
	}

	private function _loginValidation()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
	}

	private function _registerValidation()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nickname', 'Nama Panggilan', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'E-mail ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim');
		$this->form_validation->set_rules('address', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
	}
}
