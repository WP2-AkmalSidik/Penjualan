<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-4">Upload Bukti Pembayaran</h2>
            <form action="<?php echo base_url() ?>dashboard/process_payment" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>"> <!-- ID invoice yang dibutuhkan -->
                <div class="form-group">
                    <label for="">Metode Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-control">
                            <option value="" selected disabled class="d-none">Pilih Metode Pembayaran</option>
                            <option value="BCA-12334556">BCA - 12334556</option>
                            <option value="BNI-09235237">BNI - 09235237</option>
                            <option value="BTN-79587429">BTN - 79587429</option>
                            <option value="Dana-08634563067">Dana - 08634563067</option>
                            <option value="Mandiri-09237502753">Mandiri - 09237502753</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="">Unggah Bukti Pembayaran:</label>
                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
            </form>
        </div>
    </div>
</div>
</div>