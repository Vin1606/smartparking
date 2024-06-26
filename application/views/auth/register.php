<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h5 class="text-gray-900 mb-4">Create Account!</h5>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form mb-3">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                </div>
                                <div class="form mb-3">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                </div>
                                <div class="form" style="display: flex; flex-direction: column;">
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                        <?= form_error('password2', ' <small class="text-danger pl-2 mb-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth/index'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>