<?php

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer/Category_model', 'Category_model');
	}

	public function index()
	{
		$data["page_title"] = "Kategori";
		$data["categories"] = $this->Category_model->getAllCategories();

		$this->load->view("customer/categories/category_view", $data);
	}
}
