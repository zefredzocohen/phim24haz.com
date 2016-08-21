<?php

require_once APPPATH . 'libraries/Hashids/HashGenerator.php';
require_once APPPATH . 'libraries/Hashids/Hashids.php';

use Hashids\Hashids;

function setViewed() {
    $CI = &get_instance();
    $day = date('d', NOW);
    $current_day = $CI->db->from('config')
            ->where('cf_id',1)
            ->get()->row();
    if ($day != $current_day->cf_current_day) {
        $CI->db->update('film',array('film_viewed_day'=>'0'));
        $CI->db->where('cf_id',1)->update('config',array('cf_current_day'=>$day));
    }
    $week = date('W', NOW);
    if ($week != $current_day->cf_current_w) {
        $CI->db->update('film',array('film_viewed_w'=>'0'));
        $CI->db->where('cf_id',1)->update('config',array('cf_current_w'=>$week));
    }
    $month = date('m', NOW);
    if ($month != $current_day->cf_current_m) {
        $CI->db->update('film',array('film_viewed_m'=>'0'));
        $CI->db->where('cf_id',1)->update('config',array('cf_current_m'=>$month));
    }
}

//function load_config() {
//    $CI = &get_instance();
//    foreach ($CI->App_config_model->get_all()->result() as $app_config) {
//        $CI->config->set_item($app_config->key, $app_config->value);
//    }
//}

function load_encode() {
    $CI = &get_instance();
    $encode = new Hashids('this is encode id', 12, 'abcdefghijklmnopqrstxyz1234567890');
    $encode_validate_user = new Hashids('this is validate user pass email', 12, 'abcdefghijklmnopqrstxyz1234567890');
    $encode_pass_user = new Hashids('this is password usser', 12, 'abcdefghijklmnopqrstxyz1234567890');
    $CI->config->set_item('encode_id', $encode);
    $CI->config->set_item('encode_user', $encode_validate_user);
    $CI->config->set_item('encode_pass_user', $encode_pass_user);
}
