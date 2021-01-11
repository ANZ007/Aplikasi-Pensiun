<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Upload file dari BKN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('inbox'); ?>">Berkas Masuk</a></li>
                        <li class="breadcrumb-item active">Kirim Balasan</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Upload Balasan BKN</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart('inbox/replypost') ?>
                        <div class="card-body">
                            <input type="hidden" value="<?= $id_pensiun['id']; ?>" name="id" id="id" />
                            <input type="hidden" value="<?= $id_pensiun['nip']; ?>" name="nip" id="nip" />
                            <div class="form-group">
                                <label for="file_jawaban">Jawaban dari BKN</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_jawaban" name="file_jawaban">
                                        <label class="custom-file-label" for="file_jawaban">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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