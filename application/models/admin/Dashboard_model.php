<?php
class Dashboard_model extends CI_Model
{

    public function countAllCustomers()
    {
        return $this->db->get("customers")->num_rows();
    }

    public function countAllProducts()
    {
        return $this->db->get("items")->num_rows();
    }

    public function countAllGroomings()
    {
        return $this->db->get("groomings")->num_rows();
    }
}
