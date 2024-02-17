<?php 

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function writelog($aktifitas, $catatan='')
{
    $ci         = get_instance();
    $user_id    = $ci->session->userdata('user_id');
    $data       = array(
                    'user_id'   => $user_id,
                    'aktifitas' => $aktifitas,
                    'catatan'   => $catatan
                );
    $ci->db->insert('aktifitaslog', $data);
}

function get_justinserted_id()
{
    $id             = '';
    $ci             = get_instance();
    $lastid_query   = "SELECT LAST_INSERT_ID() AS lastid";
    $query          = $ci->db->query($lastid_query);
    $row            = $query->row();
    if (isset($row))
    {
        $id = $row->lastid;
    }
    return $id;
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
