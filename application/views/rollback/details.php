<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Berkas yang Dirollback</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('rollback'); ?>">Berkas Rollback</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <?= $this->session->flashdata('message'); ?>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Detail dari berkas <?= $data_rollback['nama']; ?> (NIP : <?= $data_rollback['nip']; ?>)</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Nama :</td>
                                        <td><?= $data_rollback['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIP :</td>
                                        <td><?= $data_rollback['nip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alasan di rollback :</td>
                                        <td><?= $data_rollback['pesan_rollback'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <h4>File - file</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>SUPERPDNA :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['superpdna']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKPI1THN :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skpi1thn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SUPERHD :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['superhd']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKCP :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skcp']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKKP :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skkp']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <?php if ($data_rollback['skpmk']) : ?>
                                        <tr>
                                            <td>SKPMK :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skpmk']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skjf1']) : ?>
                                        <tr>
                                            <td>SKJF1 :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skjf1']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skjab']) : ?>
                                        <tr>
                                            <td>SKJAB :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skjab']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skkppi']) : ?>
                                        <tr>
                                            <td>SKKPPI :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skkppi']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skhentis']) : ?>
                                        <tr>
                                            <td>SKHENTIS :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skhentis']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skcltn']) : ?>
                                        <tr>
                                            <td>SKCLTN :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skcltn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_rollback['skaktcltn']) : ?>
                                        <tr>
                                            <td>SKAKTCLTN :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_rollback['skaktcltn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning" href="<?= base_url('rollback/edit/') . encrypt_url($data_rollback['id']) ?>"><i class="fas fa-pencil-alt"></i> Edit data</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>