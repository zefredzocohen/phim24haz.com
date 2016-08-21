<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller{
        function __construct($module_id= NULL){
            parent::__construct();
            $module_admin = $this->uri->segment(1);
            switch ($module_admin) {
                case 'admin':{
                    $this->_checkLogin();
                    break;
                }
                default:{
                    break;
                }
            }
        }

        function _checkLogin(){
            $userLogin = $this->user_model->is_logged_in();
            if(!$userLogin ){
                    redirect(admin_url('login'));
            }
        }

    }
?>