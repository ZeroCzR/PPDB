<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Artikel_Model extends CI_Model {

	    public function __construct()
		{
			$this->load->database();
		}

		public function get_all_news(){
			$query = $this->db->get('artikel');
			return $query;
		}

		public function get_news_by_id($idN = 0){
			$query = $this->db->get_where('artikel', array('id' => $idN));
			return $query->row_array();
		}

		public function create_news($data){
			$this->db->insert('artikel', $data);
		}

		public function edit_news($id, $data){
			$this->db->where('id', $id);
			return $this->db->update('artikel', $data);
		}

		public function delete_news($idN){
			$this->db->where('id', $idN);
			return $this->db->delete('artikel');
		}
	}
?>