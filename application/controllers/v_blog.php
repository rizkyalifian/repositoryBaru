<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class v_blog extends CI_Controller {


	public function index()
	{
		$this->load->model('list_blog');
		$data['artikel'] = $this->list_blog->get_artikels();
		$this->load->view('home_view', $data);
	}
	public function add()
	{
         $this->load->library('form_validation');
         $this->load->model('list_blog');
		 $data = array();
         //$dt = ['judul''date''content''gambar' => $this->input->post('judul''date''content''gambar')];
		$this->form_validation->set_rules('judul','Judal harus diisi','required', array ('required' => 'isi %s, '));
		$this->form_validation->set_rules('date','Date harus diisi','required', array ('required' => 'isi %s, '));
		$this->form_validation->set_rules('content','Content tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('link_download','Link Download tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Pengembang','Pengembang tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Publisher','Publisher tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Platforms','Platforms tidak boleh kosong','required',  array ('required' => 'isi %s, ') );
		$this->form_validation->set_rules('Rating','Rating tidak boleh kosong','required',  array ('required' => 'isi %s, ') );

		/*if ($this->form_validation->run()) {
    	$result = $this->game_blog->insert($data);
   			if ($result) {
   			$this->load->view('home_view');
    			}
  			} else {
    		$this->load->view('data_form_blog');
  		}*/

  		if($this->form_validation->run()== FALSE){
  			$this->load->view('data_form_blog');
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
  			$this->load->view('data_form_blog', $data);
  		}
	}
	//http://localhost/CI3/application/views/data_form_blog
	public function detail($id)
	{
		$this->load->model('list_blog');
		$data['detail'] = $this->list_blog->get_single($id);
		$this->load->view('home_detail', $data);
	}
	/*public function add()
	{
		
		
		if ($this->input->post('simpan')) {
			$upload = $this->list_blog->upload();

			if ($upload['result'] == 'success') {
				$this->list_blog->save($upload);
				redirect('v_blog');
			}else{
				$data['message'] = $upload['error'];
			}
		}

		$this->load->view('data_form_blog', $data);
	}*/

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