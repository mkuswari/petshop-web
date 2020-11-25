<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // cek apakah ada session admin
        if ($this->session->userdata("email")) {
            redirect("dashboard");
        }

        $data["page_title"] = "Login Admin";

        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/auth/login_view", $data);
        } else {
            $this->_loginAction();
        }
    }

    private function _loginAction()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        // cek apakah dengan email yang di input ada
        $adminData = $this->db->get_where("admins", ["email" => $email])->row_array();
        if ($adminData) {
            // cek apakah akun user sudah aktif
            if ($adminData['is_active'] == 1) {
                // cek apakah password yang dimasukkan benar
                if (password_verify($password, $adminData["password"])) {
                    $data = [
                        "admin_id" => $adminData["admin_id"],
                        "name" => $adminData["name"],
                        "avatar" => $adminData["avatar"],
                        "email" => $adminData["email"],
                        "role" => $adminData["role"]
                    ];

                    $this->session->set_userdata($data);
                    redirect("dashboard");
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Password kamu salah</div>');
                    redirect("admin");
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu nonaktif, hubungi admin.</div>');
                redirect("admin");
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">E-mail kamu tidak terdaftar</div>');
            redirect("admin");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("admin_id");
        $this->session->unset_userdata("name");
        $this->session->unset_userdata("avatar");
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Kamu berhasil logout</div>');
        redirect("admin");
    }
}
