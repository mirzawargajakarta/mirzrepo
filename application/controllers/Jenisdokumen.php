<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenisdokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Jenis Dokumen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jenis_dokumen'] = $this->db->get('jenis_dokumen')->result_array();

        $this->form_validation->set_rules('nama_dokumen', 'Jenis Dokumen', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenisdokumen/index', $data);
            $this->load->view('templates/footer_noclosing');
            $this->load->view('templates/closing');
        } else {
            $this->db->insert('jenis_dokumen', ['nama_dokumen' => $this->input->post('nama_dokumen')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Dokumen Telah Ditambahkan!</div>');
            redirect('jenisdokumen');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('jenis_dokumen', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Dokumen Telah di hapus !</div>');
        redirect('jenisdokumen');
    }

    public function edit($id)
    {
        $data['title'] = 'Jenis Dokumen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['jenisdoks'] = $this->db->get_where('jenis_dokumen', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_dokumen', 'Nama Jenis dokumen', 'required', [
            'required' => 'Tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenisdokumen/editjenisdok', $data);
            $this->load->view('templates/footer_noclosing');
            $this->load->view('templates/closing');
        } else {
            $datatoupdate = array(
                'nama_dokumen' => $this->input->post('nama_dokumen')
            );
            $this->db->where('id', $id);
            $this->db->update('jenis_dokumen', $datatoupdate);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Dokumen Telah di update</div>');
            redirect('jenisdokumen');
        }
    }
}
