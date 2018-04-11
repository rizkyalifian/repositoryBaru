<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class list_blog extends CI_Model {

	public function get_artikels(){
		$query = $this->db->get('game_blog');
		return $query->result();
	}	

	public function get_single($id)
	{
		$query = $this->db->query('select * from game_blog where id='.$id);
		return $query->result();
	}
	public function get_default($id)
	{
		$data = array();
  		$options = array('id' => $id);
  		$Q = $this->db->get_where('game_blog',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}

	public function upload(){
		$config['upload_path'] = './assets/image/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data = array(
			'id' => $this->input->post('null'),
			'judul' => $this->input->post('judul'),
			'date' => $this->input->post('date'),
			'content' => $this->input->post('content'),
			'gambar' => $upload['file']['file_name']		
		);
		
		$this->db->insert('game_blog', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$judul = $this->db->escape($post['judul']);
		$date = $this->db->escape($post['date']);
		$content = $this->db->escape($post['content']);

		$sql = $this->db->query("UPDATE game_blog SET judul = $judul, date = $date, content = $content WHERE id = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("DELETE from game_blog WHERE id = ".intval($id));
	}
}