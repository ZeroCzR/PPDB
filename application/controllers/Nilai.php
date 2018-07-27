<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
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

    public function cek_admin() {
        $role = $this->session->userdata('role');

        if($role == 0) {
            // Jika login sebagai admin
        } else {
            // Jika login bukan admin

            redirect('nilai');
        }
    }

    public function index() {
        $this->cek_log('', 'admin/login');
        
        $parser['data_nilai'] = $this->crud->semua_data('nilai');
        $this->load->view('nilai/index', $parser);
    }

    public function tambah_nilai() {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $parser['data_pendaftaran'] = $this->crud->semua_data('pendaftaran');
        $this->load->view('nilai/tambah', $parser);
    }

    public function proses_tambah_nilai() {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $fk_id_pendaftaran = $this->input->post('fk_id_pendaftaran');
        $rata_semester = $this->input->post('rata_semester');
        $rata_un = $this->input->post('rata_un');
        $nilai_akhir = ($rata_semester + $rata_un) / 2;

        $nilai_baru = array(
            'id_nilai' => '',
            'fk_id_pendaftaran' => $fk_id_pendaftaran,
            'rata_semester' => $rata_semester,
            'rata_un' => $rata_un,
            'nilai_akhir' => $nilai_akhir
        );

        $id_nilai = $this->crud->tambah('nilai', $nilai_baru);

        if($id_nilai) {
            $this->session->set_flashdata('nilai_sukses', 'Nilai berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('nilai_gagal', 'Nilai gagal ditambahkan.');
        }

        redirect('nilai');
    }

    public function perbarui_nilai($id_nilai) {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $parser['nilai'] = $this->crud->detail_data('nilai', array('id_nilai' => $id_nilai));
        $parser['data_pendaftaran'] = $this->crud->semua_data('pendaftaran');

        $this->load->view('nilai/perbarui', $parser);
    }

    public function proses_perbarui_nilai() {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $id_nilai = $this->input->post('id_nilai');
        $fk_id_pendaftaran = $this->input->post('fk_id_pendaftaran');
        $rata_semester = $this->input->post('rata_semester');
        $rata_un = $this->input->post('rata_un');
        $nilai_akhir = ($rata_semester + $rata_un) / 2;

        $nilai_baru = array(
            'fk_id_pendaftaran' => $fk_id_pendaftaran,
            'rata_semester' => $rata_semester,
            'rata_un' => $rata_un,
            'nilai_akhir' => $nilai_akhir
        );

        $berhasil_diperbarui = $this->crud->perbarui('nilai', $nilai_baru, array('id_nilai' => $id_nilai));

        if($berhasil_diperbarui) {
            $this->session->set_flashdata('nilai_sukses', 'Nilai berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('nilai_gagal', 'Nilai gagal diperbarui.');
        }

        redirect('nilai');
    }

    public function hapus_nilai($id_nilai) {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $parser['nilai'] = $this->crud->detail_data('nilai', array('id_nilai' => $id_nilai));

        $this->load->view('nilai/hapus', $parser);
    }

    public function proses_hapus_nilai() {
        $this->cek_log('', 'admin/login');
        $this->cek_admin();

        $id_nilai = $this->input->post('id_nilai');
        
        $berhasil_dihapus = $this->crud->hapus('nilai', array('id_nilai' => $id_nilai));

        if($berhasil_dihapus) {
            $this->session->set_flashdata('nilai_sukses', 'Nilai berhasil dihapus.');
        } else {
            $this->session->set_flashdata('nilai_gagal', 'Nilai gagal dihapus.');
        }

        redirect('nilai');
    }
}
?>