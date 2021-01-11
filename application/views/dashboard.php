<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah['pegawai']; ?></h3>

                            <?php if ($this->session->userdata('role') == 1) {
                                echo "<p>Total Pegawai</p>";
                            }
                            if ($this->session->userdata('role') == 2) {
                                echo "<p>Total Pegawai Pada Satker Ini</p>";
                            }
                            ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <p class="small-box-footer">-</p>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jumlah['akan_pensiun']; ?></h3>

                            <p>Akan Pensiun Tahun Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#DataPensiunThnIni" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jumlah['diproses']; ?></h3>

                            <p>Sedang Diproses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-gear-a"></i>
                        </div>
                        <?php if ($this->session->userdata('role') == 1) : ?>
                            <a href="<?= base_url('inbox'); ?>" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        <?php endif ?>
                        <?php if ($this->session->userdata('role') == 2) : ?>
                            <p class="small-box-footer">-</p>
                        <?php endif ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jumlah['selesai']; ?></h3>

                            <p>Selesai Diproses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-round"></i>
                        </div>
                        <p class="small-box-footer">-</p>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row" id="DataPensiunThnIni">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pensiunan Tahun Ini</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Satker</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Pensiun</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($pegawai)) {
                                        echo "";
                                    } else {
                                        foreach ($pegawai as $x) : ?>
                                            <tr>
                                                <td><?php if ($this->session->userdata('role') == 2) {
                                                        echo "<a href=\"" . base_url('addpensiun/nip/') . $x['nip'] . "\">" . $x['nip'] . "</a>";
                                                    } else {
                                                        echo "<p>" . $x['nip'] . "</p>";
                                                    }
                                                    ?></td>
                                                <td><?= $x['nama']; ?></td>
                                                <td><?= $x['satker']; ?></td>
                                                <td><?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                                    echo date('l, j F Y', strtotime($x['tgl_lahir'])); ?></td>
                                                <td><?php setlocale(LC_ALL, 'id_ID.UTF-8');
                                                    echo date('l, j F Y', strtotime($x['bup']));  ?></td>
                                                <td><?php if (empty($x['keterangan'])) {
                                                        echo "BELUM DIUSULKAN";
                                                    } else {
                                                        echo $x['keterangan'];
                                                    } ?></td>
                                        <?php endforeach;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Satker</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Pensiun</th>
                                        <th>Keterangan</th>
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