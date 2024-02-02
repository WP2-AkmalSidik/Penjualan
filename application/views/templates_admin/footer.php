<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Akmal Sidik <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
<script>
    // Tangkap klik tombol hapus pada modal dan simpan ID pesanan yang akan dihapus
    $('#konfirmasiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var idPesanan = button.data('id');
        var modal = $(this);
        modal.find('#hapusPesanan').attr('href', '<?= base_url('admin/pengiriman/hapus_pesanan/') ?>' + idPesanan);
    });
</script>


</body>

</html>