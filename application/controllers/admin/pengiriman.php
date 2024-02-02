<?php
class Pengiriman extends CI_Controller {
    public function index() {
        $data['pesanan'] = $this->model_invoice->get_all_pesanan(); // Memanggil semua pesanan dari model

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/status_pesanan', $data); // Mengirim data pesanan ke view
        $this->load->view('templates_admin/footer');
    }

    public function update_status($id_pesanan, $status) {
        // Lakukan validasi admin di sini
        // Pastikan hanya admin yang berhak untuk melakukan update status

        // Lakukan update status pesanan menggunakan model_invoice
        $this->model_invoice->update_status_pesanan($id_pesanan, $status);

        // Redirect kembali ke halaman status pesanan
        redirect('admin/pengiriman/index');
    }
    public function hapus_pesanan($id_pesanan) {
        // Lakukan validasi admin di sini
        // Pastikan hanya admin yang berhak untuk menghapus pesanan

        // Panggil model untuk melakukan penghapusan pesanan
        $this->model_invoice->hapus_pesanan($id_pesanan);

        // Redirect kembali ke halaman status pesanan
        redirect('admin/pengiriman/index');
    }
}
