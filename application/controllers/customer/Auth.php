<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer/Auth_model', 'Auth_model');
	}


	public function index()
	{
		if ($this->session->userdata("logged_in") == "customer") {
			redirect("/");
		}

		$data["page_title"] = "Login";

		$this->_loginValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/auth/login_view", $data);
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
		$userData = $this->db->get_where("customers", ["email" => $email])->row_array();
		if ($userData) {
			// cek apakah akun user sudah aktif
			if ($userData['is_active'] == 1) {
				// cek apakah password yang dimasukkan benar
				if (password_verify($password, $userData["password"])) {
					$customerData = [
						"customer_id" => $userData["customer_id"],
						"name" => $userData["name"],
						"avatar" => $userData["avatar"],
						"phone" => $userData["phone"],
						"address" => $userData["address"],
						"email" => $userData["email"],
						"created_at" => $userData["created_at"],
						"logged_in" => "customer"
					];

					$this->session->set_userdata($customerData);
					redirect("/");
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
		if ($this->session->userdata("logged_in") == "customer") {
			redirect("/");
		}

		$data["page_title"] = "Register";

		$this->_registerValidation();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("customer/auth/register_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = "default.jpg";
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$isActive = 1;

			// Set Data
			$userData = [
				'name' => $name,
				'avatar' => $avatar,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password,
				'is_active' => $isActive,
			];
			$this->Auth_model->userRegistration($userData);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Register! Silahkan Login</div>');
			redirect("login");
		}
	}

	public function logout()
	{
		$this->cart->destroy();
		$this->session->unset_userdata("customer_id");
		$this->session->unset_userdata("avatar");
		$this->session->unset_userdata("phone");
		$this->session->unset_userdata("address");
		$this->session->unset_userdata("email");
		$this->session->unset_userdata("created_at");
		$this->session->unset_userdata("logged_in");
		$this->session->set_flashdata('message', '<div class="alert alert-success">Kamu berhasil logout</div>');
		redirect("login");
	}

	public function blocked()
	{
		$data["page_title"] = "Akses Ditolak";

		$this->load->view("customer/auth/blocked_view", $data);
	}

	private function _loginValidation()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
	}

	private function _registerValidation()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[customers.email]', [
			'is_unique' => 'E-mail ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim|is_unique[customers.phone]', [
			'is_unique' => 'Nomor Ponsel ini sudah digunakan'
		]);
		$this->form_validation->set_rules('address', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
	}
}
