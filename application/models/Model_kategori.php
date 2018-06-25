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
        $this->db->order_by('kat_id');

        $query = $this->db->get('data_blog');
        return $query->result();
    }

    //mengakses kategori

	public function get_single($id)
	{
		$query = $this->db->query('select * from data_blog where kat_id='.$id);
		return $query->result();
	}
	public function get_default($id)
	{
		$data = array();
  		$options = array('kat_id' => $id);
  		$Q = $this->db->get_where('data_blog',$options,1);
    		if ($Q->num_rows() > 0){
      			$data = $Q->row_array();
   			}
  		$Q->free_result();
 		return $data;
	}
	public function hapus($id){
		$sql = $this->db->query("DELETE from data_blog	 WHERE kat_id = ".intval($id));
	}
	 public function generate_cat_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            data_blog.kat_id,
            data_blog.nama
        ');

        // Urut abjad
        $this->db->order_by('nama');

        $result = $this->db->get('data_blog');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['kat_id']] = $row['nama'];
            }
        }

        return $dropdown;
    }
}