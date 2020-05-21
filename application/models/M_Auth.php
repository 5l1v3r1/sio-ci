<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{

    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $data = $this->db->get_where('tb_user', ['username' => $username])->row_array();
        if ($data > 0) {
            if (password_verify($password, $data['password'])) {
                $session = array(
                    'id' => $data['id_user'],
                    'akses' => $data['akses']
                );
                $this->session->set_userdata($session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Password Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>User Tidak Ditemukan</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('akses');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Logout Berhasil</div>');
        redirect('auth');
    }
}
                        
/* End of file M_Auth.php */
