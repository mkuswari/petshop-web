<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grooming_model extends CI_Model
{

	public function getAllGroomings()
	{
		$this->db->select('groomings.*, packages.cost, name AS package_name');
		$this->db->from("groomings");
		$this->db->join("packages", "packages.package_id = groomings.package_id");
		return $this->db->get()->result_array();
	}
}
