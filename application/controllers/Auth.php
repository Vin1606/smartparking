<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // RULES UNTUK FORM LOGIN ATAU PESAN KESALAHAN
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Please input this form',
            'valid_email' => 'Please input the email form correctly'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Please input this form',
            'min_length' => 'Password too short'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Markigital I Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function register()
    {
        // RULES UNTUK FORM REGISTER
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already been registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Markigital I Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1, // Default role_id untuk admin
                'is_active' => 1, // Set akun aktif secara default
                'date_created' => time()
            ];

            // Log untuk memastikan role_id disimpan dengan benar
            log_message('debug', 'Register Role ID: ' . $data['role_id']);

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created. Please login!</div>');
            redirect('auth');
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // JIKA USERNYA ADA DI DATABASE
            if ($user['is_active'] == 1) {
                // Check Password
                if (password_verify($password, $user['password'])) {
                    // Hapus data sesi sebelumnya
                    $this->session->unset_userdata('id');
                    $this->session->unset_userdata('name');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('role_id');

                    $data = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];

                    $this->session->set_userdata($data);

                    // Regenerasi session ID
                    $this->session->sess_regenerate(TRUE);

                    // Set session name based on role_id
                    if ($user['role_id'] == 1) {
                        $this->session->sess_name = 'admin_session';
                        redirect('user/dashboard'); // Pastikan URL ini benar untuk admin
                    } else if ($user['role_id'] == 2) {
                        $this->session->sess_name = 'member_session';
                        redirect('member/index'); // Pastikan URL ini benar untuk member
                    }
                } else {
                    $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Your Account Is Not Active</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">Your Account Is Not Registered</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="text-align: center;">Your Account Has Been Logged Out</div>');
        redirect('auth');
    }
}
