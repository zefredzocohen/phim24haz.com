<?php

// admin url
if (!function_exists('getLinkPhim')) {

    function getLinkPhim($filmName, $filmID) {
        $CI = & get_instance();
        return base_url() . 'phim/' . replace(strtolower(convert_accented_characters(vn_str_filter($filmName)))) . '-' . $filmID . '/';
    }

}
if (!function_exists('replace')) {

    function replace($string) {
        $string = preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), htmlspecialchars_decode($string));
        return $string;
    }

}

if (!function_exists('filmLang')) {

    function filmLang($id) {
        if ($id == 1) {
            $type = 'Phụ đề Việt';
        } elseif ($id == 2) {
            $type = 'Thuyết minh';
        } elseif ($id == 3) {
            $type = 'Lồng tiếng';
        } else
            $type = 'Đang cập nhật';
        return $type;
    }

}

if (!function_exists('get_words')) {

    function get_words($str, $num) {
        $limit = $num - 1;
        $str_tmp = '';
        $arrstr = explode(" ", $str);
        if (count($arrstr) <= $num)
            return $str;

        if (!empty($arrstr)) {
            for ($j = 0; $j < count($arrstr); $j++) {
                $str_tmp .= " " . $arrstr[$j];
                if ($j == $limit)
                    break;
            }
        }
        return $str_tmp . '';
    }

}

if (!function_exists('thumbimg')) {

    function thumbimg($url) {
        if($url=='')$url = "/public/asset/img/no_img.gif";
        if (strpos($url, '/film/') !== false)
            $u = str_replace('/film/', '/film/thumb/', $url);
        elseif (strpos($url, '/info/') !== false)
            $u = str_replace('/info/', '/info/thumb/', $url);
        else
            $u = $url;
        return  ($u);
    }

}

if (!function_exists('getLinkTag')) {
    function getLinkTag($tag_name_kd){
//        $web_link . '/tag/' . $r['tag_name_kd'];
        return base_url().'tag/'.$tag_name_kd;
    }
}

if (!function_exists('securityFromInput')) {
    function securityFromInput($str){
        $CI = & get_instance();
        return strtolower(convert_accented_characters(vn_str_filter($CI->security->xss_clean(trim($str)))));
    }
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}

if (!function_exists('thumbimg')) {
    
}
?>