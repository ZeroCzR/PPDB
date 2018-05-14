<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCTRL extends CI_Controller {

	
	public function home(){
		redirect(base_url().'pegawai/1');
	}

	public function news()
	{
		$data['title'] = "News";
		$data['content'] = "Public/news.php";	
		$this->load->view('Template', $data);
	}

	public function about()
	{
		$data['title'] = "About";
		$data['content'] = "Public/about.php";	
		$this->load->view('Template', $data);
	}

	public function contact()
	{
		$data['title'] = "Contact";
		$data['content'] = "Public/contact.php";	
		$this->load->view('Template', $data);
	}
}
