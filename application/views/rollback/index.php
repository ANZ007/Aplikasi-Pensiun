<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berkas Rollback</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Berkas Rollback</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?= $this->session->flashdata('message'); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Surat yang Dirollback</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tanggal rollback</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($data_rollback)) :
                                        foreach ($data_rollback as $x) : ?>
                                            <tr>
                                                <td><?= $x['id'] ?></td>
                                                <td><?= $x['nama']; ?></td>
                                                <td><?= $x['nip']; ?></td>
                                                <td><?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                                    echo strftime('%A, %e %B %Y', $x['updated_at']); ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?= base_url('rollback/details/') . encrypt_url($x['id']); ?>" ?>Detail</a>
                                                </td>
                                        <?php endforeach;
                                    endif;
                                        ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Tanggal ditambahkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->