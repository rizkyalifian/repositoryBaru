<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
    public function list($limit, $start)
    {
        // $this->db->limit($limit, $start);
        $query = $this->db->get('game_blog', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
    public function getTotal()
    {
        return $this->db->count_all('game_blog');
    }
}