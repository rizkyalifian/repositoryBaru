<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class v_blog extends CI_Controller {

	public function index()
	{
		$this->load->model('list_blog');
		$data['artikel'] = $this->list_blog->get_artikels();
		$this->load->view('home_view', $data);
	}

	public function detail($id)
	{
		$this->load->model('list_blog');
		$data['detail'] = $this->list_blog->get_single($id);
		$this->load->view('home_detail', $data);
	}
	public function add()
	{
		$this->load->model('list_blog');
		$data['tipe'] = "Add";
		
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