<?php
class Category_model extends CI_Model
{

	public function getAllCategories()
	{
		return $this->db->get("categories")->result_array();
	}

	public function getCategoryById($id)
	{
		return $this->db->get_where("categories", ["category_id" => $id])->row_array();
	}
}
