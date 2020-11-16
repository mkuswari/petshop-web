<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

	public function getCategories()
	{
		$this->db->limit(5);
		return $this->db->get("categories")->result_array();
	}

	public function getProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->limit(3);
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
}
