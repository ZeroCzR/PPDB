<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    public function proses_login($regid, $password) {
        $result = $this->db->query("SELECT * FROM pendaftaran WHERE regid = '" . $regid . "' AND password = '" . md5($password) . "'");

        return $result->result_array();
    }
}

/* End of file M_dashboard.php */