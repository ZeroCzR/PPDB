<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
	
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

    public function generatePassword($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
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
        
        $parser['data_pendaftaran'] = $this->crud->semua_data('pendaftaran');
        $this->load->view('pendaftaran/index', $parser);
    }

    public function tambah_pendaftaran() {
        $this->cek_log('', 'admin/login');

        $this->load->view('pendaftaran/tambah');
    }

    public function proses_tambah_pendaftaran() {
        $this->cek_log('', 'admin/login');

        $nama_peserta = $this->input->post('nama_peserta');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $nama_wali = $this->input->post('nama_wali');
        $regid = time();
        $origin_password = $this->generatePassword();
        $password = md5($origin_password);

        $pendaftaran_baru = array(
            'id_pendaftaran' => '',
            'nama_peserta' => $nama_peserta,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'asal_sekolah' => $asal_sekolah,
            'nama_wali' => $nama_wali,
            'regid' => $regid,
            'origin_password' => $origin_password,
            'password' => $password
        );

        $id_pendaftaran = $this->crud->tambah('pendaftaran', $pendaftaran_baru);

        if($id_pendaftaran) {
            $this->session->set_flashdata('pendaftaran_sukses', 'Pendaftaran berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('pendaftaran_gagal', 'Pendaftaran gagal ditambahkan.');
        }

        redirect('pendaftaran');
    }

    public function perbarui_pendaftaran($id_pendaftaran) {
        $this->cek_log('', 'admin/login');

        $parser['pendaftaran'] = $this->crud->detail_data('pendaftaran', array('id_pendaftaran' => $id_pendaftaran));

        $this->load->view('pendaftaran/perbarui', $parser);
    }

    public function proses_perbarui_pendaftaran() {
        $this->cek_log('', 'admin/login');

        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $nama_peserta = $this->input->post('nama_peserta');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jenkel = $this->input->post('jenkel');
        $alamat = $this->input->post('alamat');
        $asal_sekolah = $this->input->post('asal_sekolah');
        $nama_wali = $this->input->post('nama_wali');

        $pendaftaran_baru = array(
            'nama_peserta' => $nama_peserta,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenkel' => $jenkel,
            'alamat' => $alamat,
            'asal_sekolah' => $asal_sekolah,
            'nama_wali' => $nama_wali
        );

        $berhasil_diperbarui = $this->crud->perbarui('pendaftaran', $pendaftaran_baru, array('id_pendaftaran' => $id_pendaftaran));

        if($berhasil_diperbarui) {
            $this->session->set_flashdata('pendaftaran_sukses', 'Pendaftaran berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('pendaftaran_gagal', 'Pendaftaran gagal diperbarui.');
        }

        redirect('pendaftaran');
    }

    public function hapus_pendaftaran($id_pendaftaran) {
        $this->cek_log('', 'admin/login');

        $parser['pendaftaran'] = $this->crud->detail_data('pendaftaran', array('id_pendaftaran' => $id_pendaftaran));

        $this->load->view('pendaftaran/hapus', $parser);
    }

    public function proses_hapus_pendaftaran() {
        $this->cek_log('', 'admin/login');
        
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        
        $berhasil_dihapus = $this->crud->hapus('pendaftaran', array('id_pendaftaran' => $id_pendaftaran));

        if($berhasil_dihapus) {
            $this->session->set_flashdata('pendaftaran_sukses', 'Pendaftaran berhasil dihapus.');
        } else {
            $this->session->set_flashdata('pendaftaran_gagal', 'Pendaftaran gagal dihapus.');
        }

        redirect('pendaftaran');
    }
}
?>