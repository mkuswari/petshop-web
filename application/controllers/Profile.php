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
		must_admin_and_staff();

		$data["title"] = "Profile Saya";
		$data["users"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$this->load->view("_components/backend/header", $data);
		$this->load->view("_components/backend/sidebar", $data);
		$this->load->view("_components/backend/topbar", $data);
		$this->load->view("backend/profile/profile_view");
		$this->load->view("_components/backend/footer");
	}

	public function editProfile()
	{

		must_admin_and_staff();

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
					$data["users"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
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
}
