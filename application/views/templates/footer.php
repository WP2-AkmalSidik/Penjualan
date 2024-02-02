<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Akmal Sidik <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cara Pembelian dan Return </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>A. Cara Membeli Baju</h6>
                <p><strong>Membeli Baju</strong></p>
                <ol>
                    <li>Login atau buat akun terlebih dahulu.</li>
                    <li>Pilih barang/baju yang diinginkan.</li>
                    <li>Lakukan pembayaran sebelum batas waktu yang ditentukan.</li>
                    <li>Tunggu pengiriman barang dan konfirmasi penerimaan.</li>
                </ol>
                <p><strong>Tanggapan Admin:</strong></p>
                <p>Admin akan:</p>
                <ul>
                    <li>Mengonfirmasi pembayaran.</li>
                    <li>
                        Jika ditolak:
                        <ul>
                            <li>Pembelian dibatalkan karena belum ada pembayaran atau melewati batas waktu.</li>
                        </ul>
                    </li>
                    <li>
                        Jika diterima:
                        <ul>
                            <li>Langsung memproses pesanan pengguna.</li>
                        </ul>
                    </li>
                </ul>
                <h6>B. Proses Pengembalian/Return</h6>
                <p><strong>Bisa Melalui Whatsapp</strong></p>
                <ol>
                    <li>Pengguna menghubungi admin untuk proses return.</li>
                    <li>Bisa return melalui whatsapp : 0868-6166-4398</li>
                </ol>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

</body>

</html>