<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function proses_login($username, $password) {
        $result = $this->db->query("SELECT * FROM tb_login WHERE username = '" . $username . "' AND password = '" . md5($password) . "'");

        return $result->result_array();
    }
}

/* End of file M_login.php */