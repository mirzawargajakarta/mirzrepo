<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cleanup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $today = date("Y-m-d");
        $number = 1234.56;

// english notation (default)
$number = number_format($number,0,'','');
echo $number;
		
    }

    private function _getDocumentByUser($user_id, $today)
    {
        $this->load->helper('date');
        $plus60 = dateAfterDay($today, 60);
        $sql = "SELECT 
					d.id, d.title_dokumen, 
					d.tgl_berlaku, d.tgl_kadaluarsa, 
					DATEDIFF(d.tgl_kadaluarsa, $today) AS sisa
				FROM dokumen d 
				WHERE d.id IN ( SELECT e.id FROM dokumen e WHERE DATEDIFF(e.tgl_kadaluarsa, $today) < -59);";
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
		
        $sql = "SELECT 
                        d.user_id, u.email, u.emailcc
                    FROM dokumen d, jenis_dokumen j, `user` u
                    WHERE d.jenisdokumen_id=j.id AND d.user_id=u.id AND d.is_reminding=1 AND d.tgl_berlaku <= '$today'
                        AND d.tgl_kadaluarsa IN ('$plus60', '$plus30', '$plus14', '$plus7', '$plus6', '$plus5'
                        , '$plus4', '$plus3', '$plus2', '$plus1', '$today')
                    GROUP BY d.user_id";
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
        
        $users  = $this->_getAllUserHasDocToRemind();
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

    public function testemail()
    {

    }

    public function testlagi()
    {
        $str1 = "mirza@gmail.com,ajhmad@gmailyahoo.com";
        $str2   = str_replace(";",",",$str1);
        echo $str2;
    }
}
