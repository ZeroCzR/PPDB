<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function cek_log($redirect1, $redirect2) {
        if($this->session->has_userdata('user_in')) {
            if($redirect1 != '') {
                redirect($redirect1);
            }
        } else {
            if($redirect2 != '') {
                redirect($redirect2);
            }
        }
    }

    public function index()
	{
        $this->cek_log('dashboard/input_nilai', 'dashboard/login');
    }

    public function input_sukses() {
        $cek_data = $this->crud->detail_data('nilai', array('fk_id_pendaftaran' => $this->session->userdata('id_pendaftaran')));

        if(count($cek_data) <= 0) {
            redirect('dashboard/input_input');
        }

        $this->load->view('dashboard/sukses');
    }

    public function input_nilai() {
        $cek_data = $this->crud->detail_data('nilai', array('fk_id_pendaftaran' => $this->session->userdata('id_pendaftaran')));

        if(count($cek_data) > 0) {
            redirect('dashboard/input_sukses');
        }

        $parser['data_pendaftaran'] = $this->crud->detail_data('pendaftaran', array('id_pendaftaran' => $this->session->userdata('id_pendaftaran')));

        $this->load->view('dashboard/tambah', $parser);
    }

    public function proses_tambah_nilai() {
        $this->cek_log('', 'dashboard/login');

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

        redirect('dashboard/input_nilai');
    }

    public function login() {
        $this->load->view('dashboard/index');
    }

    public function proses_login() {
        $regid = $this->input->post('regid');
        $password = $this->input->post('password');

        $user = $this->m_dashboard->proses_login($regid, $password);

        if($user) {
            $this->session->set_userdata('user_in', true);
            $this->session->set_userdata('id_pendaftaran', $user[0]['id_pendaftaran']);
            $this->session->set_userdata('regid', $user[0]['regid']);

            redirect('dashboard/input_nilai');
        } else {
            redirect('dashboard/login');
        }
    }

    public function proses_logout() {
        $this->session->unset_userdata('user_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        redirect('dashboard/login');
    }
}
