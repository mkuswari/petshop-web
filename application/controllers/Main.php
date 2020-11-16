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
		$data["page_title"] = "Beli Makan untuk Kucing Kesayanganmu";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["products"] = $this->Main_model->getProducts();
		$data["categories"] = $this->Main_model->getCategories();

		$this->load->view("frontend/landing_view", $data);
	}

	public function productPage()
	{
		$data["page_title"] = "Belanja";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["categories"] = $this->Main_model->getCategories();
		$data["products"] = $this->Main_model->getProducts();

		$this->load->view("frontend/product_view", $data);
	}

	public function detailProduct($slug)
	{
		$getTitle = $this->Main_model->getTitleBySlug($slug);
		$data["page_title"] = $getTitle["name"];
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["product"] = $this->Main_model->getProductBySlug($slug);
		$data["products"] = $this->Main_model->getProducts();

		$this->load->view("frontend/detail_view", $data);
	}
}
