<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['topfivebydiv'] = $this->_doc_almost_expired_topfivedivisi();
        // $data['docbyjenisdoc'] = $this->_doc_almostexpired_byjenisdok();
        // $data['docbydiv'] = $this->_doc_bydivisi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_noclosing');
        $this->load->view('templates/plugin_chart');
        $this->load->view('admin/areachart', $data);
        $this->load->view('templates/closing');
    }

    private function _doc_almost_expired_topfivedivisi()
    {
        $sql = "SELECT t.Jd, v.divisishort 
                FROM (
                    SELECT 
                        COUNT(d.id) AS Jd, u.divisi_id
                    FROM dokumen d, `user` u  
                    WHERE u.id=d.user_id AND (NOW() > (d.tgl_berlaku + INTERVAL 1 DAY)) 
                        AND (NOW() > (d.tgl_kadaluarsa - INTERVAL 7 DAY)) AND d.is_reminding = 1
                    GROUP BY u.divisi_id
                ) t, divisi v
                WHERE v.id=t.divisi_id 
                ORDER BY t.Jd DESC LIMIT 5";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    private function _doc_almostexpired_byjenisdok()
    {
        $sql = "SELECT 
                    COUNT(d.id) AS Jd, u.nama_dokumen
                FROM dokumen d, jenis_dokumen u  
                WHERE u.id=d.jenisdokumen_id  AND (NOW() > (d.tgl_berlaku + INTERVAL 1 DAY)) 
                    AND (NOW() > (d.tgl_kadaluarsa - INTERVAL 7 DAY)) AND d.is_reminding = 1
                GROUP BY d.jenisdokumen_id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    private function _doc_all()
    {
        $sql = "SELECT 
                    COUNT(d.id) AS Jd
                FROM dokumen d, `user` u, divisi v
                WHERE u.id=d.user_id AND v.id=u.divisi_id AND (NOW() > (d.tgl_berlaku + INTERVAL 1 DAY)) 
                    AND d.is_reminding = 1
                GROUP BY u.divisi_id ORDER BY COUNT(d.id) DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    private function _doc_bydivisi()
    {
        $sql = "SELECT 
                    COUNT(d.id) AS Jd, u.divisi_id, v.divisishort
                FROM dokumen d, `user` u, divisi v
                WHERE u.id=d.user_id AND v.id=u.divisi_id AND (NOW() > (d.tgl_berlaku + INTERVAL 1 DAY)) 
                    AND d.is_reminding = 1
                GROUP BY u.divisi_id ORDER BY COUNT(d.id) DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses diubah!</div>');
    }
}
