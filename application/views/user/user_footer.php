            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #646FD4;">
                <div class=" container my-auto">
                    <div class="copyright text-center my-auto text-light">
                        <span>Copyright &copy; Smartparking <?= date('Y', ($user['date_created'])); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            <script>
                function showMap() {
                    document.getElementById('map').style.display = 'block';
                    document.getElementById('map-icon').style.display = 'none';
                    document.getElementById('location-text').innerText = 'This is our location';
                    document.getElementById('location-text').style.fontWeight = 'bold';
                }

                function hideMap() {
                    document.getElementById('map').style.display = 'none';
                    document.getElementById('map-icon').style.display = 'block';
                    document.getElementById('location-text').innerText = 'Click Here, To look our location';
                    document.getElementById('location-text').style.fontWeight = '200';
                }
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('bookingChart');
                    var bookingChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php foreach ($booking_counts as $month) {
                                            echo '"' . date('F', mktime(0, 0, 0, $month['month'], 10)) . '",';
                                        } ?>],
                            datasets: [{
                                label: 'Total Booking',
                                data: [<?php foreach ($booking_counts as $booking) {
                                            echo  $booking['total_bookings'] . ',';
                                        } ?>],
                                backgroundColor: 'rgba(54, 162, 235, 1)', // Ubah menjadi biru solid
                                borderColor: 'rgba(54, 162, 235, 1)', // Pastikan borderColor juga biru solid
                                borderWidth: 1,
                                // Set bar thickness
                                barThickness: 20, // Lebar bar dalam piksel
                                // Atau gunakan categoryPercentage dan barPercentage
                                categoryPercentage: 0.8,
                                barPercentage: 0.5
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 7
                                    }
                                },
                                y: {
                                    ticks: {
                                        maxTicksLimit: 5,
                                        padding: 10
                                    },
                                    grid: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    enabled: true,
                                    mode: 'index',
                                    intersect: false,
                                    callbacks: {
                                        label: function(tooltipItem, data) {
                                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            label += tooltipItem.yLabel;
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
            </body>

            </html>