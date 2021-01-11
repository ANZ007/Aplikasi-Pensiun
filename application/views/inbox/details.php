<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Berkas Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('inbox'); ?>">Berkas Masuk</a></li>
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
                            <h2 class="card-title">Detail dari <?= $data_details['nama']; ?> (NIP : <?= $data_details['nip']; ?>)</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Nama :</td>
                                        <td><?= $data_details['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIP :</td>
                                        <td><?= $data_details['nip']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Satker :</td>
                                        <td><?= $data_details['satker']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <h4>File - file</h4>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>SUPERPDNA :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['superpdna']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKPI1THN :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skpi1thn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SUPERHD :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['superhd']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKCP :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skcp']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td>SKKP :</td>
                                        <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skkp']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                    </tr>
                                    <?php if ($data_details['skpmk']) : ?>
                                        <tr>
                                            <td>SKPMK :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skpmk']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skjf1']) : ?>
                                        <tr>
                                            <td>SKJF1 :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skjf1']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skjab']) : ?>
                                        <tr>
                                            <td>SKJAB :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skjab']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skkppi']) : ?>
                                        <tr>
                                            <td>SKKPPI :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skkppi']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skhentis']) : ?>
                                        <tr>
                                            <td>SKHENTIS :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skhentis']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skcltn']) : ?>
                                        <tr>
                                            <td>SKCLTN :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skcltn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <?php if ($data_details['skaktcltn']) : ?>
                                        <tr>
                                            <td>SKAKTCLTN :</td>
                                            <td><a type="button" class="btn btn-primary" href="<?= base_url('data/') . $data_details['skaktcltn']; ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <?php if ($data_details['sampai_bkn'] == FALSE) : ?>
                                <a class="btn btn-warning" href="<?= base_url('inbox/rollback/') . encrypt_url($data_details['id']) ?>"><i class="fas fa-undo"></i> Rollback berkas</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_bkn'] == FALSE) : ?>
                                <a class="btn btn-primary" href="<?= base_url('inbox/set_done/') . encrypt_url($data_details['id']) ?>"><i class="far fa-check-square"></i> Sudah mengirimkan data ke BKN</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_bkn'] == TRUE && $data_details['sampai_karowai_2'] == FALSE && $data_details['sampai_satker'] == FALSE) : ?>
                                <a class="btn btn-danger" href="<?= base_url('inbox/set_undone/') . encrypt_url($data_details['id']) ?>"><i class="fas fa-times"></i> Batalkan sudah mengirimkan data ke BKN</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_karowai_2'] == FALSE && $data_details['sampai_bkn'] == TRUE) : ?>
                                <a class="btn btn-primary" href="<?= base_url('inbox/set_bkn_done/') . encrypt_url($data_details['id']) ?>"><i class="far fa-check-square"></i> Sudah mendapatkan data dari BKN</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_karowai_2'] == TRUE && $data_details['sampai_bkn'] == TRUE && $data_details['sampai_satker'] == FALSE) : ?>
                                <a class="btn btn-danger" href="<?= base_url('inbox/set_bkn_undone/') . encrypt_url($data_details['id']) ?>"><i class="fas fa-times"></i> Batalkan sudah mendapatkan data dari BKN</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_satker'] == FALSE && $data_details['sampai_karowai_2'] == TRUE && $data_details['sampai_bkn'] == TRUE) : ?>
                                <a class="btn btn-primary" href="<?= base_url('inbox/reply/') . encrypt_url($data_details['id']) ?>"><i class="fa fa-upload"></i> Upload Jawaban BKN</a>
                            <?php endif ?>
                            <?php if ($data_details['sampai_satker'] == TRUE && $data_details['sampai_karowai_2'] == TRUE && $data_details['sampai_bkn'] == TRUE) : ?>
                                <a class="btn btn-danger" href="<?= base_url('inbox/undone_reply/') . encrypt_url($data_details['id']) ?>"><i class="fas fa-times"></i> Batalkan Jawaban BKN</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>