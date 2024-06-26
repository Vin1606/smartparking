<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Markigital I Dashboard';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }
}
