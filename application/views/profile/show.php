        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profil Saya</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Profil Saya</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <?= $this->session->flashdata('message'); ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <center>
                            <img width="200" class="img-circle" src="<?= base_url('assets/profile-img/') . $user['image']; ?>">
                            <h3><?= $user['name']; ?></h3>
                        </center>
                        <p>Email : <?= $user['email']; ?></p>
                        <p>Role : <?php if ($user['role'] == 1) {
                                        echo "Rowai";
                                    }
                                    if ($user['role'] == 2) {
                                        echo "Satker";
                                    }; ?></p>
                        <p>Bio : <?php if ($user['bio']) {
                                        echo $user['bio'];
                                    } else {
                                        echo "Tidak ada bio";
                                    } ?></p>
                        <br><br>
                        Bergabung Sejak : <?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                            echo strftime('%A, %e %B %Y %H:%M:%S', $user['date_created']); ?>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a type="button" class="btn btn-primary" href="<?= base_url('profile/edit') ?>">Edit Profil</a>
                        <a type="button" class="btn btn-primary" href="<?= base_url('profile/passwd') ?>">Ganti Password</a>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->