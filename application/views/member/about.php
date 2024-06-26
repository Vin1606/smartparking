<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">About</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / About Us</span>
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
            <div class="benefit-text text-light">
                <span>Why Booking Here</span>
            </div>

            <div class="benefit">
                <div class="harga-terjangkau-box">
                    <i class="fa-fw fa-solid fa-money-bill"></i>
                    <div class="text-box">
                        <span></span>
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

        <div class="box-benefit" style="background-color: white;">
            <div class="benefit-text bg-primary text-light">
                <span>Contact Us</span>
            </div>

            <div class="benefit">
                <div class="harga-terjangkau-box">
                    <i class="fa-fw fa-solid fa-envelope"></i>
                    <div class="text-box">
                        <span>markigital@gmail.com</span>
                    </div>
                </div>
                <div class="waktu-box">
                    <i class="fa-fw fa-solid fa-phone"></i>
                    <div class="text-box">
                        <span>(+62) 81311277841</span>
                    </div>
                </div>
                <div class="lokasi-box" onmouseover="showMap()" onmouseout="hideMap()">
                    <i id="map-icon" class="fa-fw fa-solid fa-map"></i>
                    <div class="text-box">
                        <span id="location-text">Click Here, To look our location</span>
                    </div>
                    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.774398955107!2d106.94561277679519!3d-6.160961760386106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698af06abad6c9%3A0x4b12d3819fee4d84!2sJl.%20Cakung%20Industri%20Selatan%201%20No.12%2C%20RT.6%2FRW.4%2C%20Rorotan%2C%20Kec.%20Cilincing%2C%20Jkt%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2014140!5e0!3m2!1sid!2sid!4v1719317177356!5m2!1sid!2sid" width="200" height="200" style="border:0; display:none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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