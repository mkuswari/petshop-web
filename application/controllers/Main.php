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

		// pagination feature

		// load library
		$this->load->library("pagination");
		// konfigurasi
		$config["base_url"] = "http://localhost/petshop/produk";
		$config["total_rows"] = $this->db->count_all("items");
		$config["per_page"] = 12;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		// membuat pagination dengan style bootstrap 4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		// inisialisasi
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data'] = $this->Main_model->getAllProductsWithPagination($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();
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
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->input->post("email")])->row_array();
		$data["categories"] = $this->Main_model->getAllCategories();

		$this->load->view("frontend/categories_view", $data);
	}

	public function grooming($slug)
	{
		must_login();

		$data["page_title"] = "Pendaftaran Grooming";
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["selected_package"] = $this->Main_model->getGroomingPackageBySlug($slug);
		$data["packages"] = $this->Main_model->getGroomingPackages();

		$this->_validateGrooming();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("frontend/grooming_view", $data);
		} else {
			$customerName = htmlspecialchars($this->input->post("customer_name", true));
			$customerPhone = htmlspecialchars($this->input->post("customer_phone", true));
			$customerAddress = htmlspecialchars($this->input->post("customer_address", true));
			$petType = htmlspecialchars($this->input->post("pet_type", true));
			$groomingPackage = htmlspecialchars($this->input->post("package_id", true));
			$customerNotes = htmlspecialchars($this->input->post("notes", true));
			$dateCreated = time();

			$groomingData = [
				"customer_name" => $customerName,
				"customer_phone" => $customerPhone,
				"customer_address" => $customerAddress,
				"pet_type" => $petType,
				"package_id" => $groomingPackage,
				"notes" => $customerNotes,
				"date_created" => $dateCreated
			];

			$this->Main_model->registerGrooming($groomingData);
			echo "Pendaftaran Grooming berhasil";
		}
	}

	public function aboutUs()
	{
		$data["page_title"] = 'Tentang Kami';
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();

		$this->load->view("frontend/about_view", $data);
	}


	private function _validateGrooming()
	{
		$this->form_validation->set_rules("customer_name", "Nama Customer", "required|trim");
		$this->form_validation->set_rules("customer_phone", "Nomor Ponsel Customer", "required|trim");
		$this->form_validation->set_rules("customer_address", "Alamat Customer", "required|trim");
		$this->form_validation->set_rules("pet_type", "Tipe Peliharaan", "required");
		$this->form_validation->set_rules("package_id", "Paket Grooming", "required");
		$this->form_validation->set_rules("notes", "Catatan Customer", "required|trim");
	}
}
