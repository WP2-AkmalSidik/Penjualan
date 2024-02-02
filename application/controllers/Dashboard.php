<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            <strong>Anda Belum Login!</strong> Silahkan login terlebih dahulu.
            </div>');
            redirect('auth/login');
        }
        $this->load->model('model_komentar');
    }
    public function tambah_keranjang($id)
    {
        // Mengambil informasi barang dari database berdasarkan ID
        $barang = $this->model_barang->find($id);

        // Mengambil data ukuran dan jumlah yang di-post dari form
        $ukuran = $this->input->post('ukuran');
        $jumlah = $this->input->post('jumlah');

        // Membuat array data barang yang akan dimasukkan ke keranjang
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => $jumlah,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
            'options' => array('ukuran' => $ukuran) // Menambahkan informasi ukuran ke dalam options
        );

        // Menambahkan barang ke keranjang belanja
        $this->cart->insert($data);

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        redirect('welcome');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome/index');
    }
    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    public function proses_pesanan()
    {
        $username = $this->session->userdata('username');
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $id_invoice = $this->db->insert_id(); // Ambil ID invoice setelah berhasil di-insert ke database
            redirect('dashboard/upload_payment/' . $id_invoice); // Redirect ke upload_payment dengan ID invoice
        } else {
            echo "Maaf Pesanan Anda Gagal diproses";
        }
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function upload_payment($id_invoice)
    {
        $data['id_invoice'] = $id_invoice;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pembayaran', $data); // Pastikan mengirimkan data ID invoice ke view
        $this->load->view('templates/footer');
    }


    public function process_payment()
    {
        $id_invoice = $this->input->post('id_invoice'); // Pastikan mendapatkan ID invoice dengan benar
        $config['upload_path'] = './upload/bukti/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_bayar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pembayaran', $error);
            $this->load->view('templates/footer');
        } else {
            $pembayaran = $this->input->post('pembayaran');
            $data = array(
                'pembayaran' => $pembayaran,
                'bukti_bayar' => $this->upload->data('file_name')
            );
            $data['status'] = '0'; // Atau nilai status lain sesuai kebutuhan
            $this->model_invoice->update_payment_data($id_invoice, $data);
            $this->session->set_flashdata('success_message', '<strong>Pesanan berhasil diproses!</strong> Silahkan cek pesanan secara berkala di status pengiriman!');
            redirect('welcome/index');
        }
    }
    public function status()
    {
        // Dalam controller atau bagian yang sesuai
        $username = $this->session->userdata('username'); // Mendapatkan username dari sesi login
        $data['pesanan'] = $this->model_invoice->get_all_pesanan_user($username);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('status_pesanan_user', $data);
        $this->load->view('templates/footer');
    }
    public function showKomen()
    {
        $this->load->model('model_komentar');
        $data['comments'] = $this->model_komentar->getCommentsWithReplies();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komentar', $data);
        $this->load->view('templates/footer');
    }
    public function addComment()
    {
        $user_id = $this->session->userdata('id');

        $this->db->select('tb_user.role_id');
        $this->db->from('tb_user');
        $this->db->where('tb_user.id', $user_id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            // $role_id = $result->role_id;

            $data = array(
                'user_id' => $user_id,
                'komentar' => $this->input->post('komentar')
            );

            // $data['role_id'] = $role_id;

            if (!empty($data['komentar'])) {
                $this->load->model('Model_komentar'); // Load model
                $this->Model_komentar->addComment($data);
                redirect('dashboard/showKomen');
            } else {
                echo "Mohon lengkapi form komentar!";
            }
        } else {
            echo "User tidak ditemukan!";
        }
    }
    public function addReply()
    {
        $user_id = $this->session->userdata('id'); // Ambil ID pengguna dari sesi
        $data = array(
            'id_komentar' => $this->input->post('comment_id'),
            'user_id' => $user_id,
            'balasan' => $this->input->post('reply')
        );
        $this->model_komentar->addReply($data);
        redirect('dashboard/showKomen');
    }
    public function update_status($id_pesanan, $status) {
        // Lakukan validasi admin di sini
        // Pastikan hanya admin yang berhak untuk melakukan update status

        // Lakukan update status pesanan menggunakan model_invoice
        $this->model_invoice->update_status_pesanan($id_pesanan, $status);

        // Redirect kembali ke halaman status pesanan
        redirect('dashboard/status');
    }
    public function grafik()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('grafik');
        $this->load->view('templates/footer');
    }
}
