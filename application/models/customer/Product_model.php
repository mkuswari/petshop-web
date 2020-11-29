<?php
class Product_model extends CI_Model
{

	public function getCategories()
	{
		$this->db->limit(4);
		return $this->db->get("categories")->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		return $this->db->get()->result_array();
	}

	public function getSearchResult()
	{
		$keyword = $this->input->post("keyword");
		$this->db->like('name', $keyword);
		return $this->db->get("items")->result_array();
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

	public function getLatestProduct()
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->limit(4);
		$this->db->order_by("item_id", "DESC");
		return $this->db->get()->result_array();
	}
}
