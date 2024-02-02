<?php
class Model_komentar extends CI_Model
{
    public function getComments()
    {
        $this->db->select('tb_komentar.*, tb_balasan_komentar.balasan');
        $this->db->from('tb_komentar');
        $this->db->join('tb_balasan_komentar', 'tb_komentar.id = tb_balasan_komentar.id_komentar', 'left');
        return $this->db->get()->result_array();
    }

    public function addComment($data)
    {
        return $this->db->insert('tb_komentar', $data);
    }

    public function addReply($data)
    {
        return $this->db->insert('tb_balasan_komentar', $data);
    }
    // Model
    public function getCommentsWithUsernames()
    {
        $this->db->select('tb_komentar.*, tb_user.nama as nama_pengguna');
        $this->db->from('tb_komentar');
        $this->db->join('tb_user', 'tb_komentar.user_id = tb_user.id');
        $query = $this->db->get();
        return $query->result_array();
    }
        // public function getCommentsWithReplies()
        // {
        //     $this->db->select('tb_komentar.*, tb_user.nama as nama_pengguna, tb_balasan_komentar.balasan, tb_balasan_komentar.created_at as created_at_balasan');
        //     $this->db->from('tb_komentar');
        //     $this->db->join('tb_user', 'tb_komentar.user_id = tb_user.id');
        //     $this->db->join('tb_balasan_komentar', 'tb_komentar.id = tb_balasan_komentar.id_komentar', 'left');
        //     $query = $this->db->get();
        //     return $query->result_array();
        // }
    public function getCommentsWithReplies()
{
    $this->db->select('tb_komentar.*, tb_user.nama as nama_pengguna, tb_balasan_komentar.balasan, tb_balasan_komentar.id_balasan as id_balasan_komentar, tb_balasan_komentar.created_at as created_at_balasan');
    $this->db->from('tb_komentar');
    $this->db->join('tb_user', 'tb_komentar.user_id = tb_user.id');
    $this->db->join('tb_balasan_komentar', 'tb_komentar.id = tb_balasan_komentar.id_komentar', 'left');
    $query = $this->db->get();
    return $query->result_array();
}

}
