<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		$this->load->library("form_validation");
		$this->load->model("Profile_model");
	}

	public function index()
	{
		// must_admin_and_staff();

		$data["title"] = "Profile Saya";
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("_components/backend/header", $data);
		$this->load->view("_components/backend/sidebar", $data);
		$this->load->view("_components/backend/topbar", $data);
		$this->load->view("backend/profile/profile_view");
		$this->load->view("_components/backend/footer");
	}

	public function editProfile()
	{

		// must_admin_and_staff();

		$this->form_validation->set_rules("name", "Nama", "required|trim");
		$this->form_validation->set_rules("email", "E-mail", "required|trim|valid_email");
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$profileData = [
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
			];
			// cek jika ada gambar yang diupload
			$uploadImage = $_FILES["avatar"];

			if ($uploadImage) {
				$config["allowed_types"] = "gif|jpg|png|bmp";
				$config["max_size"] = "1024";
				$config["upload_path"] = "./assets/images/";
				$this->load->library("upload", $config);

				if ($this->upload->do_upload("avatar")) {
					$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
					$oldImage = $data["users"]["avatar"];
					if ($oldImage != 'default.jpg') {
						unlink(FCPATH . 'assets/images/' . $oldImage);
					}
					$newImage = $this->upload->data("file_name");
					$this->db->set("avatar", $newImage);
				} else {
					echo $this->upload->display_errors();
				}
			}


			$this->Profile_model->updateProfile($profileData);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Profile Berhasil diperbarui</div>');
			redirect("profile");
		}
	}

	public function changePassword()
	{

		$this->form_validation->set_rules("current_password", "Password sekarang", "required|trim");
		$this->form_validation->set_rules("new_password", "Password Baru", "required|trim|min_length[4]", [
			"min_length" => "Password minimal 4 Karakter"
		]);
		$this->form_validation->set_rules("password_confirm", "Konfirmasi Password", "required|trim|matches[new_password]", [
			"matches" => "Konfirmasi password salah"
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
			$currentPassword = $this->input->post("current_password");
			$newPassword = $this->input->post("new_password");
			if (!password_verify($currentPassword, $data["users"]["password"])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Password kamu salah</div>');
				redirect("profile");
			} else {
				if ($currentPassword == $newPassword) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password baru tidak boleh sama dengan sebelumnya</div>');
					redirect("profile");
				} else {
					// password sudah bisa diterima
					$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

					$this->Profile_model->updatePassword($passwordHash);

					$this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diupdate</div>');
					redirect("profile");
				}
			}
		}
	}
}
