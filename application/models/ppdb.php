<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class ppdb extends CI_Model {

	    public function __construct()
		{
			$this->load->database();
		}

		public function get_all_user(){
			$query = $this->db->get('user');
			return $query;
		}

		public function get_all_user_by_id($id = 0){
			$query = $this->db->get_where('user', array('id_user' => $id));
			return $query->row_array();
		}

		public function create_user($data){
			$this->db->insert('user', $data);
		}

		public function edit_user($id, $data){
			$this->db->where('id_user', $id);
			return $this->db->update('user', $data);
		}

		public function delete_user($idN){
			$this->db->where('id_user', $idN);
			return $this->db->delete('user');
		}

		//awal table peserta

		public function get_all_peserta(){
			$query = $this->db->get('peserta');
			return $query;
		}

		public function get_all_peserta_by_id($id = 0){
			$query = $this->db->get_where('peserta', array('id_peserta' => $id));
			return $query->row_array();
		}

		public function create_peserta($data){
			$this->db->insert('peserta', $data);
		}

		public function edit_peserta($id, $data){
			$this->db->where('id_peserta', $id);
			return $this->db->update('peserta', $data);
		}

		public function delete_peserta($idN){
			$this->db->where('id_peserta', $idN);
			return $this->db->delete('peserta');
		}
	}
?>