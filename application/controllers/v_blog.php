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
}