<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {
    public function semua_data($tabel) {
        if($tabel == 'nilai') {
            $query = $this->db->order_by("nilai_akhir", "desc");
        }
        
        $query = $this->db->get($tabel);

        return $query->result_array();
    }

    public function detail_data($tabel, $where) {
        $query = $this->db->where($where);
        $query = $this->db->get($tabel);

        return $query->result_array();
    }

    public function tambah($tabel, $data) {
        $tambah = $this->db->insert($tabel, $data);
        $id_baru = $this->db->insert_id();

        return $id_baru;
    }

    public function perbarui($tabel, $data, $kunci) {
        $perbarui = $this->db->update($tabel, $data, $kunci);

        return true;
    }

    public function hapus($tabel, $kunci) {
        $this->db->where($kunci);
        $hapus = $this->db->delete($tabel);

        return true;
    }
}

/* End of file Crud.php */
