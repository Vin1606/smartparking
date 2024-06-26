<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">List User</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / List User</span>
        </div>

        <a href="<?= base_url('user/add_member'); ?>" class="btn btn-primary" style="font-size: 12px; margin: 0 0 10px 0;">Add Member</a>
        <div class="mb-5">

            <div class="table-responsive">


                <table class="table table-bordered table-striped text-center" style="border-color: black; background-color : white; color: black;"> <!-- Tambahkan style untuk border-color -->
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th> <!-- Ganti ID dengan No -->
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Management User</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $user) : ?> <!-- Tambahkan variabel $no untuk nomor urut -->
                            <tr>
                                <td style="border-color: black;"><?= $no++; ?></td> <!-- Tambahkan style untuk border-color -->
                                <td style="border-color: black;"><?= $user['name']; ?></td> <!-- Tambahkan style untuk border-color -->
                                <td style="border-color: black;"><?= $user['email']; ?></td> <!-- Tambahkan style untuk border-color -->
                                <td style="border-color: black;"><?= $user['status']; ?></td> <!-- Tambahkan style untuk border-color -->
                                <td style="border-color: black;">
                                    <a href="<?= base_url(); ?>user/edit_user/<?= $user['id']; ?>" class="btn btn-primary" style="font-size: 12px; margin: 0 5px;">Edit Data User</a>
                                    <a href="<?= base_url(); ?>user/delete_member/<?= $user['id']; ?>" class="btn btn-danger" style="font-size: 12px; margin: 0 5px;">Delete Member</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

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