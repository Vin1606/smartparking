<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0" style="font-weight: bold; color: white;">Profile</h4>
            <span class="mb-0" style="font-size: 12px; font-weight: 400; color: white;">Markigital / Profile</span>
        </div>

        <div class="mb-5">
            <div class="heading-card bg-dark" style="padding: 10px 25px; color: white">
                <span>Update Your Profile</span>
            </div>
            <div class="card" style="margin: 0 0px;">
                <div class="card-body">
                    <form class="user" method="post" action="<?= base_url('user/profile'); ?>" enctype="multipart/form-data">
                        <div class="form mb-4">
                            <div class="name pl-2 mb-2" style="font-size: 13px;">Update Your Name (Optional)</div>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= $user['name']; ?>">
                            <?= form_error('name', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>
                        <div class="form mb-4">
                            <div class="email pl-2 mb-2" style="font-size: 13px;">Update Your Email (Optional)</div>
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= $user['email']; ?>">
                            <?= form_error('email', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>
                        <div class="form mb-4">
                            <div class="password pl-2 mb-2" style="font-size: 13px;">Update Your Password (Optional)</div>
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="New Password">
                            <?= form_error('password', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>
                        <div class="form mb-4">
                            <div class="phone pl-2 mb-2" style="font-size: 13px;">Update Your Phone Number</div>
                            <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Phone Number" value="<?= $user['phone'] ?>">
                            <?= form_error('phone', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                        </div>
                        <div class="form mb-4">
                            <label for="role_id" class="pl-2 mb-2" style="font-size: 13px;">Role</label>
                            <select class="form-control" id="role_id" name="role_id" style="border-radius: 20px; font-size: 13px; height: 47px;">
                                <option value="1" <?= $user['role_id'] == 1 ? 'selected' : ''; ?>>Administrator</option>
                                <option value="2" <?= $user['role_id'] == 2 ? 'selected' : ''; ?>>Member</option>
                            </select>
                        </div>
                        <div class="form mb-5">
                            <div class="pl-2 mb-2" style="font-size: 13px;">Update Image Profile</div>
                            <div class="col-sm-12 pl-2">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block text-uppercase">
                                Update
                            </button>
                        </div>
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