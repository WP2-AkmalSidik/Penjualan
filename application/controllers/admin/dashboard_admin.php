<?php

class Dashboard_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum login !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
    public function showKomen()
    {
        $this->load->model('model_komentar');
        $data['comments'] = $this->model_komentar->getCommentsWithReplies();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/komentar', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function addComment()
    {
        $this->load->model('model_komentar');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'komentar' => $this->input->post('komentar')
        );
        $this->model_komentar->addComment($data);
        redirect('admin/dashboard_admin/showKomen');
    }

    public function addReply()
    {
        $this->load->model('model_komentar');
        $data = array(
            'id_komentar' => $this->input->post('comment_id'),
            'user_id' => $this->session->userdata('id'),
            'balasan' => $this->input->post('reply')
        );
        $this->model_komentar->addReply($data);
        redirect('admin/dashboard_admin/showKomen');
    }
}
