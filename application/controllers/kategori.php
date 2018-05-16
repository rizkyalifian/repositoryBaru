<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
//fungsi untuk membuat kategori baru
	public function create()
	{
		$this->load->model('Model_kategori');
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('nama','nama seharusnya diisi','required', array ('required' => 'isi %s, '));
		$this->form_validation->set_rules('nama', 'nama diisi', 'required', array('required' => 'Isi %s , '));

		$this->form_validation->set_rules('deskripsi', 'Deskripsi diisi', 'required', array('required' => 'Isi %s , '));

		// if($this->form_validation->run()== FALSE){
  // 			$this->load->view('tambah_kategori');
  // 		}else {
  // 			if ($this->input->post('simpan'))
  // 			{
  						
  // 				$this->Model_kategori->create_category();


  // 				if ($upload['result'] == 'success'){
  // 					$this->data_blog->save($upload);
  // 					redirect('kategori');
  // 				}else {
  // 					$data['message'] = $upload['error'];
  // 				}
  // 			}
  // 			$this->load->view('tampil_kategori', $data);
  // 		}
  		if($this->form_validation->run() === FALSE){
			
			$this->load->view('tambah_kategori');
			
		} else {
			$this->Model_kategori->create_category();
			redirect('kategori');
		}
	}
	//fungsi untuk menampilkan semua kategori pada tabel
	public function index() 
	{
		$this->load->model('Model_kategori');
		// Dapatkan semua kategori
		$data['kategori'] = $this->Model_kategori->get_all_categories();
		$this->load->view('tampil_kategori', $data);
	}
	//fungsi delete untuk kategori
	public function delete($id){
		$this->load->model('Model_kategori');
		$this->Model_kategori->hapus($id);
		redirect('kategori');
	}
	//fungsi untuk mengedit kategori
	public function edit($id){
		$this->load->model("Model_kategori");
		$data['tipe'] = "Edit";
		$data['default'] = $this->Model_kategori->get_default($id);

		if(isset($_POST['simpan'])){
			$this->Model_kategori->update($_POST, $id);
			redirect("kategori");
		}

		$this->load->view("update_kategori",$data);
	}

}