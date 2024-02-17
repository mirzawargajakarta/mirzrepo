<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Engat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $today = date("Y-m-d");
        $users  = $this->_getAllUserHasDocToRemind($today);
        
        foreach ($users as $user) {
            $userid = $user['user_id'];
            $email = $user['email'];
            $emailcc = (is_null($user['emailcc']))?'':$user['emailcc'];
            $doks  = $this->_getDocumentByUser($userid, $today);
            $data['today'] = $today;
            $data['dokumens'] = $doks;
            $msg = $this->load->view('email/emailtemplate', $data, true);
            $this->_sendEmail($email, $emailcc, 'ok', $msg);
        }
    }

    private function _sendEmail($sendto, $emailcc, $status, $msg)
    {
        $is_cc = ($emailcc == '') ? false : true;
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'infosjengat@sarana-jaya.co.id',
            'smtp_pass' => 'sjengat2022',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('infosjengat@sarana-jaya.co.id', 'SJ e-Ngat');
        $this->email->to($sendto);
        if ($is_cc) {
            $emailcckoma   = str_replace(";",",",$emailcc);
            $this->email->cc($emailcckoma);
        }

        if ($status == 'ok') {
            $this->email->subject('SJ e-Ngat : List Masa Berlaku Dokumen');
            $this->email->message($msg);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    private function _getDocumentByUser($user_id, $today)
    {
        $this->load->helper('date');
        $plus60 = dateAfterDay($today, 60);
        $sql = "SELECT 
                    d.id, d.jenisdokumen_id, d.no_dokumen, d.title_dokumen, d.tgl_berlaku, d.tgl_kadaluarsa,
                    d.is_reminding, d.user_id, j.nama_dokumen, u.email, u.name,
                    j.nama_dokumen ,DATEDIFF(tgl_kadaluarsa, '$today') AS Sisa
                FROM dokumen d, jenis_dokumen j, user u
                WHERE d.jenisdokumen_id=j.id AND d.user_id=u.id AND d.user_id='$user_id'
                AND d.is_reminding=1 AND d.tgl_berlaku <= '$today'
                        AND d.tgl_kadaluarsa <= '$plus60'
                        HAVING Sisa > -1
                ORDER BY d.tgl_kadaluarsa, d.id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    private function _getAllUserHasDocToRemind($today)
    {
        $this->load->helper('date');
        $plus1 = dateAfterDay($today, 1);
        $plus2 = dateAfterDay($today, 2);
        $plus3 = dateAfterDay($today, 3);
        $plus4 = dateAfterDay($today, 4);
        $plus5 = dateAfterDay($today, 5);
        $plus6 = dateAfterDay($today, 6);
        $plus7 = dateAfterDay($today, 7);
        $plus14 = dateAfterDay($today, 14);
        $plus30 = dateAfterDay($today, 30);
        $plus60 = dateAfterDay($today, 60);
        /*
        $query = "SELECT 
                    d.id, d.jenisdokumen_id, d.no_dokumen, d.title_dokumen, d.tgl_berlaku, d.tgl_kadaluarsa,
                    d.is_reminding, d.user_id, j.nama_dokumen, u.email, u.name
                FROM dokumen d, jenis_dokumen j, user u
                WHERE d.jenisdokumen_id=j.id AND d.user_id=u.id
                ORDER BY d.tgl_kadaluarsa DESC";
        */
        $sql = "SELECT 
                        d.user_id, u.email, u.emailcc
                    FROM dokumen d, jenis_dokumen j, `user` u
                    WHERE d.jenisdokumen_id=j.id AND d.user_id=u.id AND d.is_reminding=1 AND d.tgl_berlaku <= '$today'
                        AND d.tgl_kadaluarsa IN ('$plus60', '$plus30', '$plus14', '$plus7', '$plus6', '$plus5'
                        , '$plus4', '$plus3', '$plus2', '$plus1', '$today')
                    GROUP BY d.user_id";

        // $query = $this->db->query($sql);
        // if($isviewdata) {
        // 	$result = $query->result_array();
        // $retval	= isset($result[0]) ? $result[0] : $datakosong;
        // } else {
        // 	$result = $query->num_rows();
        // }
        // return $result;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function test()
    {
        
        // $today = date("Y-m-d");
        // $userid = '14';
        // $email = 'ahmad.mirza@sarana-jaya.co.id';
        // $emailcc = '';
        // $doks  = $this->_getDocumentByUser($userid);
        // $data['today'] = $today;
        // $data['dokumens'] = $doks;
        // $msg = $this->load->view('email/emailtemplate', $data, true);
        // $this->_sendEmail($email, $emailcc, 'ok', $msg);
        
        $users  = $this->_getAllUserHasDocToRemind('asdf');
        $today = date("Y-m-d");
        print_r($users);

        // $this->load->helper('date');
        // $today = date("Y-m-d");
        // $plus1 = dateAfterDay($today, 1);
        // $plus2 = dateAfterDay($today, 2);
        // $plus3 = dateAfterDay($today, 3);
        // $plus4 = dateAfterDay($today, 4);
        // $plus5 = dateAfterDay($today, 5);
        // $plus6 = dateAfterDay($today, 6);
        // $plus7 = dateAfterDay($today, 7);
        // $plus14 = dateAfterDay($today, 14);
        // $plus30 = dateAfterDay($today, 30);
        // $plus60 = dateAfterDay($today, 60);

        // echo $plus1;
        // echo '<br />';
        // echo $plus1;
        // echo '<br />';
        // echo $plus2;
        // echo '<br />';
        // echo $plus3;
        // echo '<br />';
        // echo $plus4;
        // echo '<br />';
        // echo $plus5;
        // echo '<br />';
        // echo $plus6;
        // echo '<br />';
        // echo $plus7;
        // echo '<br />';
        // echo $plus14;
        // echo '<br />';
        // echo $plus30;
        // echo '<br />';
        // echo $plus60;
        // echo '<br />';

    }

    public function testemail($tgl='')
    {
        if($tgl=='') {
            $today = date("Y-m-d");//'2022-06-27';//
        } else {
            $today = $tgl;
        }
        $users  = $this->_getAllUserHasDocToRemind($today);
        
        foreach ($users as $user) {
            $userid = $user['user_id'];            
            $email = $user['email'];
            $emailcc = (is_null($user['emailcc']))?'':$user['emailcc'];
            $doks  = $this->_getDocumentByUser($userid, $today);
            $data['today'] = $today;
            $data['dokumens'] = $doks;
            echo $user['email']."<br />".$emailcc."<br />";
            $msg = $this->load->view('email/emailtemplate', $data, true);
            echo $msg."<br />============================batas=================<br />";
        }
    }

    public function testlagi()
    {
        $str1 = "mirza@gmail.com,ajhmad@gmailyahoo.com";
        $str2   = str_replace(";",",",$str1);
        echo $str2;
    }

    public function manual($tglmanual)
    {
        $today = $tglmanual;
        $users  = $this->_getAllUserHasDocToRemind($today);
        
        foreach ($users as $user) {
            $userid = $user['user_id'];
            $email = $user['email'];
            $emailcc = (is_null($user['emailcc']))?'':$user['emailcc'];
            $doks  = $this->_getDocumentByUser($userid, $today);
            $data['today'] = $today;
            $data['dokumens'] = $doks;
            $msg = $this->load->view('email/emailtemplate', $data, true);
            $this->_sendEmail($email, $emailcc, 'ok', $msg);
        }
    }
}
