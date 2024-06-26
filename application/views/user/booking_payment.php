<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">Booking</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Edit Booking</span>
        </div>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php } ?>

        <div class="mb-5">
            <div class="heading-card bg-dark" style="padding: 10px 25px; color: white">
                <span>Data Booking</span>
            </div>

            <div class="card" style="padding: 0 8px;">
                <div class="card-body">

                    <form action="<?= base_url('user/booking_payment/' . $booking_id) ?>" method="post">
                        <div class="form-group row mb-3">
                            <label for="nopol" class="col-sm-3 col-form-label">Policy Number</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= $booking['nopol']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="brand" class="col-sm-3 col-form-label">Kind Of A Car</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= $booking['brand']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">Date Booking</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($booking['date'])); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">Start Time Booking</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= $booking['time']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">End Time Booking</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= $booking['end_time']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="lokasi" class="col-sm-3 col-form-label">Parking Location</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= "Location Block " . $booking['location_id']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Harga" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?= $booking['price'] . " / Hours"; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Harga" class="col-sm-3 col-form-label">Duration Parking</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="duration" id="duration" value="<?= round(($end_time - $start_time) / 3600, 2) . " Hours" ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Harga" class="col-sm-3 col-form-label">Grand Total</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="hours" id="hours" value="<?= number_format($total_biaya, 0, ',', '.') ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Harga" class="col-sm-3 col-form-label">Remaining Payment</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="hours" id="hours" value="<?= number_format($sisa_pembayaran, 0, ',', '.') ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="bayar" class="col-sm-3 col-form-label">Input Payment</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="pembayaran" id="pembayaran">
                                <?= form_error('pembayaran', ' <small class="text-danger  mb-2">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="button mb-4">
                            <?php if ($status_pembayaran != 'Lunas') : ?>
                                <button type="submit" class="btn btn-primary">Finish Pembayaran</button>
                            <?php endif; ?>
                            <a href="<?= base_url('user/booking_detail'); ?>" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Cancel </a>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0 mb-4">
                    </form>

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