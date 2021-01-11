<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pendaftaran Pensiunan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Berkas Keluar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Pendataran Pensiunan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart('addpensiun/post') ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" <?php if (isset($data_pegawai['nama'])) : ?>value="<?= $data_pegawai['nama']; ?>" <?php endif ?> required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" <?php if (isset($data_pegawai['nip'])) : ?>value="<?= $data_pegawai['nip']; ?>" <?php endif ?> required>
                                <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="superpdna">SUPERPDNA (wajib)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="superpdna" name="superpdna">
                                        <label class="custom-file-label" for="superpdna">Pilih File</label>
                                    </div>
                                </div>
                                <?= form_error('superpdna', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="skpi1thn">SKPI1THN (wajib)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skpi1thn" name="skpi1thn">
                                        <label class="custom-file-label" for="skpi1thn">Pilih File</label>
                                    </div>
                                </div>
                                <?= form_error('skpi1thn', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="superhd">SUPERHD (wajib)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="superhd" name="superhd">
                                        <label class="custom-file-label" for="superhd">Pilih File</label>
                                    </div>
                                </div>
                                <?= form_error('superhd', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="skcp">SKCP (wajib)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skcp" name="skcp">
                                        <label class="custom-file-label" for="skcp">Pilih File</label>
                                    </div>
                                </div>
                                <?= form_error('skcp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="skkp">SKKP (wajib)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skkp" name="skkp">
                                        <label class="custom-file-label" for="skkp">Pilih File</label>
                                    </div>
                                </div>
                                <?= form_error('skkp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="skpmk">SKPMK</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skpmk" name="skpmk">
                                        <label class="custom-file-label" for="skpmk">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skjf1">SKJF1</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skjf1" name="skjf1">
                                        <label class="custom-file-label" for="skjf1">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skjab">SKJAB</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skjab" name="skjab">
                                        <label class="custom-file-label" for="skjab">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skkppi">SKKPPI</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skkppi" name="skkppi">
                                        <label class="custom-file-label" for="skkppi">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skhentis">SKHENTIS</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skhentis" name="skhentis">
                                        <label class="custom-file-label" for="skhentis">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skcltn">SKCLTN</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skcltn" name="skcltn">
                                        <label class="custom-file-label" for="skcltn">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skaktcltn">SKAKTCLTN</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="skaktcltn" name="skaktcltn">
                                        <label class="custom-file-label" for="skaktcltn">Pilih File</label>
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