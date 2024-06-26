<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Markigital | Home';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('user/user_header', $data);
        $this->load->view('user/user_sidebar', $data);
        $this->load->view('user/user_topbar', $data);
        $this->load->view('user/user_index', $data);
        $this->load->view('user/user_footer');
    }

    public function profile()
    {
        $data['title'] = 'Markigital | Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Konfigurasi pengunggahan gambar
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB
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
            $this->load->view('user/user_sidebar', $data);
            $this->load->view('user/user_topbar', $data);
            $this->load->view('user/user_profile', $data);
            $this->load->view('user/user_footer');
        } else {
            $image = 'default.jpg'; // Default image jika pengunggahan gagal
            if ($this->upload->do_upload('image')) { // Perbaikan nama field
                $image_data = $this->upload->data();
                $image = $image_data['file_name'];
            }

            $update_data = [ // Menggunakan variabel baru untuk menghindari overwrite
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => $image,
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'phone' => $this->input->post('phone', true),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('user', $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data Account Has Been Changed</div>');
            redirect('user/profile');
        }
    }

    public function dashboard()
    {
        $this->load->model('Booking_model');

        $data['title'] = 'Markigital | Dashboard';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Mulai transaksi
        $this->db->trans_start();

        // Menghitung total pendapatan dari semua pembayaran
        $this->db->select_sum('amount_paid');
        $this->db->from('payments');
        $total_query = $this->db->get();
        $total_result = $total_query->row();
        $total_payments = $total_result->amount_paid;

        // Menghitung total pendapatan dari pembayaran yang lunas
        $this->db->select_sum('amount_paid');
        $this->db->from('payments');
        $this->db->where('payment_status', 'Lunas');
        $query = $this->db->get();
        $result = $query->row();
        $data['total_income'] = $result->amount_paid;

        // Menghitung jumlah untuk pembayaran yang belum lunas
        $this->db->select_sum('amount_paid');
        $this->db->from('payments');
        $this->db->where('payment_status', 'Belum Lunas');
        $query_unpaid = $this->db->get();
        $result_unpaid = $query_unpaid->row();
        $data['total_unpaid'] = $result_unpaid->amount_paid;

        // Menghitung pendapatan lunas per bulan
        $this->db->select('SUM(amount_paid) as monthly_income, MONTH(payment_date) as month');
        $this->db->from('payments');
        $this->db->where('payment_status', 'Lunas');
        $this->db->group_by('MONTH(payment_date)');
        $this->db->order_by('MONTH(payment_date)', 'ASC');
        $monthly_income_result = $this->db->get()->result_array();
        $data['monthly_income'] = $monthly_income_result;

        // Menghitung persentase pembayaran yang belum lunas
        $data['percentage_unpaid'] = ($total_payments > 0) ? ($data['total_unpaid'] / $total_payments * 100) : 0;

        // Menghitung jumlah booking yang belum lunas
        $this->db->from('payments');
        $this->db->where('payment_status', 'Belum Lunas');
        $data['count_unpaid_bookings'] = $this->db->count_all_results();

        // Menghitung jumlah booking yang belum lunas per bulan dengan join tabel payments
        $this->db->select('COUNT(booking.id) as unpaid_bookings, MONTH(booking.date) as month');
        $this->db->from('booking');
        $this->db->join('payments', 'booking.id = payments.booking_id');
        $this->db->where('payments.payment_status', 'Belum Lunas');
        $this->db->group_by('MONTH(booking.date)');
        $this->db->order_by('MONTH(booking.date)', 'ASC');
        $unpaid_bookings_per_month = $this->db->get()->result_array();
        $data['unpaid_bookings_per_month'] = $unpaid_bookings_per_month;

        // Menghitung jumlah booking per bulan
        $year_desired = date('Y'); // Tahun yang diinginkan, bisa diambil dari input user atau tetapkan secara statis
        $this->db->select('COUNT(id) as total_bookings, MONTH(date) as month');
        $this->db->from('booking');
        $this->db->where('YEAR(date)', $year_desired); // Filter berdasarkan tahun
        $this->db->group_by('MONTH(date)');
        $this->db->order_by('MONTH(date)', 'ASC');
        $booking_counts = $this->db->get()->result_array();
        $data['booking_counts'] = $booking_counts;

        // Menghitung total booking untuk tahun saat ini
        $current_year = date('Y');
        $this->db->select('COUNT(id) as total_bookings');
        $this->db->from('booking');
        $this->db->where('YEAR(date)', $current_year);
        $total_bookings_query = $this->db->get();
        $total_bookings_result = $total_bookings_query->row();
        $total_bookings = $total_bookings_result->total_bookings;  // Pastikan variabel ini didefinisikan

        // Menghitung jumlah booking untuk bulan saat ini
        $current_month = date('m');
        $current_year = date('Y');
        $this->db->select('COUNT(id) as total_bookings_current_month');
        $this->db->from('booking');
        $this->db->where('MONTH(date)', $current_month);
        $this->db->where('YEAR(date)', $current_year);
        $current_month_query = $this->db->get();
        $current_month_result = $current_month_query->row();
        $total_bookings_current_month = $current_month_result->total_bookings_current_month;

        // Menghitung persentase booking bulan saat ini
        $percentage_current_month = ($total_bookings > 0) ? ($total_bookings_current_month / 20 * 100) : 0;
        $data['percentage_current_month'] = $percentage_current_month;


        // Menghitung total biaya pembayaran yang belum lunas
        $this->db->select('booking.id, booking.time, booking.end_time');
        $this->db->from('booking');
        $this->db->join('payments', 'booking.id = payments.booking_id');
        $this->db->where('payments.payment_status', 'Belum Lunas');
        $unpaid_bookings = $this->db->get()->result_array();

        // Menghitung total booking untuk menghitung persentase
        $total_bookings = array_sum(array_column($booking_counts, 'total_bookings'));

        // Menghitung persentase booking per bulan
        $data['booking_percentage_per_month'] = array_map(function ($item) use ($total_bookings) {
            $item['percentage'] = ($total_bookings > 0) ? ($item['total_bookings'] / $total_bookings * 100) : 0;
            return $item;
        }, $booking_counts);


        $total_unpaid_cost = 0;
        $tarif_per_jam = 5000; // Tarif per jam parkir
        foreach ($unpaid_bookings as $booking) {
            $start_time = strtotime($booking['time']);
            $end_time = strtotime($booking['end_time']);
            if ($end_time <= $start_time) {
                $end_time += 24 * 3600; // Tambahkan 24 jam jika waktu berakhir lebih kecil
            }
            $durasi = ($end_time - $start_time) / 3600; // Durasi dalam jam
            $total_unpaid_cost += $durasi * $tarif_per_jam; // Menghitung total biaya
        }

        $data['total_unpaid_cost'] = $total_unpaid_cost;

        // Menyelesaikan transaksi
        $this->db->trans_complete();

        // Memuat views
        $this->load->view('user/user_header', $data);
        $this->load->view('user/user_sidebar', $data);
        $this->load->view('user/user_topbar', $data);
        $this->load->view('user/user_dashboard', $data);
        $this->load->view('user/user_footer', $data);
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
            $this->load->view('user/user_sidebar', $data);
            $this->load->view('user/user_topbar', $data);
            $this->load->view('user/user_booking', $data);
            $this->load->view('user/user_footer');
        } else {
            $tempat_id = $this->input->post('location_id');
            $tempat = $this->db->get_where('parking_slots', ['id' => $tempat_id])->row();

            if ($tempat && $tempat->stok > 0) {
                $this->db->set('stok', 'stok-1', FALSE);
                $this->db->where('id', $tempat_id);
                $this->db->update('parking_slots');

                $data = [
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
                redirect('user/booking_detail');
            } else {
                $this->session->set_flashdata('error', 'Tidak ada stok parkir yang tersedia.');
                redirect('user/booking');
            }
        }
    }


    public function booking_detail()
    {
        $this->load->model('Booking_model');

        $data['title'] = 'Markigital | Booking History';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Mendapatkan input nopol dari query string
        $nopol = $this->input->get('nopol');

        // Memanggil model dengan parameter nopol jika ada
        $data['complete_booking'] = $this->Booking_model->get_complete_booking_details($nopol);

        // Cek status pembayaran untuk label
        if (!empty($data['complete_booking'])) {
            foreach ($data['complete_booking'] as &$booking) {
                $payment_details = $this->db->get_where('payments', ['booking_id' => $booking['id']])->row_array();
                $booking['payment_status'] = $payment_details ? $payment_details['payment_status'] : 'Belum Lunas';
            }
        }

        $this->load->view('user/user_header', $data);
        $this->load->view('user/user_sidebar', $data);
        $this->load->view('user/user_topbar', $data);
        $this->load->view('user/booking_detail', $data);
    }

    public function booking_delete($id)
    {
        $this->load->model('Booking_model');
        $data['title'] = 'Markigital | Booking Parking';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        // Ambil detail booking untuk mendapatkan location_id
        $booking = $this->Booking_model->get_booking_by_id($id);
        $location_id = $booking['location_id'];

        // Ambil status pembayaran dari tabel payments
        $payment_details = $this->db->get_where('payments', ['booking_id' => $id])->row_array();
        $payment_status = $payment_details ? $payment_details['payment_status'] : null;

        // Hanya tambahkan kembali stok parkir jika pembayaran belum lunas
        if ($payment_status != 'Lunas') {
            $this->db->set('stok', 'stok+1', FALSE);
            $this->db->where('id', $location_id);
            $this->db->update('parking_slots');
        }

        // Hapus data booking
        $this->Booking_model->hapusDataBooking($id);

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/booking_detail');
    }


    public function booking_payment($id)
    {
        $this->load->model('Booking_model');

        $data['title'] = 'Markigital | Edit Booking';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['booking'] = $this->Booking_model->get_booking_by_id($id);
        $data['booking_id'] = $id;

        $tarif_per_jam = 5000;
        $start_time = strtotime($data['booking']['time']);
        $end_time = strtotime($data['booking']['end_time']);

        if ($end_time <= $start_time) {
            $end_time += 24 * 3600; // Tambahkan 24 jam
        }

        $durasi = ($end_time - $start_time) / 3600;
        $total_biaya = $durasi * $tarif_per_jam;
        $data['total_biaya'] = $total_biaya;

        $pembayaran = $this->input->post('pembayaran');
        $existing_payment = $this->Booking_model->get_payment_details_by_booking_id($id);
        $amount_paid = $existing_payment ? $existing_payment['amount_paid'] : 0;
        $sisa_pembayaran = $total_biaya - $amount_paid;
        $data['sisa_pembayaran'] = $sisa_pembayaran;

        $payment_status = ($pembayaran >= $sisa_pembayaran) ? 'Lunas' : 'Belum Lunas';
        $data['status_pembayaran'] = $payment_status;

        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;
        $data['payment_details'] = $existing_payment;

        if (!$existing_payment) {
            $payment_data = [
                'booking_id' => $id,
                'amount_paid' => 0,
                'payment_status' => $payment_status,
                'payment_date' => time()
            ];
            $this->db->insert('payments', $payment_data);
        }

        $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/user_header', $data);
            $this->load->view('user/user_sidebar', $data);
            $this->load->view('user/user_topbar', $data);
            $this->load->view('user/booking_payment', $data);
            $this->load->view('user/user_footer');
        } else {
            if ($existing_payment) {
                $new_amount_paid = $amount_paid + $pembayaran;
                $payment_status = ($new_amount_paid >= $total_biaya) ? 'Lunas' : 'Belum Lunas';
                $payment_data = ['amount_paid' => $new_amount_paid, 'payment_status' => $payment_status];
                $this->db->where('booking_id', $id);
                $this->db->update('payments', $payment_data);

                // Cek jika status pembayaran adalah Lunas dan tambahkan stok parkir kembali
                if ($payment_status == 'Lunas') {
                    $this->db->set('stok', 'stok+1', FALSE);
                    $this->db->where('id', $data['booking']['location_id']);
                    $this->db->update('parking_slots');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Lunas dan Stok Parkir Ditambahkan Kembali</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Diperbarui</div>');
                }

                redirect('user/booking_detail');
            }
        }
    }
}
