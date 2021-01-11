<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Rollback Berkas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('inbox'); ?>">Berkas Masuk</a></li>
                        <li class="breadcrumb-item active">Rollback Berkas</li>
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
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form Alasan Rollback Berkas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart('inbox/rollbackpost') ?>
                        <div class="card-body">
                            <input type="hidden" value="<?= $id_pensiun['id']; ?>" name="id" id="id" />
                            <input type="hidden" value="<?= $id_pensiun['nip']; ?>" name="nip" id="nip" />
                            <div class="form-group">
                                <label for="alasan">Alasan</label>
                                <textarea class="form-control" name="alasan" id="alasan" placeholder="Masukkan alasan" required></textarea>
                                <?= form_error('alasan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-undo"></i>Rollback Berkas</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>