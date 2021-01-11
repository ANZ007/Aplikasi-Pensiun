<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>">Aplikasi Pensiun</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?= $this->session->flashdata('message'); ?>
                <p class="login-box-msg">Masuk untuk melanjutkan</p>

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" class="form-control" name="password" placeholder="Kata sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <!--<p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>-->
                <p class="mb-1">
                    <a href="<?= base_url('auth/forgotpasswd') ?>" class="text-center">Lupa Kata Sandi</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->