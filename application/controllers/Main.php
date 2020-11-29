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
		$data["page_title"] = "Petshop Wilayah Tegal";
		$data["products"] = $this->Main_model->getProducts();
		$data["categories"] = $this->Main_model->getCategories();
		$data["packages"] = $this->Main_model->getGroomingPackages();

		$this->load->view("landing_view", $data);
	}


	public function aboutUs()
	{
		$data["page_title"] = 'Tentang Kami';

		$this->load->view("about_view", $data);
	}
}
