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

	public function getAllGroomingPackages()
	{
		$this->db->select("package_id, name, cost");
		$this->db->from("packages");
		return $this->db->get()->result_array();
	}

	public function addGroomingData($groomingData)
	{
		$this->db->insert("groomings", $groomingData);
	}

	public function updateGroomingStatus($groomingId, $groomingStatus)
	{
		$this->db->set("grooming_status", $this->input->post("grooming_status"));
		$this->db->where("grooming_id", $groomingId);
		$this->db->update("groomings");
	}

	public function getGroomingById($id)
	{
		$this->db->select("groomings.*, packages.cost, name AS package_name");
		$this->db->from("groomings");
		$this->db->join("packages", "packages.package_id = groomings.package_id");
		$this->db->where("grooming_id", $id);
		return $this->db->get()->row_array();
	}

	public function deleteGrooming($id)
	{
		$this->db->where("grooming_id", $id);
		$this->db->delete("groomings");
	}
}
