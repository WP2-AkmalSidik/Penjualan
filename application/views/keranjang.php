<div class="container-fluid">
    <h4>Keranjang Belanja</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <tr style="background-color: #4E73DF; color: aliceblue;" class="text-center">
            <th>NO</th>
            <th>Nama Produk</th>
            <th colspan="2">Ukuran</th>
            <th>Total</th>
            <th>Jumlah</th>
        </tr>
        <?php
        $no = 1;
        $grandTotal = 0; // Variabel untuk menyimpan grand total
        foreach ($this->cart->contents() as $items) :
            $hargaBarangAsli = $items['price']; // Harga asli barang per item
            $jumlahBarang = $items['qty']; // Jumlah barang

            $hargaTambahan = 0; // Inisialisasi harga tambahan
            switch ($items['options']['ukuran']) {
                case 'S':
                    // Tidak ada tambahan harga untuk ukuran S
                    break;
                case 'M':
                    $hargaTambahan = 2000; // Harga tambahan untuk ukuran M
                    $hargaBarangAsli += $hargaTambahan;
                    break;
                case 'L':
                    $hargaTambahan = 4000; // Harga tambahan untuk ukuran L
                    $hargaBarangAsli += $hargaTambahan;
                    break;
                case 'XL':
                    $hargaTambahan = 6000; // Harga tambahan untuk ukuran XL
                    $hargaBarangAsli += $hargaTambahan;
                    break;
                default:
                    // Handle jika ukuran tidak ada yang cocok
                    break;
            }

            $totalItem = $hargaBarangAsli * $jumlahBarang;

            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $items['name'] . '</td>';
            echo '<td>' . $items['options']['ukuran'] . '</td>';
            echo '<td>Rp. ' . number_format($hargaTambahan, 0, ',', '.') . '</td>';
            echo '<td align="left">Rp. ' . number_format($totalItem, 0, ',', '.') . '</td>';
            echo '<td>' . $items['qty'] . '</td>';
            echo '</tr>';

            $grandTotal += $totalItem; // Tambahkan harga subtotal ke grand total
        endforeach;
        ?>
        <tr style="background-color: grey; color:aliceblue;">
            <th colspan="5">Total Bayar</th>
            <th align="left">Rp. <?php echo number_format($grandTotal, 0, ',', '.') ?></th>
        </tr>
    </div>
    </table>
    <!-- Tombol untuk menghapus keranjang belanja, kembali, dan menuju pembayaran -->
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
        </a>
        <a href="<?php echo base_url('welcome') ?>">
            <div class="btn btn-sm btn-primary">Kembali</div>
        </a>
        <a href="<?php echo base_url('dashboard/pembayaran') ?>">
            <div class="btn btn-sm btn-success">Pembayaran</div>
        </a>
    </div>
</div>
</div>
</div>
