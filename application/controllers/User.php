<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		must_login();
		must_admin();
	}

	public function index()
	{
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();

		$data["title"] = "Kelola User";
		$data["users"] = $this->User_model->getAllUser();
		$this->load->view("_components/backend/header", $data);
		$this->load->view("_components/backend/sidebar");
		$this->load->view("_components/backend/topbar", $data);
		$this->load->view("backend/users/index_view", $data);
		$this->load->view("_components/backend/footer");
	}

	public function create()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'E-mail ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
		$this->form_validation->set_rules('role_id', 'Hak Akses', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Tambah User";
			$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
			$data["roles"] = $this->User_model->getAllRoles();
			$this->load->view("_components/backend/header", $data);
			$this->load->view("_components/backend/sidebar");
			$this->load->view("_components/backend/topbar", $data);
			$this->load->view("backend/users/create_view", $data);
			$this->load->view("_components/backend/footer");
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$email = htmlspecialchars($this->input->post("email", true));
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$roleId = $this->input->post("role_id");
			$isActive = 1;
			$dateCreated = time();
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				// $config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/images/";
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$avatar = $this->upload->data("file_name");
				} else {
					echo $this->upload->display_errors();
				}
			}
			$userData = [
				"name" => $name,
				"email" => $email,
				"avatar" => $avatar,
				"password" => $password,
				"role_id" => $roleId,
				"is_active" => $isActive,
				"date_created" => $dateCreated
			];

			$this->User_model->addNewUser($userData);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil! User baru telah berhasil ditambahkan</div>');
			redirect("user");
		}
	}
}
