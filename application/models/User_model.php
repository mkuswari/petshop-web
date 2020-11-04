<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function getAllUser()
	{
		$this->db->select('*');
		$this->db->from("users");
		$this->db->join("roles", "roles.role_id = users.role_id");
		return $this->db->get()->result_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where("users", ["user_id" => $id])->row_array();
	}

	public function getAllRoles()
	{
		return $this->db->get("roles")->result_array();
	}

	public function addNewUser($userData)
	{
		$this->db->insert("users", $userData);
	}

	public function updateUser($userData)
	{
		$this->db->set("name", $userData["name"]);
		$this->db->set("email", $userData["email"]);
		$this->db->set("avatar", $userData["avatar"]);
		$this->db->set("role_id", $userData["role_id"]);
		$this->db->set("is_active", $userData["is_active"]);
		$this->db->where("user_id", $this->input->post("user_id"));
		$this->db->update("users", $userData);
	}

	public function deleteUser($id)
	{
		$this->db->where("user_id", $id);
		$this->db->delete("users");
	}
}
