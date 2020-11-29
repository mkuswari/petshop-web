<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{


	public function getAllProductsWithPagination($limit, $offset)
	{
		$this->db->select("items.*, categories.name AS category_name");
		$this->db->from("items");
		$this->db->join("categories", "categories.category_id = items.category_id");
		$this->db->order_by("item_id", "DESC");
		$this->db->limit($limit, $offset);
		return $this->db->get()->result_array();
	}

	public function getGroomingPackageBySlug($slug)
	{
		return $this->db->get_where("packages", ["slug" => $slug])->row_array();
	}

	public function registerGrooming($groomingData)
	{
		$this->db->insert("groomings", $groomingData);
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
}
