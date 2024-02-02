<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <!-- welcome/index.php -->
    <?php if ($this->session->flashdata('success_message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success_message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/slider1.jpg') ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/slider2.jpg') ?>" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container mt-4">
    <div class="row text-center">
        <?php foreach ($barang as $brg) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="<?php echo base_url() . '/upload/' . $brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo substr($brg->nama_brg, 0, 15) . '...' ?></h5>
                        <p class="card-text"><?php echo substr($brg->keterangan, 0, 35) . '...'; ?></p>
                        <span class="badge badge-success">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></span>
                        <div class="mt-2">
                            <!-- Tombol untuk menampilkan modal -->
                            <div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambahKeranjang<?php echo $brg->id_brg ?>">Add To Cart</div>
                            <?php echo anchor('dashboard/detail/' . $brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                        </div>
                    </div>
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

<script>
    function hitungTotalHarga(id, hargaAwal) {
        var hargaPerBarang = hargaAwal; // Menggunakan harga awal baju sebagai referensi
        var ukuran = document.getElementById('ukuran' + id).value;
        var jumlah = document.getElementById('jumlah' + id).value;

        // Hitung harga tambahan berdasarkan ukuran yang dipilih
        if (ukuran === 'M') {
            hargaPerBarang += 2000; // Tambahkan Rp. 2.000 untuk ukuran M
        } else if (ukuran === 'L') {
            hargaPerBarang += 4000;
        } else if (ukuran === 'XL') {
            hargaPerBarang += 6000;
        }

        var totalHarga = hargaPerBarang * jumlah;
        document.getElementById('totalHarga' + id).innerText = 'Rp. ' + totalHarga.toLocaleString();

        // Setelah menghitung total, panggil fungsi untuk mengupdate total keseluruhan
        updateTotalKeseluruhan();
    }
</script>