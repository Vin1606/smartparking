<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">Home</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Home</span>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4 my-auto">
                <div class=" card border-left-primary shadow h-100 py-2 bg-light">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-size: 13px; color: black;">
                                    Profile (Update Your Profile)</div>
                                <a href="<?= base_url('user/profile'); ?>" class="text-primary" style="font-size: 12px; font-weight: bold;">Click Here</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-fw fa-user fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4 my-auto">
                <div class=" card border-left-success shadow h-100 py-2 bg-light">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-size: 13px; color: black;">
                                    Booking Parking (Booking Now)</div>
                                <a href="<?= base_url('user/booking'); ?>" class="text-success" style="font-size: 12px; font-weight: bold;">Click Here</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-fw fa-calendar fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4 my-auto">
                <div class="card border-left-info shadow h-100 py-2 bg-light">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="font-size: 13px; color: black;">
                                    Check Status Booking</div>
                                <a href="<?= base_url('user/booking_detail'); ?>" class="text-info" style="font-size: 12px; font-weight: bold; color:red;">Click Here</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-fw fa-check fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Content Row -->


            <!-- Earnings (Monthly) Card Example -->

        </div>

        <div class="heading-home">
            <div class="home-parkir">
                <div class="img-parkir">
                    <img src="<?= base_url('assets/css/img/about-image.jpg') ?>" alt="">
                </div>
                <div class="text-information">
                    <div class="text-benefit mb-4" style="font-size: 20px; font-weight: bold;">
                        <span>Smart Parking Digital (Markigital)</span>
                    </div>

                    <div class="text-benefit-info">
                        <span>Dalam dunia urbanisasi yang berkembang pesat, tantangan parkir menjadi semakin kompleks. Kemacetan lalu lintas, pencarian parkir yang memakan waktu, dan polusi udara menjadi masalah yang perlu diatasi. Namun, dengan kemajuan teknologi, konsep Smart Parking muncul sebagai solusi yang menjanjikan untuk mengatasi masalah-masalah tersebut.</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-benefit" style="background-color: white;">
            <div class="benefit-text">
                <span>Mengapa Booking Ditempat Kami</span>
            </div>

            <div class="benefit">
                <div class="harga-terjangkau-box">
                    <i class="fa-fw fa-solid fa-money-bill"></i>
                    <div class="text-box">
                        <span>Harga Terjangkau</span>
                    </div>
                </div>
                <div class="waktu-box">
                    <i class="fa-fw fa-solid fa-clock"></i>
                    <div class="text-box">
                        <span>Keamanan 24 Jam</span>
                    </div>
                </div>
                <div class="rain-box">
                    <i class="fa-fw fa-solid fa-droplet"></i>
                    <div class="text-box">
                        <span>Tidak Kehujanan</span>
                    </div>
                </div>
                <div class="lokasi-box">
                    <i class="fa-fw fa-solid fa-map"></i>
                    <div class="text-box">
                        <span>Lokasi Strategis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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