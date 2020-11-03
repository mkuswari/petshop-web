<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function getAllUser()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->join("roles", "roles.id = users.role_id");
		return $this->db->get()->result_array();
	}

	public function getAllRoles()
	{
		return $this->db->get("roles")->result_array();
	}

	public function addNewUser($userData)
	{
		$this->db->insert("users", $userData);
	}

	public function deleteUser($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("users");
	}
}
