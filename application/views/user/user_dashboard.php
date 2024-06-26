<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <h5 class="h5 mb-2 text-light" style="font-weight: bold;">Dashboard</h5>
        </div>

        <div class="mb-5">

            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h5 class="h5 mt-3 mb-2 text-light" style="font-weight: bold; font-size: 13px;">Information Payment</h5>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earning (All Payment)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_income, 2, ',', '.'); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total (All Payment Not Clear)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_unpaid_cost, 2, ',', '.'); ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Precentage (Booking)
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($percentage_current_month); ?>%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <!-- Edit untuk mengikuti persentase -->
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $percentage_current_month ?>%" aria-valuenow="<?= $percentage_current_month ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Booking Not Clear</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_unpaid_bookings; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-circle-exclamation fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h5 class="h5 mt-3 mb-2 text-light" style="font-weight: bold; font-size: 13px;">Data Booking All Months</h5>
            </div>

            <div class="row">
                <?php if (empty($booking_percentage_per_month)) : ?>
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            All Booking Clear
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($booking_percentage_per_month as $month_data) : ?>
                        <div class="card mb-3" style="width: 18rem; margin: 0 12px">
                            <div class="card-header">
                                Description Booking Data
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <td><?= "Booking Months : " . date('F', mktime(0, 0, 0, $month_data['month'], 10)); // Mengubah angka bulan menjadi nama bulan 
                                        ?></td>
                                </li>
                                <li class="list-group-item">
                                    <td><?= "Total Booking : " . $month_data['total_bookings']; ?></td>
                                </li>
                                <li class="list-group-item">
                                    <?php
                                    $found_unpaid = false;
                                    foreach ($unpaid_bookings_per_month as $booking) :
                                        if ($booking['month'] == $month_data['month']) :
                                            $found_unpaid = true; ?>
                                            <tr>
                                                <td><?= "Not Clear : "  ?></td>
                                                <td><?= '(' . $booking['unpaid_bookings'] . ')'; ?></td>
                                            </tr>
                                    <?php endif;
                                    endforeach;
                                    if (!$found_unpaid) :
                                        echo "<tr><td>All Booking Clear</td></tr>";
                                    endif; ?>
                                </li>

                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="row mt-4">
                <!-- Area Chart -->
                <div class="col-xl-0 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Diagram Bar Total Booking</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="bookingChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End of Content Wrapper -->
        </div>

        <!-- End of Page Wrapper -->
    </div>





    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
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