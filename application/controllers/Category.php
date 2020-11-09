<?php
defined('BASEPATH') or exit('No direct script access');

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		must_admin();
		$this->load->model('Category_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["title"] = "Kelola Kategori";
		$data["categories"] = $this->Category_model->getAllCategory();

		$this->load->view("backend/categories/index_view", $data);
	}

	public function create()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();

		$this->form_validation->set_rules("name", "Nama Kategori", "required|trim");

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Tambah Kategori";

			$this->load->view("backend/categories/create_view", $data);
		} else {
			$categoryId = uniqid();
			$name = htmlspecialchars($this->input->post("name", true));
			$stringSlug = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>"]/', '', $name);
			$trim = trim($stringSlug);
			$preSlug = strtolower(str_replace(" ", "-", $trim));
			$slug = $preSlug;
			$image = $_FILES["image"];
			if ($image) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/categories_images/";
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("image")) {
					$image = $this->upload->data("file_name");
				} else {
					// echo $this->display_error();
					echo "Upload gagal";
				}
			}
			$categoryData = [
				"category_id" => $categoryId,
				"name" => $name,
				"slug" => $slug,
				"image" => $image,
				"date_created" => time()
			];
			$this->Category_model->addNewCategory($categoryData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect("category");
		}
	}

	public function edit($id)
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["category"] = $this->db->get_where("categories", ["category_id" => $id])->row_array();

		$this->form_validation->set_rules("name", "Nama Kategori", "required|trim");

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Ubah Kategori";

			$this->load->view("backend/categories/edit_view", $data);
		} else {
			$name = htmlspecialchars($this->input->post("name", true));
			$stringSlug = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>"]/', '', $name);
			$trim = trim($stringSlug);
			$preSlug = strtolower(str_replace(" ", "-", $trim));
			$slug = $preSlug;
			$image = $_FILES["image"];
			if ($image) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/categories_images/";
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("image")) {
					$data["categories"] = $this->db->get_where("categories", ["category_id" => $this->input->post("category_id")])->row_array();
					$oldImage = $data["categories"]["image"];
					if ($oldImage) {
						unlink(FCPATH . 'assets/uploads/categories_images/' . $oldImage);
					}
					$newImage = $this->upload->data("file_name");
					$image = $newImage;
				} else {
					$data["categories"] = $this->db->get_where("categories", ["category_id" => $this->input->post("category_id")])->row_array();
					$image = $data["categories"]["image"];
				}
			}
			$categoryData = [
				"name" => $name,
				"slug" => $slug,
				"image" => $image,
				"date_created" => time()
			];
			$this->Category_model->updateCategory($categoryData);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("category");
		}
	}

	public function delete($id)
	{
		$this->Category_model->deleteCategory($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("category");
	}
}
