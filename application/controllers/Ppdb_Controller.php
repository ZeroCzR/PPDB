<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Ppdb_Controller extends CI_Controller {

	    public function __construct(){
	    	parent::__construct();
	    	$this->load->model('ppdb');
            $this->load->helper('url_helper','date','file');
	    }

	    public function index()
        {
            $x['data'] = $this->ppdb->get_all_user();
            $this->load->view('Articel_View', $x);
        }

        public function view()
        {
            $id = $this->uri->segment(3);
            $x['data'] = $this->ppdb->get_all_user_by_id($id);
            $this->load->view('PPDBId_View', $x);
        }

        public function insert_news(){
               $this->load->helper('form');
               $this->load->library('form_validation');

               $this->form_validation->set_rules('username', 'username', 'required');
               $this->form_validation->set_rules('password', 'password', 'required');
               $this->form_validation->set_rules('level', 'level', 'required');


               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('CreateUser');
               } else {
                        
                        $data['input'] = array(
                            'id_user' => $this->input->post('id_user'),
                            'username' => $this->input->post('username'),
                            'password' => $this->input->post('password'),
                            'level' => $this->input->post('level'),
                        );
                        
                        $this->ppdb->create_user($data['input']);
                        
                        redirect('Ppdb_Controller/index');
                    }
        }

        public function edit_news(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            //validasi inputan yang masuk
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            //Mendapatkan key id dati Route
            $id = $this->uri->segment(3);
            //Mengambil data dari model dan di filter dan ditambahkan ke dalam array
            $data['show_ppdb'] = $this->ppdb->get_all_user_by_id($id);
            //Jika validasi belum berjalam
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('PPDBEdit_View',$data);
            } else {
                
                    // Data input ke model
                    $data['input'] = array(
                        'password' => $this->input->post('password'),
                        'username' => $this->input->post('username'),
                        'level' => $this->input->post('level'),
                    );
                    $this->ppdb->edit_user($id, $data['input']);
                    //kembali ke home
                    redirect('Ppdb_Controller/index');
                }
        }

        public function delete_user(){
            $id = $this->uri->segment(3);
            $this->ppdb->delete_user($id);
            redirect('Ppdb_Controller/index','refresh');
        }

	}
?>