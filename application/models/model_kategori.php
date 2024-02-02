<?php

class Model_kategori extends CI_Model{
    public function data_pakaian_pria(){
        return $this->db->get_where('tb_barang',array('kategori'=>'Batik Pria'));
    }
    public function data_pakaian_wanita(){
        return $this->db->get_where('tb_barang',array('kategori'=>'Batik Wanita'));
    }
}

?>