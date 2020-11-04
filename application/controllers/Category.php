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
		$this->load->view("_components/backend/header", $data);
		$this->load->view("_components/backend/sidebar");
		$this->load->view("_components/backend/topbar", $data);
		$this->load->view("backend/categories/index_view", $data);
		$this->load->view("_components/backend/footer");
	}

	public function create()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();

		$this->form_validation->set_rules();

		if ($this->form_validation->run() == FALSE) {
			$data["title"] = "Tambah Kategori";
			$this->load->view("_components/backend/header", $data);
			$this->load->view("_components/backend/sidebar");
			$this->load->view("_components/backend/topbar", $data);
			$this->load->view("backend/categories/create_view");
			$this->load->view("_components/backend/footer");
		}
	}
}
