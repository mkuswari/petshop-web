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
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["page_title"] = "Kelola User";
		$data["users"] = $this->User_model->getAllUser();

		$this->load->view("backend/users/index_view", $data);
	}

	public function create()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["title"] = "Tambah User";
		$data["roles"] = $this->User_model->getAllRoles();

		$this->_validationAdd();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("backend/users/create_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$nickName = strtolower(htmlspecialchars($this->input->post("nickname", true)));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/avatars/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$avatar = $this->upload->data("file_name");
				} else {
					$avatar = "default.jpg";
				}
			}
			$password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$roleId = $this->input->post("role_id");
			$isActive = 1;
			$dateCreated = time();

			// Set Data
			$userData = [
				"name" => $name,
				"nickname" => $nickName,
				"avatar" => $avatar,
				"phone" => $phone,
				"address" => $address,
				"email" => $email,
				"password" => $password,
				"role_id" => $roleId,
				"is_active" => $isActive,
				"date_created" => $dateCreated
			];

			$this->User_model->addNewUser($userData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect("kelola-user");
		}
	}

	public function edit($id)
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["title"] = "Ubah Data User";
		$data["user"] = $this->User_model->getUserById($id);
		$data["roles"] = $this->User_model->getAllRoles();

		$this->_validatonEdit();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("backend/users/edit_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$nickName = strtolower(htmlspecialchars($this->input->post("nickname", true)));
			$email = htmlspecialchars($this->input->post("email", true));
			$phone = htmlspecialchars($this->input->post("phone", true));
			$address = htmlspecialchars($this->input->post("address", true));
			$avatar = $_FILES["avatar"];
			if ($avatar) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["upload_path"] = "./assets/uploads/avatars/";
				$config['file_name'] = round(microtime(true) * 1000);
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("avatar")) {
					$user = $this->User_model->getUserById($id);
					$oldAvatar = $user["avatar"];
					if ($oldAvatar != "default.jpg") {
						unlink('./assets/uploads/avatars/' . $oldAvatar);
					}
					$newAvatar = $this->upload->data("file_name");
					$avatar = $newAvatar;
				} else {
					$user = $this->User_model->getUserById($id);
					$avatar = $user["avatar"];
				}
			}
			$roleId = $this->input->post("role_id");
			$isActive = 1;

			// Set Data
			$userData = [
				"name" => $name,
				"nickname" => $nickName,
				"avatar" => $avatar,
				"phone" => $phone,
				"address" => $address,
				"email" => $email,
				"role_id" => $roleId,
				"is_active" => $isActive,
			];
			$this->User_model->updateUser($userData);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("kelola-user");
		}
	}

	public function delete($id)
	{
		$user = $this->User_model->getUserById($id);
		if (file_exists('./assets/uploads/avatars/' . $user["avatar"]) && $user["avatar"] != "default.jpg") {
			unlink('./assets/uploads/avatars/' . $user["avatar"]);
		}
		$this->User_model->deleteUser($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("kelola-user");
	}



	// validation function
	private function _validationAdd()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nickname', 'Nama Panggilan', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'E-mail ini sudah digunakan'
		]);
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim|is_unique[users.phone]', [
			'is_unique' => 'Nomor ini sudah digunakan'
		]);
		$this->form_validation->set_rules('address', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]', [
			'min_length' => 'Password minimal harus 4 karakter'
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sesuai'
		]);
		$this->form_validation->set_rules('role_id', 'Hak Akses', 'required');
	}

	private function _validatonEdit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nickname', 'Nama Panggilan', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('phone', 'Nomor Ponsel', 'required|trim');
		$this->form_validation->set_rules('address', 'Alamat Tinggal', 'required|trim');
		$this->form_validation->set_rules('role_id', 'Hak Akses', 'required');
	}
}
