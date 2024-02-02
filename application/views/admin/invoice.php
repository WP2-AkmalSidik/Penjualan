<div class="container-fluid">
    <h4>Invoice Pemesanan Prodak</h4>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-hover table-triped">
        <tr>
            <!-- <th>Id Invoice</th> -->
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>No Telepon</th>
            <th>Pengiriman</th>
            <!-- <th>Pembayaran</th> -->
            <th>Alamat Pengirim</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
            <th></th>
        </tr>
        <?php foreach ($invoice as $key => $inv) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->no_tlp ?></td>
                <td><?php echo $inv->pengiriman ?></td>
                <!-- <td><?php echo $inv->pembayaran ?></td> -->
                <td><?php echo $inv->Alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <td><?php echo anchor('admin/invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary"><i class="fas fa-search-plus"></i></div>') ?></td>
                <td>
                    <?php echo anchor('admin/invoice/hapus_pesanan/' . $inv->id, '<div class="btn btn-sm btn-success" onclick="return confirm(\'Apakah pesanan sudah sampai ke pembeli?\');"><i class="fas fa-check"></i></div>') ?>
                </td>


            </tr>
        <?php endforeach; ?>
    </table>
</div>