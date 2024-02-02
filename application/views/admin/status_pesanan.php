<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Status Pesanan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemesan</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $key => $item) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item->nama_pemesan ?></td>
                            <td><?= $item->nama_brg ?></td>
                            <td><?= $item->jumlah ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modalGambar_<?= $item->id ?>"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <?php
                                switch ($item->status) {
                                    case '0':
                                        echo 'Pesanan sedang diproses';
                                        break;
                                    case '1':
                                        echo 'Pesanan sedang dalam proses penyiapan';
                                        break;
                                    case '2':
                                        echo 'Pesanan sedang dalam perjalanan';
                                        break;
                                    case '3':
                                        echo 'Pesanan sedang dikirim ke alamat tujuan';
                                        break;
                                    case '4':
                                        echo 'Pesanan diterima';
                                        break;
                                    default:
                                        echo 'Status tidak valid';
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                switch ($item->status) {
                                    case '0':
                                        // echo '<a href="' . base_url('admin/pengiriman/update_status/' . $item->id . '/1') . '" class="btn btn-primary ml-2">Ubah ke Proses Penyiapan</a>';
                                        echo '<div class="btn-group">
                                                    <button type="button" class="btn btn-primary ml-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Konfirmasi Bukti
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item p-2 mb-1 bg-primary text-white" href="' .  base_url('admin/pengiriman/update_status/' . $item->id . '/1') . '">Ubah ke Proses penyiapan</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item p-2 mb-1 bg-danger text-white" data-toggle="modal" data-target="#konfirmasiModal" data-id="' . $item->id . '">Hapus</a>
                                                    </div>
                                                </div>';
                                        break;
                                    case '1':
                                        echo '<a href="' . base_url('admin/pengiriman/update_status/' . $item->id . '/2') . '" class="btn btn-warning ml-2">Ubah ke Dalam Perjalanan</a>';
                                        break;
                                    case '2':
                                        echo '<a href="' . base_url('admin/pengiriman/update_status/' . $item->id . '/3') . '" class="btn btn-info ml-2">Ubah ke Dikirim ke Alamat Tujuan</a>';
                                        break;
                                    case '3':
                                        echo '<div class="btn-group">
                                                    <button type="button" class="btn btn-success ml-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Menunggu diterima user
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item p-2 mb-1 bg-success text-white" href="' . base_url('admin/pengiriman/update_status/' . $item->id . '/4') . '">Ubah ke Diterima</a>
                                                    </div>
                                                </div>';
                                        break;
                                    case '4':
                                        echo '<a href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#konfirmasiModal" data-id="' . $item->id . '">Hapus</a>';
                                        break;
                                    default:
                                        echo ' <i class="btn btn-danger ml-2" > Status tidak valid </i>';
                                        break;
                                }
                                ?>
                            </td>
                            <!-- Modal Konfirmasi -->
                            <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Hapus Pesanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Anda akan menhgapus</strong> hapus saja kah?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <a id="hapusPesanan" href="#" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- Modal Gambar -->
<?php foreach ($pesanan as $item) : ?>
    <div class="modal fade" id="modalGambar_<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel_<?= $item->id ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGambarLabel_<?= $item->id ?>">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('upload/bukti/' . $item->bukti_bayar) ?>" class="img-fluid" alt="Bukti Pembayaran">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>