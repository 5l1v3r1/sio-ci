<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Kelas extends CI_Model
{

    public function getAllKelas()
    {
        return $this->db->get('tb_kelas')->result();
    }

    public function getKelasById()
    {
        return $this->db->get_where('tb_kelas', ['id_kelas' => $this->input->get('id')])->row_array();
    }

    public function hapusKelas()
    {
        $this->db->where('id_kelas', $this->input->get('id'));
        $this->db->delete('tb_kelas');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Kelas Dihapus</div>');
        redirect('kelas');
    }

    public function editKelas()
    {
        $data = array(
            'kelas' => $this->input->post('kelas', true)
        );
        $this->db->where('id_kelas', $this->input->get('id'));
        $this->db->update('tb_kelas', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Kelas Diubah</div>');
        redirect('kelas');
    }
}
                        
/* End of file M_Kelas.php */
