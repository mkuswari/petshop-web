<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

	public function getAllProduct()
	{
		$this->db->select('items.*, categories.name AS category_name');
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		return $this->db->get()->result_array();
	}


	public function getProductCategory()
	{
		return $this->db->get("categories")->result_array();
	}

	public function addNewProduct($productData)
	{
		$this->db->insert("products", $productData);
	}

	public function updateProduct($productData)
	{
		$this->db->set("name", $productData["name"]);
		$this->db->set("slug", $productData["slug"]);
		$this->db->set("thumbnail", $productData["thumbnail"]);
		$this->db->set("description", $productData["description"]);
		$this->db->set("stock", $productData["stock"]);
		$this->db->set("price", $productData["price"]);
		$this->db->set("category_id", $productData["category_id"]);
		$this->db->where("product_id", $this->input->post("product_id"));
		$this->db->update("products", $productData);
	}

	public function deleteProduct($id)
	{
		$this->db->where("product_id", $id);
		$this->db->delete("products");
	}
}
