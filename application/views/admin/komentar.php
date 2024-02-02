<div class="container mt-5">
    <!-- Tampilan komentar -->
    <?php foreach ($comments as $comment) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <!-- Menampilkan nama pengguna yang memberi komentar -->
                <small class="text-muted">Oleh: <?php echo $comment['nama_pengguna']; ?></small>
                <p class="card-text"><?php echo $comment['komentar']; ?></p>
                <!-- Menampilkan tanggal komentar dibuat -->
                <small class="text-muted">Pada :<?php echo date('Y-m-d H:i:s', strtotime($comment['created_at'])); ?></small>
                <?php if ($comment['id_balasan_komentar'] !== null) : ?>
                    <div class="bg-light p-2 mt-3">
                        <small class="text-muted">Admin</small>
                        <p class="card-text"><?php echo $comment['balasan']; ?></p>
                        <!-- Menampilkan tanggal balasan admin -->
                        <small class="text-muted">Dibalas :<?php echo date('Y-m-d H:i:s', strtotime($comment['created_at_balasan'])); ?></small>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->userdata('role_id') == '1') : ?>
                    <!-- Formulir balasan untuk admin -->
                    <form action="<?php echo base_url('admin/dashboard_admin/addReply'); ?>" method="post">
                        <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                        <div class="form-group">
                            <textarea class="form-control" name="reply" rows="3" placeholder="Balas komentar"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Balas</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Formulir untuk menambah komentar baru oleh admin -->
    <?php if ($this->session->userdata('role_id') == '1') : ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Komentar Baru oleh Admin</h5>
                <form action="<?php echo base_url('admin/dashboard_admin/addComment'); ?>" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="komentar" rows="3" placeholder="Komentar baru"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
