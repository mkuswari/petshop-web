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
}
