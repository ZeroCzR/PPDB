<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
        $this->load->model('m_login');
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

    public function index()
	{
        $this->cek_log('pendaftaran', 'admin/login');
    }

    public function login() {
        $this->load->view('login/index');
    }

    public function proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->m_login->proses_login($username, $password);

        if($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('username', $user[0]['username']);
            $this->session->set_userdata('role', $user[0]['role']);

            redirect('pendaftaran');
        } else {
            redirect('admin/login');
        }
    }

    public function proses_logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        redirect('admin/login');
    }
}
