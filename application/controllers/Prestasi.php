<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();

        $role = $this->session->userdata('role');

        if($role == 0) {
            // Jika login sebagai admin
        } else {
            // Jika login bukan admin

            redirect('nilai');
        }
    }

    public function cek_log($redirect1, $redirect2) {
        if($this->session->has_userdata('logged_in')) {
            if($redirect1 != '') {
                redirect($redirect1);
            }
        } else {
            if($redirect2 != '') {
                redirect($redirect2);
            }
        }
    }

    public function index() {
        $this->cek_log('', 'admin/login');
        
        $parser['data_prestasi'] = $this->crud->semua_data('prestasi');
        $this->load->view('prestasi/index', $parser);
    }

    public function tambah_prestasi() {
        $this->cek_log('', 'admin/login');

        $parser['data_pendaftaran'] = $this->crud->semua_data('pendaftaran');
        $this->load->view('prestasi/tambah', $parser);
    }

    public function proses_tambah_prestasi() {
        $this->cek_log('', 'admin/login');

        $fk_id_pendaftaran = $this->input->post('fk_id_pendaftaran');
        $tingkatan = $this->input->post('tingkatan');
        $nama_prestasi = $this->input->post('nama_prestasi');

        $prestasi_baru = array(
            'id_prestasi' => '',
            'fk_id_pendaftaran' => $fk_id_pendaftaran,
            'tingkatan' => $tingkatan,
            'nama_prestasi' => $nama_prestasi
        );

        $id_prestasi = $this->crud->tambah('prestasi', $prestasi_baru);

        if($id_prestasi) {
            $this->session->set_flashdata('prestasi_sukses', 'Prestasi berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('prestasi_gagal', 'Prestasi gagal ditambahkan.');
        }

        redirect('prestasi');
    }

    public function perbarui_prestasi($id_prestasi) {
        $this->cek_log('', 'admin/login');

        $parser['prestasi'] = $this->crud->detail_data('prestasi', array('id_prestasi' => $id_prestasi));
        $parser['data_pendaftaran'] = $this->crud->semua_data('pendaftaran');

        $this->load->view('prestasi/perbarui', $parser);
    }

    public function proses_perbarui_prestasi() {
        $this->cek_log('', 'admin/login');

        $id_prestasi = $this->input->post('id_prestasi');
        $fk_id_pendaftaran = $this->input->post('fk_id_pendaftaran');
        $tingkatan = $this->input->post('tingkatan');
        $nama_prestasi = $this->input->post('nama_prestasi');

        $prestasi_baru = array(
            'fk_id_pendaftaran' => $fk_id_pendaftaran,
            'tingkatan' => $tingkatan,
            'nama_prestasi' => $nama_prestasi
        );

        $berhasil_diperbarui = $this->crud->perbarui('prestasi', $prestasi_baru, array('id_prestasi' => $id_prestasi));

        if($berhasil_diperbarui) {
            $this->session->set_flashdata('prestasi_sukses', 'Prestasi berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('prestasi_gagal', 'Prestasi gagal diperbarui.');
        }

        redirect('prestasi');
    }

    public function hapus_prestasi($id_prestasi) {
        $this->cek_log('', 'admin/login');

        $parser['prestasi'] = $this->crud->detail_data('prestasi', array('id_prestasi' => $id_prestasi));

        $this->load->view('prestasi/hapus', $parser);
    }

    public function proses_hapus_prestasi() {
        $this->cek_log('', 'admin/login');
        
        $id_prestasi = $this->input->post('id_prestasi');
        
        $berhasil_dihapus = $this->crud->hapus('prestasi', array('id_prestasi' => $id_prestasi));

        if($berhasil_dihapus) {
            $this->session->set_flashdata('prestasi_sukses', 'Prestasi berhasil dihapus.');
        } else {
            $this->session->set_flashdata('prestasi_gagal', 'Prestasi gagal dihapus.');
        }

        redirect('prestasi');
    }
}
?>