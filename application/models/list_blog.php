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
}