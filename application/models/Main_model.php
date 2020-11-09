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
		$this->db->select("products.*, categories.name AS category_name");
		$this->db->from("products");
		$this->db->join("categories", "categories.category_id = products.category_id");
		return $this->db->get()->result_array();
	}
}
