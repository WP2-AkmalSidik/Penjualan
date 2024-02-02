<div class="container mt-5">
    <!-- Tampilan komentar -->
    <?php foreach ($comments as $comment) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <small class="text-muted"><?php echo $comment['nama_pengguna']; ?></small>
                <p class="card-text"><?php echo $comment['komentar']; ?></p>
                <?php if ($comment['balasan'] !== null) : ?>
                    <div class="bg-light p-2 mt-3">
                        <small class="text-muted">Admin</small>
                        <p class="card-text"><?php echo $comment['balasan']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Formulir untuk menambah komentar baru -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Komentar Baru</h5>
            <form action="<?php echo base_url('dashboard/addComment'); ?>" method="post">
                <!-- Tambahkan input hidden untuk menyimpan user_id -->
                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id'); ?>">

                <div class="form-group">
                    <textarea class="form-control" name="komentar" rows="3" placeholder="Komentar baru"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>

        </div>
    </div>
</div>
