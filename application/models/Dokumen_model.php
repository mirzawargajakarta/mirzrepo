<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
    public function getDokumen($id)
    {
        $today = date("Y-m-d");
        $query = "SELECT d.id, d.jenisdokumen_id, d.no_dokumen, d.title_dokumen, d.tgl_berlaku, d.tgl_kadaluarsa,
        d.is_reminding, d.user_id, j.nama_dokumen,
        DATEDIFF(d.tgl_kadaluarsa, '$today') AS Sisa
        FROM dokumen d, jenis_dokumen j 
        WHERE d.jenisdokumen_id=j.id AND d.user_id='$id' HAVING Sisa > -1 ORDER BY d.tgl_kadaluarsa";
        return $this->db->query($query)->result_array();
    }

    public function test($id)
    {
        return array('test' => 'asdf' . $id);
    }
}
