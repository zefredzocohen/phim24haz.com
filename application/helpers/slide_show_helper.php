<?php

function getSile($data = array()){
    $config = get_config_slide();
    $CI =& get_instance();
    $number = count($data);
    $result = '';
    $result .= '<ul>';
    $i=0;
    foreach ($data as $key => $value){
        $result .='<li class="location-item '.$config[$number][$i].'">';
        $result .='<a href="'.  base_url().'room/search?location='.urlencode($value->name).'">
                    <img src="'.base_url().substr($value->image,1).'"/><p>'.$value->name.'</p>
                </a>';
        $result .='</li>';
        $i++;
    }
    $result .= '</ul>';
    return $result;
}
function get_config_slide(){
    $config_sile = array(
        1=>'col-xs-12 col-sm-12',
        2=>array('col-xs-6 col-sm-6','col-xs-6 col-sm-6'),
        3=>array('col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-12 col-sm-4'),
        4=>array('col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6'),
        5=>array('col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-12','col-xs-6 col-sm-6','col-xs-12 col-sm-6'),
        6=>array('col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-12','col-xs-6 col-sm-6','col-xs-6 col-sm-6'),
        7=>array('col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-6','col-xs-12 col-sm-6'),
        8=>array('col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-4','col-xs-6 col-sm-4','col-xs-6 col-sm-4'),
        9=>array('col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-6 col-sm-6','col-xs-12 col-sm-6'),
        
    );
    return $config_sile;
}

