<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.2.0</br>
    </div>
    <strong>Copyright &copy; <?= '2020 - ' . date('Y'); ?> Aplikasi Pensiun.</strong> All rights reserved.
</footer>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url('assets'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- pace-progress -->
<script src="<?= base_url('assets'); ?>/plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Page specific script -->
<!-- show value in custom-file-input class -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<!-- DataTables Config -->
<script>
    $(function() {
        $('#data-table').DataTable({
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],
            "language": {
                "processing": "Sedang memproses...",
                "lengthMenu": "Menampilkan _MENU_ daftar per halaman",
                "zeroRecords": "Tidak ditemukan data",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 daftar",
                "infoFiltered": "(difilter dari _MAX_ total daftar)",
                "search": "Cari : ",
                "paginate": {
                    "first": "Pertama",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya",
                    "last": "Terakhir"
                }
            },
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>