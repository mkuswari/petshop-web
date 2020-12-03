<?php

class Grooming_model extends CI_Model
{
    public function getAllPackages()
    {
        return $this->db->get("packages")->result_array();
    }
}
