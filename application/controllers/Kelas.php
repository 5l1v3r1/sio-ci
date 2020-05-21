<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_Kelas', 'kelas');
    }

    private function _kelas()
    {
        return $this->db->count_all('tb_surat');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Data Kelas',
                'subtitle' => 'Master',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'kelas' => $this->kelas->getAllKelas(),
                'jumlah_surat' => $this->_kelas()
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('kelas/v_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function hapus()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->kelas->hapusKelas();
        }
    }

    public function edit()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Edit Kelas',
                'subtitle' => 'Master',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'kelas' => $this->kelas->getAllKelas(),
                'jumlah_surat' => $this->_kelas(),
                'getkelas' => $this->kelas->getKelasById(),
            );
            $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('kelas/v_edit', $data);
                $this->load->view('templates/dashboard/v_footer');
            } else {
                $this->kelas->editKelas();
            }
        }
    }
}
        
    /* End of file  Kelas.php */
