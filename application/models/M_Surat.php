<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat extends CI_Model
{

    public function getAllSurat()
    {
        $this->db->select('*');
        return $this->db->from('tb_surat')
            ->join('tb_user', 'tb_surat.kelas=tb_user.kelas')
            ->join('tb_kelas', 'tb_surat.kelas=tb_kelas.id_kelas')
            ->get()
            ->result();
    }

    public function kirimSurat()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'hari_tanggal' => $this->input->post('ht', true),
            'kelas' => $this->input->post('kelas', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status' => 0,
        );
        $this->db->insert('tb_surat', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Dikirim</div>');
        redirect('dashboard');
    }

    public function hapusSurat()
    {
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->delete('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Berhasil Hapus</div>');
        redirect('surat');
    }

    public function setujuSurat()
    {
        $data = array(
            'status' => 1
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Disetujui</div>');
        redirect('surat');
    }

    public function batalSurat()
    {
        $data = array(
            'status' => 0
        );
        $this->db->set('status', $data['status']);
        $this->db->where('id_surat', $this->input->get('id'));
        $this->db->update('tb_surat');
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>Surat Dibatalkan</div>');
        redirect('surat');
    }
}
                        
/* End of file M_Surat.php */
