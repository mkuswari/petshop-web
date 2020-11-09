<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		must_admin_and_staff();
		$this->load->library('form_validation');
		$this->load->model('Product_model');
	}

	public function index()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["title"] = "Kelola Item";
		$data["products"] = $this->Product_model->getAllProduct();

		$this->load->view("backend/products/index_view", $data);
	}

	public function create()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["categories"] = $this->Product_model->getProductCategory();
		$data["title"] = "Tambah Item";

		$this->form_validation->set_rules("name", "Nama Produk", "required|trim");
		// $this->form_validation->set_rules("thumbnail", "Thumbnail Produk", "required");
		$this->form_validation->set_rules("description", "Deskripsi Produk", "required|trim");
		$this->form_validation->set_rules("stock", "Stock Produk", "required|trim");
		$this->form_validation->set_rules("price", "Harga Produk", "required|trim");
		$this->form_validation->set_rules("category_id", "Kategori", "required");
		if ($this->form_validation->run() == FALSE) {

			$this->load->view("backend/products/create_view", $data);
		} else {
			$itemId = uniqid();
			$name = htmlspecialchars($this->input->post("name", true));
			$description = htmlspecialchars($this->input->post("description", true));
			$stock = htmlspecialchars($this->input->post("stock", true));
			$price = htmlspecialchars($this->input->post("price", true));
			$categoryId = $this->input->post("category_id");
			$slug = strtolower(str_replace("", "-", trim(preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>"]/', '', $name))));
			$images = $_FILES["images"];
			if ($images) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/items_images/";
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("images")) {
					$images = $this->upload->data("file_name");
				} else {
					// echo $this->display_error();
					echo "Upload gagal";
				}
			}
			$productData = [
				"item_id" => $itemId,
				"name" => $name,
				"slug" => $slug,
				"images" => $images,
				"description" => $description,
				"stock" => $stock,
				"price" => $price,
				"category_id" => $categoryId
			];
			$this->Product_model->addNewProduct($productData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect("product");
		}
	}

	public function edit($id)
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["product"] = $this->db->get_where("products", ["product_id" => $id])->row_array();
		$data["categories"] = $this->Product_model->getProductCategory();
		$data["title"] = "Edit Data Produk";

		$this->form_validation->set_rules("name", "Nama Produk", "required|trim");
		$this->form_validation->set_rules("description", "Deskripsi Produk", "required|trim");
		$this->form_validation->set_rules("stock", "Stok Produk", "required|trim");
		$this->form_validation->set_rules("price", "Harga Produk", "required|trim");
		$this->form_validation->set_rules("category_id", "Kategori", "required");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("_components/backend/header", $data);
			$this->load->view("_components/backend/sidebar");
			$this->load->view("_components/backend/topbar", $data);
			$this->load->view("backend/products/edit_view", $data);
			$this->load->view("_components/backend/footer");
		} else {
			// validasi berhasil
			$name = htmlspecialchars($this->input->post("name", true));
			$slug = strtolower(str_replace("", "-", trim(preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>"]/', '', $name))));
			$description = htmlspecialchars($this->input->post("description", true));
			$stock = htmlspecialchars($this->input->post("stock", true));
			$price = htmlspecialchars($this->input->post("price", true));
			$categoryId = $this->input->post("category_id", true);
			$images = $_FILES["images"];
			if ($images) {
				$config["allowed_types"] = "jpg|jpeg|png|bmp|gif";
				$config["max_size"] = 1024; //1 MB
				$config["upload_path"] = "./assets/uploads/items_images/";
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("images")) {
					$data["product"] = $this->db->get_where("products", ["product_id" => $this->input->post("product_id")])->row_array();
					$oldImages = $data["product"]["images"];
					if ($oldImages) {
						unlink(FCPATH . 'assets/uploads/items_images/' . $oldImages);
					}
					$newImages = $this->upload->data("file_name");
					$images = $newImages;
				} else {
					$data["product"] = $this->db->get_where("products", ["product_id" => $this->input->post("product_id")])->row_array();
					$thumbnail = $data["product"]["thumbnail"];
				}
			}
			$productData = [
				"name" => $name,
				"slug" => $slug,
				"thumbnail" => $thumbnail,
				"description" => $description,
				"stock" => $stock,
				"price" => $price,
				"category_id" => $categoryId
			];
			$this->Product_model->updateProduct($productData);
			$this->session->set_flashdata('message', 'Diubah');
			redirect("product");
		}
	}

	public function delete($id)
	{
		$this->Product_model->deleteProduct($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect("product");
	}
}
