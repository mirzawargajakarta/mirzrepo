<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title']   = 'Pendaftaran';        
        $this->load->view('members/daftar_satu', $data);
    }

    function _index()
    {
		$data['title'] = 'Dokumen Aktif';
        $data['user'] = 'ahmad mirza';

        $this->form_validation->set_rules('jenisdokumen', 'Jenis Dokumen', 'required');
        $this->form_validation->set_rules('nodokumen', 'No Dokumen', 'required');
        $this->form_validation->set_rules('titledokumen', 'Titel Dokumen', 'required');
        $this->form_validation->set_rules('tglberlaku', 'Tanggal Berlaku', 'required');
        $this->form_validation->set_rules('tglberakhir', 'Tanggal Berakhir', 'required');

        $data['jenisdoks']      = $this->_getJenisDokumen();
        $data['error_upload']   = '';
        
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('dokumen/dokumen_tambah', $data);
        $this->load->view('templates/footer_noclosing');
        $this->load->view('templates/plugin_datepicker', $data);
        $this->load->view('dokumen/dokumen_tambah_js', $data);
        $this->load->view('templates/closing');
		
    }

	public function simpan()
    {
        $this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('hasilProduk', 'Hasil Produk', 'required');
        $this->form_validation->set_rules('jumlahproduksi', 'Jumlah Produksi per Tahun', 'required');
        $this->form_validation->set_rules('satuanproduksi', 'Satuan Produksi', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Usaha', 'required');
        $this->form_validation->set_rules('namausaha', 'Nama Usaha', 'required');
        $this->form_validation->set_rules('berdiri', 'Tanggal Pendirian', 'required');
        $this->form_validation->set_rules('jumkaryawan', 'Jumlah Karyawan', 'required');
        $this->form_validation->set_rules('alamatusaha', 'Alamat Tempat Usaha', 'required');
        $this->form_validation->set_rules('propinsi', 'Propinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
        $this->form_validation->set_rules('emailusaha', 'Email Usaha', 'required');
        $this->form_validation->set_rules('nohpusaha', 'Nomor HP Usaha', 'required');
        $this->form_validation->set_rules('kodearea', 'Kode area telepon', 'required');
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('namapic', 'Nama PIC', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('emailpic', 'Email', 'required');
        $this->form_validation->set_rules('nohppic', 'Nomor HP', 'required');

        if ($this->form_validation->run() == false) {
            $data['title']   = 'Pendaftaran';
            $this->load->view('members/daftar_satu', $data);
        } else { //validasi OK

            $datatoinsert = array(
                'kategori'   		=> $this->input->post('kategori'),
                'hasil'        		=> $this->input->post('hasilProduk'),
                'kapasitas_jumlah'  => $this->input->post('jumlahproduksi'),
                'kapasitas_sat'     => $this->input->post('satuanproduksi'),
                'jenis'    			=> $this->input->post('jenis'),
                'namausaha'        	=> $this->input->post('namausaha'),
                'berdiri'        	=> $this->input->post('berdiri'),
                'karyawan_jumlah'   => $this->input->post('jumkaryawan'),
                'alamat'        	=> $this->input->post('alamatusaha'),
                'propinsi'        	=> $this->input->post('propinsi'),
                'kabupaten'        	=> $this->input->post('kabupaten'),
                'kodepos'       	=> $this->input->post('kodepos'),
                'email_usaha'       => $this->input->post('emailusaha'),
                'nohp_usaha'        => $this->input->post('nohpusaha'),
                'kodeareatelpkantor'	=> $this->input->post('kodearea'),
                'notelpkantor'      => $this->input->post('notelp'),
                'nama'        		=> $this->input->post('namapic'),
                'tempatlahir'       => $this->input->post('tempatlahir'),
                'tgllahir'        	=> $this->input->post('tgllahir'),
                'sex'        		=> $this->input->post('sex'),
                'email_pic'        	=> $this->input->post('emailpic'),
                'nohp_pic'        	=> $this->input->post('nohppic')
            );
            $this->db->insert('members', $datatoinsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terima Kasih, Data Berhasil Disimpan!</div>');
            redirect('members');
        }
    }

    private function _getJenisDokumen()
    {
        $sql = "SELECT id, nama_dokumen
                FROM jenis_dokumen ORDER BY nama_dokumen";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function getfile($id)
    {
        $this->load->helper('download');
        $user_id    = $this->session->userdata('user_id');
        $dok        = $this->db->get_where('dokumen', ['id' => $id, 'user_id' => $user_id])->row_array();
        $path       = './assets/binfile/docsoftcopy/';
        $filepath   = $path.$dok['doc_softcopy'];
        force_download($filepath,NULL,TRUE);
    }

    public function detail($id)
    {
        $user_id            = $this->session->userdata('user_id');
        $data['title']      = 'Dokumen Aktif';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu']       = $this->db->get('user_menu')->result_array();
        $dok                = $this->db->get_where('dokumen', ['id' => $id, 'user_id' => $user_id])->row_array();
        $data['dok']        = $dok;
        $data['jenisdoks']  = $this->_getJenisDokumen();

        $this->form_validation->set_rules('jenisdokumen', 'Jenis', 'required');
        $this->form_validation->set_rules('nodokumen', 'Nomor Dokumen', 'required',array('required' => 'Nomor Dokumen Tidak boleh kosong'));
        $this->form_validation->set_rules('tglberlaku', 'Tanggal Berlaku', 'required');
        $this->form_validation->set_rules('tglberakhir', 'Tanggal Berakhir', 'required');

        if ($this->form_validation->run() == false) {
            writelog('View Detail Dokumen','doc_id|'.$id);
            $data['error_upload']   = '';
            //======================no2
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokumen/dokumen_detail', $data); //===========> views
            $this->load->view('templates/footer_noclosing');
            $this->load->view('templates/plugin_datepicker', $data);
            $this->load->view('dokumen/dokumen_tambah_js', $data);//===========> views
            $this->load->view('templates/closing');
            //======================eof no2
        } else {
            $isremind = ($this->input->post('isremind') !== null) ? '1' : '0';
            $datatoupdate = array(
                'jenisdokumen_id'   => $this->input->post('jenisdokumen'),
                'no_dokumen'        => $this->input->post('nodokumen'),
                'title_dokumen'     => $this->input->post('titledokumen'),
                'tgl_berlaku'       => $this->input->post('tglberlaku'),
                'tgl_kadaluarsa'    => $this->input->post('tglberakhir'),
                'keterangan'        => $this->input->post('keterangan'),
                'is_reminding'      => $isremind
            );
            // cek jika ada file yang akan diupload
            $upload_image = $_FILES['softcopy']['name'];
            if ($upload_image) {
                $path                       = './assets/binfile/docsoftcopy/';                
                $config['allowed_types']    = 'jpg|png|jpeg|pdf|doc|docx|xlx|xlxs';
                $config['max_size']         = '2048';
                $config['file_name']        = 'dok_engat_'.time().session_id();
                $config['overwrite']        = true;
                $config['upload_path']      = $path;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('softcopy')) {
                    $oldfilepath            = $path.$dok['doc_softcopy'];
                    unlink($oldfilepath);// hapus file lama dulu 
                    $new_softcopy = $this->upload->data('file_name');
                    $datatoupdate['doc_softcopy']  = $new_softcopy;
                    //======================no1
                    $this->db->where('id', $id);
                    $this->db->update('dokumen', $datatoupdate);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen Telah di update</div>');
                    writelog('Edit dokumen','doc_id|'.$id);
                    redirect('dokumen');
                    //======================eof no1
                } else {
                    $data['error_upload']   = $this->upload->display_errors();
                    //======================no2
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('templates/topbar', $data);
                    $this->load->view('dokumen/dokumen_detail', $data); //===========> views
                    $this->load->view('templates/footer_noclosing');
                    $this->load->view('templates/plugin_datepicker', $data);
                    $this->load->view('dokumen/dokumen_tambah_js', $data);//===========> views
                    $this->load->view('templates/closing');
                    //======================eof no2
                }
            } else {
                //======================no1
                $this->db->where('id', $id);
                $this->db->update('dokumen', $datatoupdate);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen Telah di update</div>');
                writelog('Edit dokumen','doc_id|'.$id);
                redirect('dokumen');
                //======================eof no1
            }            
        }
    }

    public function hapus($id)
    {
        $user_id            = $this->session->userdata('user_id');
        $dok                = $this->db->get_where('dokumen', ['id' => $id, 'user_id' => $user_id])->row_array();
        $path               = './assets/binfile/docsoftcopy/';
        $oldfilepath        = $path.$dok['doc_softcopy'];
        unlink($oldfilepath);// hapus file lama dulu

        $this->db->delete('dokumen', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen Dihapus!</div>');
        writelog('Hapus dokumen','doc_id|'.$id.'|pathfile|'.$oldfilepath);
        redirect('dokumen');
    }

    public function tambahdata()
    {
        $data['title'] = 'Dokumen Aktif';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenisdokumen', 'Jenis Dokumen', 'required');
        $this->form_validation->set_rules('nodokumen', 'No Dokumen', 'required');
        $this->form_validation->set_rules('titledokumen', 'Titel Dokumen', 'required');
        $this->form_validation->set_rules('tglberlaku', 'Tanggal Berlaku', 'required');
        $this->form_validation->set_rules('tglberakhir', 'Tanggal Berakhir', 'required');

        $data['jenisdoks']      = $this->_getJenisDokumen();
        $data['error_upload']   = '';
        if ($this->form_validation->run() == false) {
            
             //======================no2
            $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokumen/dokumen_tambah', $data);
            $this->load->view('templates/footer_noclosing');
            $this->load->view('templates/plugin_datepicker', $data);
            $this->load->view('dokumen/dokumen_tambah_js', $data);
            $this->load->view('templates/closing');
            //======================eof no2
        } else {
            $isremind = ($this->input->post('isremind') !== null) ? '1' : '0';
            $datatoinsert = array(
                'jenisdokumen_id'   => $this->input->post('jenisdokumen'),
                'no_dokumen'        => $this->input->post('nodokumen'),
                'title_dokumen'     => $this->input->post('titledokumen'),
                'tgl_berlaku'       => $this->input->post('tglberlaku'),
                'tgl_kadaluarsa'    => $this->input->post('tglberakhir'),
                'keterangan'        => $this->input->post('keterangan'),
                'is_reminding'      => $isremind,
                'user_id'           => $this->session->userdata('user_id')
            );
            // cek jika ada file yang akan diupload
            $upload_image = $_FILES['softcopy']['name'];
            if ($upload_image) {
                $path                       = './assets/binfile/docsoftcopy/';                
                $config['allowed_types']    = 'jpg|png|jpeg|pdf|doc|docx|xlx|xlxs';
                $config['max_size']         = '2048';
                $config['file_name']        = 'dok_engat_'.time().session_id();
                $config['overwrite']        = true;
                $config['upload_path']      = $path;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('softcopy')) {
                    $new_softcopy = $this->upload->data('file_name');
                    $datatoinsert['doc_softcopy']  = $new_softcopy;     
                    $this->db->insert('dokumen', $datatoinsert);               
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen Berhasil Ditambahkan!</div>');                     
                    $lastid = get_justinserted_id();
                    writelog('Tambah dokumen','doc_id|'.$lastid.'|pathfile|'.$new_softcopy);
                    redirect('dokumen');                 
                } else {
                    $data['error_upload']   = $this->upload->display_errors();
                    //======================no2
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('templates/topbar', $data);
                    $this->load->view('dokumen/dokumen_tambah', $data);
                    $this->load->view('templates/footer_noclosing');
                    $this->load->view('templates/plugin_datepicker', $data);
                    $this->load->view('dokumen/dokumen_tambah_js', $data);
                    $this->load->view('templates/closing');
                    //======================eof no2
                }
            } else {
                $this->db->insert('dokumen', $datatoinsert);               
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Dokumen Berhasil Ditambahkan!</div>');                     
                $lastid = get_justinserted_id();
                writelog('Tambah dokumen','doc_id|'.$lastid.'|pathfile|./assets/binfile/docsoftcopy/');
                redirect('dokumen');
            }
                        
        }
    }
}
