<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $data['phim_de_cu']= $this->Film_model->get_list(
                array(
                    'where'=>array('film_hot'=>1,'film_imgbn!='=>''),
                    'order'=>array('film_time_update','desc'),
                    'limit'=>array(10,0)
                    )
                );
        $this->load->view('__site/home',$data);
    }
    
    function logout(){
        
    }

}
