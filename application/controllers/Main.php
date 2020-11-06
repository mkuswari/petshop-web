<?php
defined('BASEPATH') or exit('No direct access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data["title"] = "Beli Makan untuk Kucing Kesayanganmu";
		$data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["categories"] = $this->Main_model->getCategories();
		$this->load->view("_components/frontend/header", $data);
		$this->load->view("_components/frontend/navbar", $data);
		$this->load->view("landing_view", $data);
		$this->load->view("_components/frontend/footer");
	}
}
