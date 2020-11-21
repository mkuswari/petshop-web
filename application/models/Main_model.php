<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

	public function getCategories()
	{
		$this->db->limit(4);
		return $this->db->get("categories")->result_array();
	}


	public function getAllCategories()
	{
		return $this->db->get("categories")->result_array();
	}

	public function getCategoryById($id)
	{
		return $this->db->get_where("categories", ["category_id" => $id])->row_array();
	}

	public function getProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function getLatestProduct()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->limit(4);
		$this->db->order_by("item_id", "DESC");
		return $this->db->get()->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		return $this->db->get()->result_array();
	}

	public function getAllProductsWithPagination($limit, $offset)
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->order_by("item_id", "DESC");
		$this->db->limit($limit, $offset);
		return $this->db->get()->result_array();
	}

	public function getTitleBySlug($slug)
	{
		$this->db->select("name");
		$this->db->from("items");
		$this->db->where("slug", $slug);
		return $this->db->get()->row_array();
	}

	public function getProductBySlug($slug)
	{
		return $this->db->get_where("items", ["slug" => $slug])->row_array();
	}

	public function getGroomingPackages()
	{
		return $this->db->get("packages")->result_array();
	}

	public function getGroomingPackageBySlug($slug)
	{
		return $this->db->get_where("packages", ["slug" => $slug])->row_array();
	}

	public function registerGrooming($groomingData)
	{
		$this->db->insert("groomings", $groomingData);
	}

	public function getSearchResult()
	{
		$keyword = $this->input->post("keyword");
		$this->db->like('name', $keyword);
		return $this->db->get("items")->result_array();
	}

	public function getProductsByCategory($id)
	{
		return $this->db->get_where("items", ["category_id" => $id])->result_array();
	}

	public function getGroomingsDataByUser($userId)
	{
		$this->db->select("groomings.*, packages.cost, name AS package_name");
		$this->db->from("groomings");
		$this->db->join("packages", "packages.package_id = groomings.package_id");
		$this->db->where("user_id", $userId);
		return $this->db->get()->result_array();
		// return $this->db->get_where("groomings", ["user_id" => $userId])->result_array();
	}

	// public function getItemById($id)
	// {
	// 	$this->db->select("*");
	// 	$this->db->from("items");
	// 	$this->db->where("item_id", $id);
	// 	return $this->db->get()->row_array();
	// }
}
