<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{

	public function updateProfile($profileData)
	{
		$this->db->set("name", $profileData["name"]);
		$this->db->where("email", $profileData["email"]);
		$this->db->update("users");
	}

	public function updatePassword($passwordHash)
	{
		$this->db->set("password", $passwordHash);
		$this->db->where("email", $this->session->userdata("email"));
		$this->db->update("users");
	}
}
