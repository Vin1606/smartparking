<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <h1>NGEEET</h1>

            <div class="col-lg-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="width: 600px;"></div>
                            <div class="col-lg">
                                <div class="p-4">

                                    <div class="text-message">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>

                                    <div class="text-message-failed" style="text-align: center;">
                                        <?= $this->session->flashdata('failed'); ?>
                                    </div>

                                    <div class="text-center">
                                        <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="" style="width: 200px; margin-bottom: 20px;">
                                        <h5 class="text-gray-900 mb-4">Please Login</h5>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form mb-3">
                                            <div class="email-form mb-1 ml-2" style="color: black; font-size: 13px;">
                                                <i class="fa-solid fa-fw fa-envelope logo-email"></i>
                                                <span>Email</span>
                                            </div>
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                                            <?= form_error('email', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                        </div>
                                        <div class="form mb-3">
                                            <div class="pass-form mb-1 ml-2" style="color: black; font-size: 13px;">
                                                <i class="fa-solid fa-fw fa-key logo-pass"></i>
                                                <span>Password</span>
                                            </div>

                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Your Password...">
                                            <?= form_error('password', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>