<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

	public function getAllCategory()
	{
		return $this->db->get("categories")->result_array();
	}

	public function addNewCategory($categoryData)
	{
		$this->db->insert("categories", $categoryData);
	}

	public function deleteCategory($id)
	{
		$this->db->where("category_id", $id);
		$this->db->delete("categories");
	}

	public function updateCategory($userData)
	{
		$this->db->set("name", $userData["name"]);
		$this->db->set("slug", $userData["slug"]);
		$this->db->set("image", $userData["image"]);
		$this->db->where("category_id", $this->input->post("category_id"));
		$this->db->update("categories", $userData);
	}
}
