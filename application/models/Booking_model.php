<?php
class Booking_model extends CI_Model
{
    public function get_booking_details()
    {
        return $this->db->get('booking')->result_array();
    }

    public function get_booking_details_location()
    {
        $this->db->select('parking_slots.*, booking.location_id');
        $this->db->from('booking');
        $this->db->join('parking_slots', 'parking_slots.id = booking.location_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_booking_details()
    {
        $this->db->select('booking.*, parking_slots.location');
        $this->db->from('booking');
        $this->db->join('user', 'booking.user_id = user.id');
        $this->db->join('parking_slots', 'booking.location_id = parking_slots.id', 'left'); // Join dengan tabel parking_slots
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_complete_booking_details($nopol = null)
    {
        $this->db->select('booking.*, parking_slots.location');
        $this->db->from('booking');
        $this->db->join('parking_slots', 'parking_slots.id = booking.location_id');
        if ($nopol !== null) {
            $this->db->like('booking.nopol', $nopol); // Menambahkan pencarian berdasarkan nopol
        }
        $this->db->order_by('booking.id', 'ASC'); // Mengurutkan berdasarkan ID booking terbaru
        $query = $this->db->get();
        return $query->result_array();
    }



    // Mengambil detail booking berdasarkan ID booking
    public function get_booking_by_id($booking_id)
    {
        $this->db->where('id', $booking_id);
        $query = $this->db->get('booking');
        return $query->row_array(); // Mengembalikan satu baris hasil
    }

    // Memperbarui data booking
    public function update_booking($booking_id, $data)
    {
        $this->db->where('id', $booking_id);
        $this->db->update('booking', $data);
    }

    // Mengambil detail pembayaran berdasarkan ID booking
    public function get_payment_details_by_booking_id($booking_id)
    {
        $this->db->select('payments.*, booking.location_id');
        $this->db->from('payments');
        $this->db->join('booking', 'booking.id = payments.booking_id');
        $this->db->where('payments.booking_id', $booking_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function hapusDataBooking($id)
    {
        $this->db->where('booking_id', $id);
        $this->db->delete('payments');

        $this->db->where('id', $id);
        $this->db->delete('booking'); // Menghapus booking berdasarkan ID
    }
}
