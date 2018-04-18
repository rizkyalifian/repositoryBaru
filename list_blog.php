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
			'gambar' => $upload['file']['file_name'],
			'link_download' => $this->input->post('link_download'),
			'Pengembang' => $this->input->post('Pengembang'),
			'Platforms' => $this->input->post('Platforms'),
			'Publisher' => $this->input->post('Publisher'),
			'Rating' => $this->input->post('Rating')		
		);
		
		$this->db->insert('game_blog', $data);
	}

	public function update($post, $id){
		//parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
		$judul = $this->db->escape($post['judul']);
		$date = $this->db->escape($post['date']);
		$content = $this->db->escape($post['content']);
		$link_download = $this->db->escape($post['link_download']);
		$Pengembang = $this->db->escape($post['Pengembang']);
		$Platforms = $this->db->escape($post['Platforms']);
		$Publisher = $this->db->escape($post['Publisher']);
		$Rating = $this->db->escape($post['Rating']);

		$sql = $this->db->query("UPDATE game_blog SET judul = $judul, date = $date, content = $content, link_download = $link_download, Pengembang = $Pengembang, Platforms = $Platforms, Publisher = $Publisher, Rating = $Rating WHERE id = ".intval($id));

		return true;
	}

	public function hapus($id){
		$sql = $this->db->query("DELETE from game_blog WHERE id = ".intval($id));
	}
}