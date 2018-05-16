<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

//membuat kategori baru
	public function	create_category() {
	$data = array(
            'nama'          => $this->input->post('nama'),
            'deskripsi'   => $this->input->post('deskripsi')
            
        );

        return $this->db->insert('data_blog', $data);
	}

	//Menampilkan semua kategori
	 public function get_all_categories()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('nama');

        $query = $this->db->get('data_blog');
        return $query->result();
    }

    //mengakses kategori

	public function get_single($id)
	{
		$query = $this->db->query('select * from data_blog where id='.$id);
		return $query->result();
	}
	public function get_default($id)
	{
		$data = array();
  		$options = array('id' => $id);
  		$Q = $this->db->get_where('data_blog',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}
	public function hapus($id){
		$sql = $this->db->query("DELETE from data_blog	 WHERE id = ".intval($id));
	}
}