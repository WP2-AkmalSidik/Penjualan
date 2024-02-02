<?php
class model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $subtotal = $this->input->post('subtotal');
        $nama = $this->input->post('nama');
        $no_tlp = $this->input->post('no_tlp');
        $pengiriman = $this->input->post('pengiriman');
        // $pembayaran = $this->input->post('pembayaran');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $invoice = array(
            'subtotal' => $subtotal,
            'nama' => $nama,
            'no_tlp' => $no_tlp,
            'pengiriman' => $pengiriman,
            // 'pembayaran' => $pembayaran,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('y'))),
            'username' => $username,
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }
    public function tampil_data()
    {
        $result =  $this->db->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function hapus_invoice($id_invoice)
    {
        // Hapus entri pesanan terkait di tabel 'tb_pesanan'
        $this->db->where('id_invoice', $id_invoice);
        $this->db->delete('tb_pesanan');

        // Hapus invoice dari tabel 'tb_invoice'
        $this->db->where('id', $id_invoice);
        $this->db->delete('tb_invoice');
    }
    public function update_payment_data($id_invoice, $data)
    {
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('tb_pesanan', $data);
    }
    // Di dalam model_invoice.php
    public function get_all_pesanan()
    {
        $this->db->select('tb_pesanan.*, tb_invoice.nama AS nama_pemesan');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
        return $this->db->get()->result();
    }
    public function update_status_pesanan($id_pesanan, $new_status)
    {
        $data = array('status' => $new_status);
        $this->db->where('id', $id_pesanan);
        $this->db->update('tb_pesanan', $data);
    }
    public function get_all_pesanan_user($username)
    {
        $this->db->select('tb_pesanan.*, tb_invoice.username');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id', 'left');
        $this->db->where('tb_invoice.username', $username); // Sesuaikan dengan kolom username di tb_invoice

        return $this->db->get()->result();
    }
    public function hapus_pesanan($id_pesanan) {
        // Hapus pesanan dari tabel tb_pesanan berdasarkan ID
        $this->db->where('id', $id_pesanan);
        $this->db->delete('tb_pesanan');
        // Pastikan fungsi ini menghapus pesanan dengan benar berdasarkan ID yang diberikan
    }
}
