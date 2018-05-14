<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Artikel_Controller extends CI_Controller {

	    public function __construct(){
	    	parent::__construct();
	    	$this->load->model('Artikel_Model');
            $this->load->helper('url_helper','date','file');
	    }

	    public function index()
        {
            $x['data'] = $this->Artikel_Model->get_all_news();
            $this->load->view('Articel_View', $x);
        }

        public function view()
        {
            $id = $this->uri->segment(3);
            $x['data'] = $this->Artikel_Model->get_news_by_id($id);
            $this->load->view('ArticelId_View', $x);
        }

        public function insert_news(){
               $this->load->helper('form');
               $this->load->library('form_validation');

               $this->form_validation->set_rules('title', 'Title', 'required');
               $this->form_validation->set_rules('author', 'Author', 'required');
               $this->form_validation->set_rules('content', 'Content', 'required');

               if ($this->form_validation->run() == FALSE) {
                   $this->load->view('CreateArticle_New');
               } else {
                    $config['upload_path'] = 'assets/img/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('image')){
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else{
                        $data = array('upload_data' => $this->upload->data());
                        
                        $data['input'] = array(
                            'title' => $this->input->post('title'),
                            'author' => $this->input->post('author'),
                            'content' => $this->input->post('content'),
                            'datepost' => date("Y/m/d"),
                            'image' => $this->upload->data('file_name')
                        );
                        
                        $this->Artikel_Model->create_news($data['input']);
                        
                        redirect('Artikel_Controller/index');
                    }
               }
        }

        public function edit_news(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            //validasi inputan yang masuk
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            //Mendapatkan key id dati Route
            $id = $this->uri->segment(3);
            //Mengambil data dari model dan di filter dan ditambahkan ke dalam array
            $data['show_article'] = $this->Artikel_Model->get_news_by_id($id);
            //Jika validasi belum berjalam
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('EditArticle_View',$data);
            } else {
                $config['upload_path'] = 'assets/img/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                //Memulai Upload
                $this->load->library('upload', $config);
                //Cek kondisi upload
                if ( ! $this->upload->do_upload('image')){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else {
                    $data = array('upload_data' => $this->upload->data());
                    // Data input ke model
                    $data['input'] = array(
                        'title' => $this->input->post('title'),
                        'author' => $this->input->post('author'),
                        'content' => $this->input->post('content'),
                        'datepost' => date("Y/m/d"),
                        'image' => $this->upload->data('file_name')
                    );
                    $this->Artikel_Model->edit_news($id, $data['input']);
                    //kembali ke home
                    redirect('Artikel_Controller/index');
                }
            }   
        }

        public function delete_news(){
            $id = $this->uri->segment(3);
            $this->Artikel_Model->delete_news($id);
            redirect('Artikel_Controller/index','refresh');
        }

	}
?>