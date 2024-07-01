<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">Edit Booking</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Edit Booking Parking</span>
        </div>

        <div class="mb-5">
            <div class="heading-card bg-dark" style="padding: 10px 25px; color: white">
                <span>Edit Booking Parking</span>
            </div>
            <div class="card" style="margin: 0 0px;">
                <div class="card-body">
                    <?= form_open('user/edit_booking/' . $booking['id']); ?>
                    <div class="form mb-4">
                        <div class="nopol mb-2" style="font-size: 13px;">Enter Your Policy Number</div>
                        <input type="text" class="form-control form-control-user" id="nopol" name="nopol" placeholder="Policy Number" value="<?= $booking['nopol']; ?>">
                        <?= form_error('nopol', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <div class=" form mb-4">
                        <div class="nopol mb-2" style="font-size: 13px;">Kind of a Car</div>
                        <input type="text" class="form-control form-control-user" id="brand" name="brand" placeholder="Kind Of A Car" value="<?= $booking['brand']; ?>">
                        <?= form_error('brand', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <div class=" form mb-4">
                        <div class="date mb-2" style="font-size: 13px;">Select Your Date Booking</div>
                        <input type="date" class="form-control form-control-user" id="date" name="date" value="<?= $booking['date']; ?>">
                        <?= form_error('date', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <div class="form mb-4">
                        <div class="time mb-2" style="font-size: 13px;">Select Your Time Booking</div>
                        <input type="time" class="form-control form-control-user" id="time" name="time" value="<?= $booking['time']; ?>">
                        <?= form_error('time', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <div class="form mb-4">
                        <div class="time mb-2" style="font-size: 13px;">Select Your End Time Booking</div>
                        <input type="time" class="form-control form-control-user" id="end_time" name="end_time" value="<?= $booking['end_time']; ?>">
                        <?= form_error('end_time', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <div class="form mb-4">
                        <label for="tempat" class="mb-2" style="font-size: 13px;">Pilih Slot Parkir:</label>
                        <select class="form-control" style="font-size: 13px;" id="location_id" name="location_id">
                            <option value="">-- Pilih Tempat Parkir --</option> <!-- Tambahkan baris ini -->
                            <?php if (!empty($tempat)) : ?>
                                <?php foreach ($tempat as $t) : ?>
                                    <option value="<?= $t['id'] ?>" <?= $t['id'] == $booking['location_id'] ? 'selected' : '' ?>>
                                        <?= $t['location'] ?> ( Jumlah Slot Parkir Tersedia : <?= $t['stok'] ?> )
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option>Tidak ada data tempat parkir</option>
                            <?php endif; ?>
                        </select>
                    </div>


                    <div class="form mb-4">
                        <div class="date mb-2" style="font-size: 13px;">Description</div>
                        <textarea class="form-control" id="description" name="description" rows="4" style="font-size: 12px; border-radius: 10px;"><?= $booking['description']; ?></textarea>
                        <?= form_error('description', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block text-uppercase">
                        Save
                    </button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>