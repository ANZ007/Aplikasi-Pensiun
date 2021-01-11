<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('users') ?>">Daftar Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit Pengguna</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url() ?>users/editpost" method="post">
                <div class="card-body">
                    <div class=" form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="<?= $user_edit['name']; ?>" required>
                        <input type="hidden" value="<?= $user_edit['id']; ?>" name="id" id="id" />
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?= $user_edit['email']; ?>" required>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="1" <?php if ($user_edit['role'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>Rowai</option>
                            <option value="2" <?php if ($user_edit['role'] == 2) {
                                                    echo "selected=selected";
                                                } ?>>Satker</option>
                        </select>
                        <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="repassword">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Masukkan ulang password">
                        <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Edit</button>
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->