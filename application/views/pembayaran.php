<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <div class="btn btn-sm btn-success"> -->

            <!-- </div><br> <br> -->
            <h2 class="text-center">Input Alamat Pengiriman dan Pembayaran</h2>
            <h3 class="text-center">Isikan data dengan benar</h5>
                <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">
                    <?php
                    $grandTotal = 0;
                    if ($keranjang = $this->cart->contents()) {
                        foreach ($keranjang as $item) {
                            $hargaBarangAsli = $item['price'];
                            $jumlahBarang = $item['qty'];

                            $hargaTambahan = 0;
                            switch ($item['options']['ukuran']) {
                                case 'S':
                                    break;
                                case 'M':
                                    $hargaTambahan = 2000;
                                    $hargaBarangAsli += $hargaTambahan;
                                    break;
                                case 'L':
                                    $hargaTambahan = 4000;
                                    $hargaBarangAsli += $hargaTambahan;
                                    break;
                                case 'XL':
                                    $hargaTambahan = 6000;
                                    $hargaBarangAsli += $hargaTambahan;
                                    break;
                                default:
                                    break;
                            }

                            $totalItem = $hargaBarangAsli * $jumlahBarang;
                            $grandTotal += $totalItem;
                        }
                        // echo "<h4 id='totalBelanja'>Total Belanja Anda : Rp. " . number_format($grandTotal, 0, ',', '.') . "</h4>";
                    ?>
                        <div class="d-flex justify-content-center">
                            <div class="form-group btn btn-success" style="cursor: default;">
                                <label for="">Subtotal</label>
                                <input type="text" name="subtotal" id="subtotal" value="<?php echo number_format($grandTotal, 0, ',', '.') ?>" class="form-control text-center" style="cursor: default;" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap " class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name="no_tlp" placeholder="Nomer Telpon Anda" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Metode Pembayaran</label>
                            <select class="form-control" name="pembayaran" id="">
                                <option value="" selected disabled class="d-none">Pilih Metode Pembayaran</option>
                                <option value="BCA-12334556">BCA - 12334556</option>
                                <option value="BNI-09235237">BNI - 09235237</option>
                                <option value="BTN-79587429">BTN - 79587429</option>
                                <option value="Dana-08634563067">Dana - 08634563067</option>
                                <option value="Mandiri-09237502753">Mandiri - 09237502753</option>
                            </select>
                        </div> -->
                        <!-- Remaining form elements -->
                        <div class="form-group">
                            <label for="">Opsi Pengiriman</label>
                            <select class="form-control" name="pengiriman" id="pengiriman" onchange="hitungTotal()">
                                <option value="" selected disabled class="d-none">Pilih Jasa Pengiriman</option>
                                <option value="Hemat">Hemat</option>
                                <option value="Reguler">Reguler</option>
                                <option value="Kargo">Kargo</option>
                                <option value="Next Day">Next Day</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Biaya Pengiriman</label>
                            <input type="text" id="biayaPengiriman" value="0" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="username" value="<?php echo $this->session->userdata('username'); ?>">
                        </div>
                        <!-- Remaining form elements -->
                        <a href="<?php echo base_url('welcome') ?>">
                            <div class="btn btn-sm btn-primary">Kembali</div>
                        </a>
                        <button type="submit" class="btn btn-sm btn-success">Pesan</button>
                </form>
            <?php
                    } else {
                        echo "<h4>Keranjang Belanja Anda Masih Kosong, Segera Belanja !";
                    }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</div>
<script>
    function hitungTotal() {
        var grandTotal = <?php echo $grandTotal; ?>;
        var opsiPengiriman = document.getElementById("pengiriman").value;
        var biayaPengiriman = 0;

        // Hitung biaya tambahan berdasarkan opsi pengiriman
        switch (opsiPengiriman) {
            case 'Hemat':
                biayaPengiriman = 10000;
                break;
            case 'Reguler':
                biayaPengiriman = 12000;
                break;
            case 'Kargo':
                biayaPengiriman = 15000;
                break;
            case 'Next Day':
                biayaPengiriman = 20000;
                break;
            default:
                break;
        }

        // Tambahkan biaya pengiriman ke grand total
        grandTotal += biayaPengiriman;

        // Update field biaya pengiriman dan subtotal
        document.getElementById("biayaPengiriman").value = biayaPengiriman;
        document.getElementById("subtotal").value = grandTotal;
        // document.getElementById("totalBelanja").innerHTML = "Total Belanja Anda : Rp. " + formatNumber(grandTotal);
    }
</script>
<!-- Your HTML and PHP code -->