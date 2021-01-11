<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Berkas Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Berkas Masuk</li>
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
                    <?php if ($user['role'] == 2) : ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Surat Jawaban Pensiun</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($data_pensiun == NULL) {
                                            echo "";
                                        } else {
                                            $no = 1;
                                            foreach ($data_pensiun as $x) : ?>
                                                <tr>
                                                    <td><?php echo $no;
                                                        $no++; ?></td>
                                                    <td><?= $x['nama']; ?></td>
                                                    <td><?= $x['nip']; ?></td>
                                                    <td><a class="btn btn-primary" href="<?= base_url('data/') . $x['file_jawaban'] ?>" target="_blank"><i class="fa fa-download"></i> Unduh</a></td>
                                                    </td>
                                            <?php endforeach;
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        <?php endif ?>
                        <?php if ($user['role'] == 1) : ?>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Surat Jawaban Pensiun</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="data-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Satker</th>
                                                <th>Tanggal ditambahkan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            if (!empty($data_pensiun)) :
                                                foreach ($data_pensiun as $x) : ?>
                                                    <tr>
                                                        <td><?php echo $no;
                                                            $no++; ?></td>
                                                        <td><?= $x['nama']; ?></td>
                                                        <td><?= $x['nip']; ?></td>
                                                        <td><?= $x['satker']; ?></td>
                                                        <td><?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                                            echo strftime('%A, %e %B %Y', $x['created_at']); ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?= base_url('inbox/details/') . encrypt_url($x['id']); ?>" ?>Detail</a>
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
                                                <th>Satker</th>
                                                <th>Tanggal ditambahkan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            <?php endif ?>
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