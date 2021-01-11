<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tracking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tracking</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tracking Berkas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Sampai Rowai</th>
                                        <th>Sampai BKN</th>
                                        <th>Sampai Rowai 2</th>
                                        <th>Sampai Satker</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pensiun as $x) : ?>
                                        <tr>
                                            <td><?= $x['id']; ?></td>
                                            <td><?= $x['nama']; ?></td>
                                            <td><?php if ($x['sampai_karowai'] == TRUE) {
                                                    echo "Sampai";
                                                } else if ($x['sampai_karowai'] == FALSE) {
                                                    echo "Belum sampai";
                                                } ?></td>
                                            <td><?php if ($x['sampai_bkn'] == TRUE) {
                                                    echo "Sampai";
                                                } else if ($x['sampai_bkn'] == FALSE) {
                                                    echo "Belum sampai";
                                                } ?></td>
                                            <td><?php if ($x['sampai_karowai_2'] == TRUE) {
                                                    echo "Sampai";
                                                } else if ($x['sampai_karowai_2'] == FALSE) {
                                                    echo "Belum sampai";
                                                } ?></td>
                                            <td><?php if ($x['sampai_satker'] == TRUE) {
                                                    echo "Sampai";
                                                } else if ($x['sampai_satker'] == FALSE) {
                                                    echo "Belum sampai";
                                                } ?></td>
                                        <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Sampai Rowai</th>
                                        <th>Sampai BKN</th>
                                        <th>Sampai Rowai 2</th>
                                        <th>Sampai Satker</th>
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