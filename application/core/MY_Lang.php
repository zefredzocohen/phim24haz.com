<?php
class MY_Lang extends CI_Lang{
    function __construct(){
        parent::__construct();
    }
    function switch_to($lang){
        $CI = &get_instance();
        if(is_string($lang)){
            $CI->config->set_item('language',$lang);
//            $loaded = $this->is_loaded;
            $this->is_loaded = array();
                $this->load(array('block','config','side_bar','home'));
        }
    } 
}
