<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">Booking</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Booking Parking</span>
        </div>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php } ?>

        <div class="mb-5">
            <div class="heading-card bg-dark" style="padding: 10px 25px; color: white">
                <span>Booking Parking</span>
            </div>

            <div class="card" style="margin: 0 0px;">
                <div class="card-body">
                    <form action="<?= base_url('member/booking'); ?>" class="user" method="post" enctype="multipart/form-data">
                        <div class="form mb-4">
                            <div class="nopol pl-2 mb-2" style="font-size: 13px;">Enter Your Policy Number</div>
                            <input type="text" class="form-control form-control-user" id="nopol" name="nopol" placeholder="Policy Number" value="<?= set_value('nopol'); ?>">
                            <?= form_error('nopol', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>

                        <div class=" form mb-4">
                            <div class="nopol pl-2 mb-2" style="font-size: 13px;">Kind of a Car</div>
                            <input type="text" class="form-control form-control-user" id="brand" name="brand" placeholder="Kind Of A Car" value="<?= set_value('brand'); ?>">
                            <?= form_error('brand', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>

                        <div class=" form mb-4">
                            <div class="date pl-2 mb-2" style="font-size: 13px;">Select Your Date Booking</div>
                            <input type="date" class="form-control form-control-user" id="date" name="date" value="<?= set_value('date'); ?>">
                            <?= form_error('date', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>

                        <div class="form mb-4">
                            <div class="time pl-2 mb-2" style="font-size: 13px;">Select Your Time Booking</div>
                            <input type="time" class="form-control form-control-user" id="time" name="time" value="<?= set_value('time'); ?>">
                            <?= form_error('time', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>

                        <div class="form mb-4">
                            <div class="time pl-2 mb-2" style="font-size: 13px;">Select Your End Time Booking</div>
                            <input type="time" class="form-control form-control-user" id="end_time" name="end_time" value="<?= set_value('end_time'); ?>">
                            <?= form_error('end_time', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>

                        <div class="form mb-4">
                            <label for="tempat" class="pl-2 mb-2" style="font-size: 13px;">Pilih Slot Parkir:</label>
                            <select class="form-control" style="border-radius: 20px; font-size: 13px; height: 47px;" id="location_id" name="location_id">
                                <option value="">-- Pilih Tempat Parkir --</option> <!-- Tambahkan baris ini -->
                                <?php if (!empty($tempat)) : ?>
                                    <?php foreach ($tempat as $t) : ?>
                                        <option value="<?= $t['id'] ?>"><?= $t['location'] ?> ( Jumlah Slot Parkir Tersedia : <?= $t['stok'] ?> )</option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option>Tidak ada data tempat parkir</option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form mb-4 pl-2">
                            <div class="date mb-2" style="font-size: 13px;">Description</div>
                            <textarea class="form-control" id="description" name="description" rows="4" style="font-size: 12px; border-radius: 10px;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block text-uppercase">
                            Booking
                        </button>
                    </form>
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