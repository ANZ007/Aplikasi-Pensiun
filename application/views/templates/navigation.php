<body class="hold-transition sidebar-mini pace-primary layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <p>Loading Time : {elapsed_time} seconds</p>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 layout-fixed">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">
                <img src="<?= base_url('assets'); ?>/favicon.png" alt="Aplikasi Pensiun Logo" class="brand-image img-thumbnail">
                <span class="brand-text font-weight-light">Aplikasi Pensiun</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/profile-img/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block"><?= $user['name']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header pl-3">Menu</li>
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php if ($user['role'] == 2) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('addpensiun') ?>" class="nav-link">
                                    <i class="far fa-edit"></i>
                                    <p>
                                        Pendaftaran Pensiun
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="<?= base_url('inbox') ?>" class="nav-link">
                                <i class="fas fa-inbox"></i>
                                <p>
                                    Berkas Masuk
                                </p>
                            </a>
                        </li>
                        <?php if ($user['role'] == 2) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('tracking') ?>" class="nav-link">
                                    <i class="fas fa-flag-checkered"></i>
                                    <p>
                                        Tracking
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rollback') ?>" class="nav-link">
                                    <i class="fas fa-undo"></i>
                                    <p>
                                        Berkas Rollback
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if ($user['role'] == 1) : ?>
                            <li class="nav-header">Administrasi</li>
                            <li class="nav-item">
                                <a href="<?= base_url('users') ?>" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>
                                        Daftar Pengguna
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="nav-header">Profil</li>
                        <li class="nav-item">
                            <a href="<?= base_url('profile/show') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Lihat Profil
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('profile/edit') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>
                                    Edit Profil
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Aksi</li>
                        <li class="nav-item">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>