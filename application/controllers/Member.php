<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Pastikan session yang digunakan adalah member_session
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Markigital | Home';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();


        $this->load->view('user/user_header', $data);
        $this->load->view('member/member_sidebar', $data);
        $this->load->view('member/member_topbar_role', $data);
        $this->load->view('member/member_index', $data);
        $this->load->view('user/user_footer');
    }
    public function profile()
    {
        $data['title'] = 'Markigital | Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Konfigurasi pengunggahan gambar
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 6000;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        // RULES UNTUK FORM
        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
            'valid_email' => 'Please input the email form correctly',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]', [
            'min_length' => 'Password too short',
        ]);
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim', [
            'required' => 'Please input this form',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/user_header', $data);
            $this->load->view('member/member_sidebar', $data);
            $this->load->view('member/member_topbar_role', $data);
            $this->load->view('member/profile', $data);
            $this->load->view('user/user_footer');
        } else {
            $image = $data['user']['image']; // Gunakan gambar yang ada di database
            if ($this->upload->do_upload('image')) {
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }

            $update_data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => $image,
                'phone' => $this->input->post('phone', true),
                'is_active' => 1,
                'date_created' => time()
            ];

            // Hanya mengupdate password jika diisi
            if (!empty($this->input->post('password', true))) {
                $update_data['password'] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            }

            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('user', $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data Account Has Been Changed</div>');
            redirect('member/profile');
        }
    }

    public function booking()
    {
        $data['title'] = 'Markigital | Booking Parking';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['tempat'] = $this->db->get('parking_slots')->result_array(); // Ambil data tempat parkir

        // Tambahkan validasi untuk memastikan tanggal pemesanan adalah di bulan ini dan tidak di masa lalu atau bulan berikutnya
        $thisMonth = date('Y-m');
        $this->form_validation->set_rules('date', 'Date', "required|trim|regex_match[/^$thisMonth/]", [
            'regex_match' => 'Anda hanya dapat melakukan pemesanan untuk bulan ini.'
        ]);

        $this->form_validation->set_rules('nopol', 'Number Policy', 'required|trim|is_unique[booking.nopol]', [
            'is_unique' => 'Number Policy Has Been Already'
        ]);
        $this->form_validation->set_rules('brand', 'Kind Of A Car', 'required|trim');
        $this->form_validation->set_rules('time', 'Time', 'required|trim|is_unique[booking.date]', [
            'is_unique' => 'Cari jam Lain'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/user_header', $data);
            $this->load->view('member/member_sidebar', $data);
            $this->load->view('member/member_topbar_role', $data);
            $this->load->view('member/member_booking', $data);
            $this->load->view('user/user_footer');
        } else {
            $tempat_id = $this->input->post('location_id');
            $tempat = $this->db->get_where('parking_slots', ['id' => $tempat_id])->row();

            if ($tempat && $tempat->stok > 0) {
                $this->db->set('stok', 'stok-1', FALSE);
                $this->db->where('id', $tempat_id);
                $this->db->update('parking_slots');

                $data = [
                    'user_id' => $this->session->userdata('id'), // Tambahkan user_id
                    'nopol' => $this->input->post('nopol', true),
                    'brand' => $this->input->post('brand', true),
                    'date' => $this->input->post('date', true),
                    'time' => $this->input->post('time', true),
                    'end_time' => $this->input->post('end_time', true),
                    'location_id' => $tempat_id,
                    'description' => $this->input->post('description', true),
                    'price' => 5000
                ];
                $this->db->insert('booking', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Success Booking</div>');
                redirect('member/booking_detail');
            } else {
                $this->session->set_flashdata('error', 'Tidak ada stok parkir yang tersedia.');
                redirect('member/booking');
            }
        }
    }

    public function booking_detail()
    {
        $data['title'] = 'Markigital | Booking Detail';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Ambil data booking hanya untuk user yang sedang login
        $this->db->select('booking.*, payments.payment_status as status_pembayaran');
        $this->db->from('booking');
        $this->db->join('payments', 'booking.id = payments.booking_id', 'left');
        $this->db->where('booking.user_id', $this->session->userdata('id'));
        $data['bookings'] = $this->db->get()->result_array();

        $this->load->view('user/user_header', $data);
        $this->load->view('member/member_sidebar', $data);
        $this->load->view('member/member_topbar_role', $data);
        $this->load->view('member/booking_detail', $data);
    }

    public function edit_booking($id)
    {
        $data['title'] = 'Markigital | Edit Booking';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['booking'] = $this->db->get_where('booking', ['id' => $id, 'user_id' => $this->session->userdata('id')])->row_array();
        $data['tempat'] = $this->db->get('parking_slots')->result_array(); // Ambil data tempat parkir

        $this->form_validation->set_rules('nopol', 'Number Policy', 'required|trim');
        $this->form_validation->set_rules('brand', 'Kind Of A Car', 'required|trim');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');
        $this->form_validation->set_rules('time', 'Time', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/user_header', $data);
            $this->load->view('member/member_sidebar', $data);
            $this->load->view('member/member_topbar_role', $data);
            $this->load->view('member/edit_booking', $data);
            $this->load->view('user/user_footer');
        } else {
            $old_location_id = $data['booking']['location_id'];
            $new_location_id = $this->input->post('location_id', true);

            $update_data = [
                'nopol' => $this->input->post('nopol', true),
                'brand' => $this->input->post('brand', true),
                'date' => $this->input->post('date', true),
                'time' => $this->input->post('time', true),
                'end_time' => $this->input->post('end_time', true),
                'description' => $this->input->post('description', true),
                'location_id' => $new_location_id
            ];

            // Update stok tempat parkir jika lokasi berubah
            if ($old_location_id != $new_location_id) {
                // Tambahkan stok tempat parkir lama
                $this->db->set('stok', 'stok+1', FALSE);
                $this->db->where('id', $old_location_id);
                $this->db->update('parking_slots');

                // Kurangi stok tempat parkir baru
                $this->db->set('stok', 'stok-1', FALSE);
                $this->db->where('id', $new_location_id);
                $this->db->update('parking_slots');
            }

            $this->db->where('id', $id);
            $this->db->update('booking', $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Booking has been updated</div>');
            redirect('member/booking_detail');
        }
    }

    public function delete_booking($id)
    {
        $booking = $this->db->get_where('booking', ['id' => $id, 'user_id' => $this->session->userdata('id')])->row_array();
        if ($booking) {
            // Kembalikan stok tempat parkir
            $this->db->set('stok', 'stok+1', FALSE);
            $this->db->where('id', $booking['location_id']);
            $this->db->update('parking_slots');

            // Hapus booking
            $this->db->where('id', $id);
            $this->db->delete('booking');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Booking has been deleted</div>');
        } else {
            $this->session->set_flashdata('error', 'Booking not found or you do not have permission to delete it.');
        }
        redirect('member/booking_detail');
    }

    public function about()
    {
        $data['title'] = 'Markigital | About Us';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();


        $this->load->view('user/user_header', $data);
        $this->load->view('member/member_sidebar', $data);
        $this->load->view('member/member_topbar_role', $data);
        $this->load->view('member/about', $data);
        $this->load->view('user/user_footer');
    }
}
