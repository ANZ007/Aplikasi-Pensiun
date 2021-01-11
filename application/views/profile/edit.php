        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Profil</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profil</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <?= form_open_multipart('profile/edit') ?>
                                <div class="form-group row" style="display:none">
                                    <label for="email" class="col-sm-3 col-form-label">ID</label>

                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" id="id" name="id" readonly value="<?= $user['id'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label"><label>Gambar</label></div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/profile-img/') . $user['image']; ?>" class="img-thumbnail">
                                            </div>

                                            <div class="col-9">
                                                <div class="custom-file">

                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Pilih gambar</label>
                                                    <p class=" font-italic" style="font-size: 12px;">Ukuran maksimal 2mb </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email" readonly value=" <?= $user['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class=" form-group row">
                                    <label for="bio" class="col-sm-3 col-form-label">Bio</label>

                                    <div class="input-group col-sm-9">
                                        <div class="input-group-prepend">
                                        </div>
                                        <textarea name="bio" id="bio" class="form-control" aria-label="With textarea"><?= $user['bio'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a class="btn btn-danger" href="<?= base_url('profile/show'); ?>" role="button">Batal</a>
                    </div>
                    </form>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->