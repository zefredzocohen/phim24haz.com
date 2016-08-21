<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Film_cat extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['film'] = $this->db->from('film')
                ->select('film_id,film_name,film_cat')
                ->like('film_cat',',','before')
                ->limit(500,0)
                ->get()->result();
        $film_cat = array();
        foreach ($data['film'] as $row){
            $film_cat[] = array(
                'film_id'=>$row->film_id,
                'film_cat'=>  substr($row->film_cat, 0,  strlen($row->film_cat)-1)
            );
        }
        pre($data);exit;
        if($this->db->update_batch('film', $film_cat, 'film_id')){
            echo 'thanh cong';
        }else echo 'that bai';
//        $this->load->view('__site/home', $data);
    }

}
