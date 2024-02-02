<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <?php foreach($barang as $brg) :?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url().'/upload/'.$brg->gambar ?>" class="card-img-top" alt="">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?php echo $brg->nama_brg ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?php echo $brg->keterangan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $brg->kategori ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><strong><?php echo $brg->stok ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga,0,',','.') ?></div></strong></td>
                            </tr>
                        </table>
                        <!-- Tombol untuk menampilkan modal -->
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahKeranjang<?php echo $brg->id_brg ?>">Tambah Keranjang</button>
                        <?php echo anchor('welcome/','<div class="btn btn-sm btn-danger">Kembali</div>') ?>
                    </div>
                </div>
                <!-- Modal untuk input ukuran dan jumlah -->
                <div class="modal fade" id="modalTambahKeranjang<?php echo $brg->id_brg ?>" tabindex="-1" role="dialog" aria-labelledby="modalTambahKeranjangLabel" aria-hidden="true">
                    <!-- Konten modal -->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- Bagian header modal -->
                                <h5 class="modal-title" id="modalTambahKeranjangLabel">Tambah ke Keranjang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk ukuran dan jumlah barang -->
                                <form id="formTambahKeranjang<?php echo $brg->id_brg ?>" action="<?php echo base_url('dashboard/tambah_keranjang/' . $brg->id_brg) ?>" method="post">
                                    <!-- Input ukuran -->
                                    <div class="form-group">
                                        <!-- Label ukuran -->
                                        <label for="ukuran">Ukuran</label>
                                        <!-- Pilihan ukuran -->
                                        <select class="form-control" id="ukuran<?php echo $brg->id_brg ?>" name="ukuran" onchange="hitungTotalHarga('<?php echo $brg->id_brg ?>', <?php echo $brg->harga ?>)">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <!-- Input jumlah -->
                                    <div class="form-group">
                                        <!-- Label jumlah -->
                                        <label for="jumlah">Jumlah</label>
                                        <!-- Input jumlah -->
                                        <input type="number" class="form-control" id="jumlah<?php echo $brg->id_brg ?>" name="jumlah" value="1" min="1" onchange="hitungTotalHarga('<?php echo $brg->id_brg ?>', <?php echo $brg->harga ?>)">
                                    </div>
                                    <!-- Total harga -->
                                    <p>Total Harga: <span id="totalHarga<?php echo $brg->id_brg ?>">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></span></p>
                                    <!-- Tombol untuk menambahkan ke keranjang -->
                                    <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function hitungTotalHarga(id, hargaAwal) {
        var hargaPerBarang = hargaAwal; // Menggunakan harga awal produk sebagai referensi
        var ukuran = document.getElementById('ukuran' + id).value;
        var jumlah = document.getElementById('jumlah' + id).value;

        // Hitung harga tambahan berdasarkan ukuran yang dipilih
        if (ukuran === 'M') {
            hargaPerBarang += 2000; // Tambahkan Rp. 2.000 untuk ukuran M
        } else if (ukuran === 'L') {
            hargaPerBarang += 4000; // Tambahkan Rp. 4.000 untuk ukuran L
        } else if (ukuran === 'XL') {
            hargaPerBarang += 6000; // Tambahkan Rp. 6.000 untuk ukuran XL
        }

        var totalHarga = hargaPerBarang * jumlah;
        // Tampilkan total harga dalam format yang diinginkan
        document.getElementById('totalHarga' + id).innerText = 'Rp. ' + totalHarga.toLocaleString();

        // Setelah menghitung total, panggil fungsi untuk mengupdate total keseluruhan
        updateTotalKeseluruhan();
    }
</script>
