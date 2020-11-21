<?php
defined('BASEPATH') or exit('No direct access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["page_title"] = "Beli Makan untuk Kucing Kesayanganmu";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["products"] = $this->Main_model->getProducts();
		$data["categories"] = $this->Main_model->getCategories();
		$data["packages"] = $this->Main_model->getGroomingPackages();

		$this->load->view("frontend/landing_view", $data);
	}

	public function productPage()
	{
		$data["page_title"] = "Belanja";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["categories"] = $this->Main_model->getCategories();
		$data["products"] = $this->Main_model->getAllProducts();

		if ($this->input->post("keyword")) {
			$data["products"] = $this->Main_model->getSearchResult();
		}

		$this->load->view("frontend/product_view", $data);
	}

	public function detailProduct($slug)
	{
		$getTitle = $this->Main_model->getTitleBySlug($slug);
		$data["page_title"] = $getTitle["name"];
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["product"] = $this->Main_model->getProductBySlug($slug);
		$data["products"] = $this->Main_model->getLatestProduct();

		$this->load->view("frontend/detail_view", $data);
	}


	public function categoryPage()
	{
		$data["page_title"] = "Kategori";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["categories"] = $this->Main_model->getAllCategories();

		$this->load->view("frontend/category_view", $data);
	}

	public function productByCategoryPage($id)
	{
		$data["page_title"] = "Kategori";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["products"] = $this->Main_model->getProductsByCategory($id);
		$data["active_category"] = $this->Main_model->getCategoryById($id);
		$data["categories"] = $this->Main_model->getCategories();

		$this->load->view("frontend/product_category_view", $data);
	}

	public function groomingPage()
	{
		$data["page_title"] = "Grooming";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$userId = $data["user_session"]["user_id"];
		$data["groomings"] = $this->Main_model->getGroomingsDataByUser($userId);

		$this->load->view("frontend/grooming_view", $data);
	}

	public function registerGrooming()
	{
		must_login();

		$data["page_title"] = "Form Registrasi Grooming";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["packages"] = $this->Main_model->getGroomingPackages();
		// $data["selected_package"] = $this->Main_model->getGroomingPackageBySlug($slug);

		$this->form_validation->set_rules("customer_name", "Nama Customer", "required");
		$this->form_validation->set_rules("customer_phone", "Phone Customer", "required");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
		$this->form_validation->set_rules("package_id", "Paket Grooming", "required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("frontend/grooming_registration_view", $data);
		} else {
			$customerName = $this->input->post("customer_name");
			$customerPhone = $this->input->post("customer_phone");
			$customerAddress = $this->input->post("customer_address");
			$petType = $this->input->post("pet_type");
			$groomingStatus = "Diterima";
			$packageId =  $this->input->post("package_id");
			$notes = $this->input->post("notes");
			$userId = $this->input->post("user_id");
			$dateCreated = time();

			$groomingData = [
				"customer_name" => $customerName,
				"customer_phone" => $customerPhone,
				"customer_address" => $customerAddress,
				"pet_type" => $petType,
				"grooming_status" => $groomingStatus,
				"package_id" => $packageId,
				"notes"  => $notes,
				"user_id" => $userId,
				"date_created" => $dateCreated
			];

			$this->Main_model->registerGrooming($groomingData);
			$this->session->set_flashdata('message', 'Berhasil');
			redirect("grooming");
		}
	}


	public function aboutUs()
	{
		$data["page_title"] = 'Tentang Kami';
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();

		$this->load->view("frontend/about_view", $data);
	}

	// public function addToCart($id)
	// {
	// 	$item = $this->Main_model->getItemById($id);
	// 	$data = array(
	// 		'item_id' => $item["item_id"],
	// 		"qty" => 1,
	// 		"price" => $item["price"],
	// 		"name" => $item["name"]
	// 	);

	// 	$this->cart->insert($data);
	// 	redirect('home');
	// }
}
