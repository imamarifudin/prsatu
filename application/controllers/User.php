<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $datacontent['title'] = 'Profil';
        $data['content'] = $this->load->view('user/index', $datacontent, TRUE);
        $data['title'] = 'Halaman Profil | GIS PBB';
        $this->load->view('layouts/admin/html', $data);
    }

    public function ubahProfil()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $datacontent['title'] = 'Ubah Profil';
            $data['content'] = $this->load->view('user/ubah-profil', $datacontent, TRUE);
            $data['title'] = 'Halaman Ubah Profil | GIS PBB';
            $this->load->view('layouts/admin/html', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $datacontent['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-check"></i> Sukses! </h4> 
                Profil Anda Telah di Perbarui
                </div>
                '
            );
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        $datacontent['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $datacontent['title'] = 'Ubah Password';
            $data['content'] = $this->load->view('user/ubah-password', $datacontent, TRUE);
            $data['title'] = 'Halaman Ubah Password | GIS PBB';
            $this->load->view('layouts/admin/html', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $datacontent['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fa fa-exclamation-triangle"></i> Tidak Sukses! </h4> 
                    Password Saat Ini Salah
                    </div>
                    '
                );
                redirect('user/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-exclamation-triangle"></i> Tidak Sukses! </h4> 
                        Password Tidak Boleh Sama Dengan Password Saat Ini
                        </div>
                        '
                    );
                    redirect('user/ubahPassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="fa fa-check"></i> Sukses! </h4> 
                        Password telah berubah
                        </div>
                        '
                    );
                    redirect('user');
                }
            }
        }
    }
}
