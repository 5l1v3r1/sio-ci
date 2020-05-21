<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengguna extends CI_Model
{

    public function getAllPengguna()
    {
        $this->db->select('*');
        return $this->db->from('tb_user')
            ->join('tb_akses', 'tb_user.akses=tb_akses.akses_id')
            ->join('tb_kelas', 'tb_user.kelas=tb_kelas.id_kelas')
            ->get()
            ->result();
    }

    public function tambahPengguna()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'hp' => $this->input->post('hp', true),
            'jk' => $this->input->post('jk', true),
            'kelas' => $this->input->post('kelas', true),
            'akses' => $this->input->post('akses', true),
            'dibuat' => time(),
        );
        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Ditambahkan</div>');
        redirect('pengguna');
    }

    public function editPengguna()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'hp' => $this->input->post('hp', true),
            'jk' => $this->input->post('jk', true),
            'kelas' => $this->input->post('kelas', true),
            'akses' => $this->input->post('akses', true),
        );
        $this->db->where('id_user', $this->input->get('id'));
        $this->db->update('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Diubah</div>');
        redirect('pengguna');
    }

    public function hapusPengguna()
    {
        $this->db->where('id_user', $this->input->get('id'));
        $this->db->delete('tb_user');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna Dihapus</div>');
        redirect('pengguna');
    }

    public function getPenggunaById()
    {
        return $this->db->get_where('tb_user', ['id_user' => $this->input->get('id')])->row_array();
    }

    public function editProfile()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'jk' => $this->input->post('jk', true),
            'kelas' => $this->input->post('kelas', true),
            'hp' => $this->input->post('hp', true),
        );
        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->update('tb_user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Profile Diubah</div>');
        redirect('dashboard');
    }
}
                        
/* End of file M_Pengguna.php */
