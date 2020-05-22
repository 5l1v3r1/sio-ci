<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('M_Surat', 'surat');
    }

    private function _kelas()
    {
        return $this->db->get('tb_kelas')->result();
    }

    public function _jumlah_surat()
    {
        return $this->db->count_all('tb_surat');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 2) {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Surat Saya',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $data['main'] = $this->db->get_where('tb_surat', ['nama' => $data['user']['nama']])->result();
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_data2', $data);
            $this->load->view('templates/dashboard/v_footer');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Data Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'surat' => $this->surat->getAllSurat(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_data', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function kirim()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Kirim Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'kelas' => $this->_kelas(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim|min_length[5]');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard/v_header', $data);
                $this->load->view('templates/dashboard/v_navbar', $data);
                $this->load->view('templates/dashboard/v_sidebar', $data);
                $this->load->view('templates/dashboard/v_crumb', $data);
                $this->load->view('surat/v_kirim', $data);
                $this->load->view('templates/dashboard/v_footer');
            } else {
                $this->surat->kirimSurat();
            }
        }
    }

    public function lihat()
    {
        if ($this->session->userdata('akses') == 1) {
            redirect('dashboard');
        } else {
            $session = $this->session->userdata('id');
            $data = array(
                'title' => 'Lihat Surat',
                'subtitle' => 'Menu Utama',
                'user' => $this->db->get_where('tb_user', ['id_user' => $session])->row_array(),
                'jumlah_surat' => $this->_jumlah_surat(),
            );
            $this->load->view('templates/dashboard/v_header', $data);
            $this->load->view('templates/dashboard/v_navbar', $data);
            $this->load->view('templates/dashboard/v_sidebar', $data);
            $this->load->view('templates/dashboard/v_crumb', $data);
            $this->load->view('surat/v_lihat', $data);
            $this->load->view('templates/dashboard/v_footer');
        }
    }

    public function hapus()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->hapusSurat();
        }
    }

    public function setuju()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->setujuSurat();
        }
    }

    public function batal()
    {
        if ($this->session->userdata('akses') == 2) {
            redirect('dashboard');
        } else {
            $this->surat->batalSurat();
        }
    }
}
        
    /* End of file  Surat.php */
