<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Peserta_Controller extends CI_Controller {

	    public function __construct(){
	    	parent::__construct();
	    	$this->load->model('ppdb');
            $this->load->helper('url_helper','date','file');
	    }

	    public function index()
        {
            $x['data'] = $this->ppdb->get_all_peserta();
            $this->load->view('Peserta_View', $x);
        }

        public function view()
        {
            $id = $this->uri->segment(3);
            $x['data'] = $this->ppdb->get_all_peserta_by_id($id);
            $this->load->view('Peserta_View', $x);
        }

        public function insert_peserta(){
               $this->load->helper('form');
               $this->load->library('form_validation');

               $this->form_validation->set_rules('nama', 'nama', 'required');
               $this->form_validation->set_rules('ttl', 'ttl', 'required');
               $this->form_validation->set_rules('alamat', 'alamat', 'required');
               $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'required');


               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('CreatePeserta');
               } else {
                        
                        $data['input'] = array(
                            'nama' => $this->input->post('nama'),
                            'ttl' => $this->input->post('ttl'),
                            'alamat' => $this->input->post('alamat'),
                            'asal_sekolah' => $this->input->post('asal_sekolah')
                        );
                        
                        $this->ppdb->create_peserta($data['input']);
                        
                        redirect('Peserta_Controller/index');
                    }
        }

        public function edit_peserta(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            //validasi inputan yang masuk

            $this->form_validation->set_rules('nama', 'nama', 'required');
               $this->form_validation->set_rules('ttl', 'ttl', 'required');
               $this->form_validation->set_rules('alamat', 'alamat', 'required');
               $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'required');
            //Mendapatkan key id dati Route

            $id = $this->uri->segment(3);
            //Mengambil data dari model dan di filter dan ditambahkan ke dalam array
            $data['show_peserta'] = $this->ppdb->get_all_peserta_by_id($id);
            //Jika validasi belum berjalam
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('EditPeserta',$data);
            } else {
                
                    // Data input ke model
                    
                        $data['input'] = array(
                            'nama' => $this->input->post('nama'),
                            'ttl' => $this->input->post('ttl'),
                            'alamat' => $this->input->post('alamat'),
                            'asal_sekolah' => $this->input->post('asal_sekolah')
                    );
                    $this->ppdb->edit_peserta($id, $data['input']);
                    //kembali ke home
                    redirect('Peserta_Controller/index');
                }
        }

        public function delete_peserta(){
            $id = $this->uri->segment(3);
            $this->ppdb->delete_peserta($id);
            redirect('Peserta_Controller/index','refresh');
        }

	}
?>