<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pengguna</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                if (!empty($users)) :
                                    foreach ($users as $x) : ?>
                                        <tr>
                                            <td><?php echo $no;
                                                $no++; ?></td>
                                            <td><?= $x['name'] ?></td>
                                            <td><?php echo $x['email']; ?></td>
                                            <td><?php if ($x['role'] == 1) {
                                                    echo "Rowai";
                                                } else if ($x['role'] == 2) {
                                                    echo "Satker";
                                                } ?></td>
                                            <td><?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                                echo strftime('%A, %e %B %Y', $x['date_created']); ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= base_url('users/edit/') . encrypt_url($x['id']); ?>" ?>Edit</a>
                                                <a class="btn btn-danger" href="<?= base_url('users/delete/') . encrypt_url($x['id']); ?>" role="button">Hapus</a>
                                            </td>
                                    <?php endforeach;
                                endif ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="btn btn-primary" href="<?= base_url('users/add') ?>">Tambah</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleAdd">Tambah Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('agenda/add') ?>" method="post">
                        <div class=" form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama agenda" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="date" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="date" class="form-control" id="role" name="role" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end" name="end" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleAdd">Edit Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('agenda/edit') ?>" method="post">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <input type="hidden" name="email" id="email" value="<?= $this->session->userdata('email'); ?>">
                        <div class=" form-group">
                            <label for="title">Nama agenda</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nama agenda" required>
                        </div>
                        <div class="form-group">
                            <label for="start">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start" name="start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end" name="end" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>