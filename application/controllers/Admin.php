<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('UserModel', 'Model');
    }

    public function index()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $datacontent['title'] = 'Beranda';
        $data['content'] = $this->load->view('admin/index', $datacontent, TRUE);
        $data['title'] = 'Halaman Beranda | GIS PBB';
        $this->load->view('layouts/admin/html', $data);
    }

    public function tambahUser()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $datacontent['title'] = 'Tambah User';
            $data['content'] = $this->load->view('admin/tambah-user', $datacontent, TRUE);
            $data['title'] = 'Halaman Tambah User | GIS PBB';
            $this->load->view('layouts/admin/html', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-check"></i> Sukses! </h4> 
                Data Sukses di Tambah
                </div>
                '
            );
            redirect('admin/listUser');
        }
    }

    public function listUser()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $datacontent['url'] = 'admin/listUser';
        $datacontent['title'] = 'Data User';
        $datacontent['datatable'] = $this->Model->get();
        $data['content'] = $this->load->view('admin/list-user', $datacontent, TRUE);
        $data['title'] = 'Halaman List User | GIS PBB';
        $this->load->view('layouts/admin/html', $data);
    }

    public function hapusUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-check"></i> Sukses! </h4> 
            Data Sukses di Hapus
            </div>
            '
        );
        redirect('admin/listUser');
    }
}
