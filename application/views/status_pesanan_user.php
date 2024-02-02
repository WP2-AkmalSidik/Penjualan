<!-- status_pesanan_user.php -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Status Pesanan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <!-- <th>ID Invoice</th> -->
                        <th>Nama Pemesan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $key => $item) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <!-- <td><?= $item->id_invoice ?></td> -->
                            <td><?= $item->username ?></td>
                            <td><?= $item->nama_brg ?></td>
                            <td><?= $item->jumlah ?></td>
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
                                    case '3':
                                        echo '<a href="' . base_url('dashboard/update_status/' . $item->id . '/4') . '" class="btn btn-success ml-2">Pesanan Diterima</a>';
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>