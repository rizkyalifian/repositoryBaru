<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class v_blog extends CI_Controller {

function __construct()
	{
		parent::__construct();

		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		

		$this->load->model('list_blog');
		$this->load->model('Model_kategori');

	}
	public function index()
	{
		$data['page_title'] = 'List Artikel';

		//jumlah artikel perhalaman
		$limit_per_page = 6;
		//Uri segment untuk mendeteksi "Halaman ke berapa" dari URL
		$star_index = ($this->uri->segment(3))? $this->uri->segment(3):0;
		//Dapat jumlah data

		$total_records = $this->list_blog->get_total();

		$data["artikel"] = $this->list_blog->get_all_artikel($limit_per_page,$star_index);
		if ($total_records	> 0){
			//data pada halaman yang dituju
			

			//konfigurasi pagination
			$config['base_url'] = base_url(). 'home_view';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			//Buat link pagination
			$data["links"]=$this->pagination->create_links();
		}

		$this->load->view('home_view', $data);
	}
	public function add()
	{
         $this->load->library('form_validation');
         $this->load->model('list_blog');

         $data['kategori'] = $this->Model_kategori->generate_cat_dropdown();
  		
		 $data = array();
		$this->form_validation->set_rules('judul','Judal harus diisi','required', array ('required' => 'isi %s, '));
		$this->form_validation->set_rules('date','Date harus diisi','required', array ('required' => 'isi %s, '));
		$this->form_validation->set_rules('content','Content tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('link_download','Link Download tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Pengembang','Pengembang tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Publisher','Publisher tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Platforms','Platforms tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Rating','Rating tidak boleh kosong','required',  array ('required' => 'isi %s, ') );

  		if($this->form_validation->run()== FALSE){
  			$this->load->view('data_form_blog',$data);
  		}else {
  			if ($this->input->post('simpan'))
  			{
  				$upload = $this->list_blog->upload();

  				if ($upload['result'] == 'success'){
  					$this->list_blog->save($upload);
  					redirect('v_blog');
  				}else {
  					$data['message'] = $upload['error'];
  				}
  			}
  			$this->load->view('data_form_blog',$data);
  		}
	}
	public function detail($id)
	{
		$this->load->model('list_blog');
		$data['detail'] = $this->list_blog->get_single($id);
		$this->load->view('home_detail', $data);
	}
	

	public function edit($id){
		$this->load->model("list_blog");
		$data['tipe'] = "Edit";
		$data['default'] = $this->list_blog->get_default($id);

		if(isset($_POST['simpan'])){
			$this->list_blog->update($_POST, $id);
			redirect("v_blog");
		}

		$this->load->view("data_form_blog",$data);
	}


	public function delete($id){
		$this->load->model("list_blog");
		$this->list_blog->hapus($id);
		redirect("v_blog");
	}

	
}