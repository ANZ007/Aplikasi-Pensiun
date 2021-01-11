<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>403 Forbidden</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Akses Diblokir</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-danger">403</h2>

            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Akses Diblokir.</h3>
                <p>
                    Anda tidak memiliki hak akses pada laman ini.
                </p>
                <a class="btn btn-warning" href="<?= base_url() ?>">Kembali ke Dashboard</a>
                <p></p>
                <a class="btn btn-warning" onclick="history.back()">Kembali ke Halaman Sebelumnya</a>
            </div>
        </div>
        <!-- /.error-page -->

    </section>
    <!-- /.content -->
</div>