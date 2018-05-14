<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiCTRL extends CI_Controller {

	
	public function dataPengawai(){
		$data['title'] = "Data Pengawai";
		$where = array(
			'idpegawai' => $this->uri->segment(2)
		);
		$where2 = array(
			'fk_pegawai' => $this->uri->segment(2)
		);
		$data['pegawai'] = $this->M__db->cek('pegawai','*',$where)->row_array();
		$data['lulusanPegawai'] = $this->M__db->cek_order('pendidikan','*',$where2,'tahunLulus','desc');
		$data['content'] = "Public/dataPegawai.php";	
		$this->load->view('Template', $data);
	}

}
