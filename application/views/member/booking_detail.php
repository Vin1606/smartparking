<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">History</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Booking History</span>
        </div>

        <div class="mb-5">
            <div class="heading-card bg-dark" style="padding: 10px 25px; color: white">
                <span>Data Booking</span>
            </div>

            <div class="card" style="padding: 0 8px;">
                <div class="card-body">
                    <div class="card" style="padding: 0 0px;">
                        <div class="card-body">

                            <!-- Menampilkan hasil pencarian -->
                            <?php if (!empty($bookings)) : ?>
                                <table class="table table-bordered" style="text-align: center; font-size: 12px;">
                                    <thead>
                                        <tr>
                                            <th>No</th> <!-- Ubah dari ID Booking menjadi No -->
                                            <th>Nopol</th>
                                            <th>Kind of a Car</th>
                                            <th>Location Parking</th>
                                            <th>Date Booking</th>
                                            <th>Time Booking</th>
                                            <th>Management</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="button mt-2 mb-3">
                                            <a href="<?= base_url('member/booking'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> New Booking </a>
                                        </div>
                                        <?php $no = 1; // Tambahkan variabel counter di sini 
                                        ?>
                                        <?php foreach ($bookings as $index => $booking) : ?>
                                            <tr>
                                                <!-- Kondisi untuk mengubah warna teks berdasarkan status pembayaran -->
                                                <td><?= $no++; ?></td>
                                                <td><?= $booking['nopol']; ?></td>
                                                <td><?= $booking['brand']; ?></td>
                                                <td><?= 'Block ' . $booking['location_id']; ?></td>
                                                <td><?= date('d-m-Y', strtotime($booking['date'])); ?></td>
                                                <td><?= $booking['time']; ?></td>
                                                <td style="text-align: center;"> <!-- Tambahkan style text-align: center; di sini -->
                                                    <?php if ($booking['status_pembayaran'] != 'Lunas') : ?>
                                                        <a href="<?= base_url(); ?>member/edit_booking/<?= $booking['id']; ?>" class="btn btn-primary" style="font-size: 12px; margin: 0 5px;">Edit Booking</a>
                                                        <a href="<?= base_url('member/delete_booking/' . $booking['id']); ?>" class="btn btn-danger" style="font-size: 12px; margin: 0 5px;"><i class="fas fa-ban"></i> Delete </a>
                                                    <?php else : ?>
                                                        <span class="badge badge-success">Lunas</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>Tidak ada data yang ditemukan.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class=" scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to leave this program.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

    <script src="https://kit.fontawesome.com/c2752fde40.js" crossorigin="anonymous"></script>

    <script>
        // Ambil elemen dengan kelas text-message
        const textMessage = document.querySelector('.text-message');

        // Tampilkan pesan flash data
        textMessage.style.display = 'block';

        // Atur waktu tampilan pesan flash data (misalnya 3 detik)
        setTimeout(() => {
            textMessage.style.display = 'none';
        }, 3000); // 3000 milidetik = 3 detik
    </script>