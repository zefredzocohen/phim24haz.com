<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Film_model extends MY_Model {

    var $table = 'film';
    var $key = 'film_id';
    function test(){
        $this->db->where($this->key,1);
        return $this->db->get($this->table);
    }
}
