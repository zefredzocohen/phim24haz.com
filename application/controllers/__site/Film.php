<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($filmName='',$filmID) {
        $filmID = intval($filmID);
        $data = array();
        $film_info = $this->db->from('film')
                ->select('film_id, film_name, film_name_ascii, film_name_real, film_rating, film_rating_total, film_trailer, film_lb, film_server, film_year, film_trangthai, film_imdb, film_director, film_time, film_viewed, film_info, film_lang')
                ->where('film_id',$filmID)
                ->get()->row();
        
        if (count($film_info)==0)
            redirect('/error.html');
        else $data['film_info'] = $film_info;
        $this->db->where('film_id',$filmID)
                ->set('`film_viewed_day`', '`film_viewed_day`+1', FALSE)
                ->set('`film_viewed`', '`film_viewed`+1', FALSE)
                ->set('`film_viewed_w`', '`film_viewed_w`+1', FALSE)
                ->set('`film_viewed_m`', '`film_viewed_m`+1', FALSE)
                ->update('film');
        //Set Server Load 
    if ($film_info->film_server == 0)
        $splitserver = '';
    else
        $splitserver = "AND episode_type='" . $film_info->film_server. "'";
//    $episode = $mysql->fetch_array($mysql->query("SELECT episode_id,episode_name FROM " . $tb_prefix . "episode WHERE episode_film = '" . $film_id . "' " . $splitserver . "  ORDER BY episode_id ASC LIMIT 0,1"));
//    $episodes = $mysql->fetch_array($mysql->query("SELECT episode_id FROM " . $tb_prefix . "episode WHERE episode_film = '" . $film_id . "' AND episode_name = 'Trailer' " . $splitserver . "  ORDER BY episode_id ASC LIMIT 0,1"));
//    //Check Episode 
//    if ($episode['episode_id'] == "")
//        $episode = $mysql->fetch_array($mysql->query("SELECT episode_id FROM " . $tb_prefix . "episode WHERE episode_film = '" . $film_id . "' ORDER BY episode_id ASC LIMIT 0,1"));
//
//    $film_title = $r['film_name'];
//    $film_title_en = $r['film_name_real'];
//    $film_trailer = check_data(get_link_total($r['film_trailer'], 0));
//    $film_upload = check_img($r['film_upload']);
//    $film_img = check_img(replaceimg($r['film_img']));
//    $film_imgbn = text_tidy($r['film_imgbn']);
//    $film_info = htmltxt(text_tidy1($r['film_info']));
//    $film_info1 = strip_tags($film_info);
//    $film_key = text_tidy($r['film_key']);
//    $film_key1 = strip_tags($film_key);
//    $film_des = text_tidy($r['film_des']);
//    $film_des1 = strip_tags($film_des);
//    $film_download = text_tidy($r['film_download']);
//    $film_name_real = text_tidy($r['film_name_real']);
//    $film_sub = text_tidy($r['film_sub']);
//    $film_tag = text_tidy($r['film_tag']);
//    $film_year = check_year($r['film_year']);
//    $film_time = check_data($r['film_time']);
//    $film_lb = check_data($r['film_lb']);
//    $film_area = splitlink(check_data($r['film_area']));
//    $film_director = check_data($r['film_director']);
//    $film_actor = check_data(get_url_dv_list($r['film_actor']));
//    $film_actordes = check_data($r['film_actor']);
//    $film_infoname = html_entity_decode($film_info, ENT_QUOTES, 'UTF-8');
//    $cat = explode(',', $r['film_cat']);
//    $film_cat = false;
//    for ($i = 1; $i < count($cat) - 1; $i++) {
//        $cat_name_key = check_year(get_data('cat_name_key', 'cat', 'cat_id', $cat[$i]));
//        $cat_name = check_year(get_data('cat_name', 'cat', 'cat_id', $cat[$i]));
//        $film_cat .= '<a class="category" href="' . $web_link . '/the-loai/' . replace(strtolower(get_ascii($cat_name_key))) . '/" title="' . $cat_name . '">' . $cat_name . '</a>,';
//        $cat_film = '<div class="item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="' . $web_link . '/the-loai/' . replace(strtolower(get_ascii($cat_name_key))) . '/" title="' . $cat_name . '" itemprop="url"><span itemprop="title">' . $cat_name . '</span></a></div>';
//    }
//    $film_cat_info = substr($film_cat, 0, -1);
//
//
//    $area = explode(',', $film_area);
//    $film_area = "";
//    for ($i = 0; $i < count($area); $i++) {
//        $film_area .= '' . $area[$i] . ',';
//    }
//    $country = @explode('', $r['film_country']);
//    $link_country = "";
//    for ($i = 0; $i < count($country); $i++) {
//        $film_country = check_data(get_data('country_name', 'country', 'country_id', $r['film_country']));
//        $film_country_key = check_data(get_data('country_name_key', 'country', 'country_id', $r['film_country']));
//        $link_country .= '<a href="' . $web_link . '/quoc-gia/' . replace(strtolower(get_ascii($film_country_key))) . '/' . '" title="' . $film_country . '">' . $film_country . '</a>';
//    }
//    if ($episode['episode_id']) {
//        $link_seo = $web_link . '/phim/' . replace(strtolower(get_ascii($r['film_name']))) . '-' . replace($episode['episode_id']) . '/xem-phim.html';
//    } else {
//        $link_seo = 'javascript:void()" onclick="LoadMess(\'Oops...\', \'Dữ liệu đang được cập nhật! Mong bạn thông cảm :D\', \'error\');';
//    }
//    if ($r['film_trailer']) {
//        $link_seo_trailer = $web_link . '/phim/' . replace(strtolower(get_ascii($r['film_name']))) . '-' . replace($r['film_id']) . '/trailer.html';
//    } else {
//        $link_seo_trailer = 'javascript:void()" onclick="LoadMess(\'Oops...\', \'Dữ liệu đang được cập nhật! Mong bạn thông cảm :D\', \'error\');';
//    }
//
//    // film san xuat
//    $area = '';
//    if ((strlen($film_area)) > 1) {
//        $area = $film_area;
//    }
//    $catz = explode(',', $r['film_cat']);
//    $link_film = $link_seo;
//    $film_bo = '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a title="Phim Bộ" href="' . $web_link . '/phim-bo/" itemprop="url"><span itemprop="title">Phim bộ</span></a></li>';
//    $film_le = '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a title="Phim Lẻ" href="' . $web_link . '/phim-le/" itemprop="url"><span itemprop="title">Phim lẻ</span></a></li>';
//    if ($r['film_lb'] == 0)
//        $fff = $film_le;
//    else
//        $fff = $film_bo;
//    $breadcrumbs = '<ol class="breadcrumb" itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">';
//    $breadcrumbs .= '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a title="Phim Mới" href="' . $web_link . '" itemprop="url"><span itemprop="title">Trang chủ</span></a></li>';
//    $breadcrumbs .= $fff;
//    for ($i = 1; $i < count($catz) - 1; $i++) {
//        $cat_namez = check_year(get_data('cat_name', 'cat', 'cat_id', $catz[$i]));
//        $cat_namez_key = check_year(get_data('cat_name_key', 'cat', 'cat_id', $catz[$i]));
//        $breadcrumbs .= '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="' . $web_link . '/the-loai/' . replace(strtolower(get_ascii($cat_namez_key))) . '/" title="' . $cat_namez . '" itemprop="url"><span itemprop="title">' . $cat_namez . '</span></a></li>';
//    }
//    $breadcrumbs .= '<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope=""><a href="' . $link_film . '" title="Xem Phim ' . $r['film_name'] . '" itemprop="url"><span itemprop="title">Phim ' . $r['film_name'] . '</span></a></li>';
//    $breadcrumbs .= '<li class="active">DOWNLOAD</li>';
//    $breadcrumbs .= '</ol>';
//
//    rating_img($rs['film_rating'], $rs['film_rating_total']);
//    $rater_stars_img = $r_s_img;
//    $htm = $temp->get_htm('download');
//    $main = $temp->replace_value($htm, array(
//        'film.ID' => $r['film_id'],
//        'cat.ID' => $r['film_cat'],
//        'episode.ID' => $episode['episode_id'],
//        'episode.PLAY' => $play_button,
//        'web_mobile' => $web_mobile,
//        'filmtag.2' => $film_tag2,
//        'film.TRAILER' => $film_trailer,
//        'film.TRAILER_URL' => $link_seo_trailer,
//        'film.URL' => $web_link . '/phim/' . replace(strtolower(get_ascii($r['film_name']))) . '-' . replace($r['film_id']) . '/',
//        'film.IMG' => $film_img,
//        'film.NAME' => $r['film_name'],
//        'film.GACH' => ($r['film_name_real'] ? " - " : ""),
//        'film.NAMEREAL' => ($r['film_name_real'] ? '' . $r['film_name_real'] . '' : ""),
//        'film.NAMEDES' => ($r['film_name_real'] ? '<h4>' . $r['film_name_real'] . '</h4>' : ""),
//        'film.NAMEREAL1' => $r['film_name_real'],
//        'film.KEY' => $r['film_key'],
//        'film.DES' => $film_des1,
//        'film.WATCH' => $link_seo,
//        'film.IMDb' => $r['film_imdb'],
//        'film.TAP' => ($r['film_tapphim'] ? $r['film_tapphim'] : "SD"),
//        'film.TAPPHIM' => ($r['film_tapphim'] ? "<span class=\"status-update\">" . $r['film_tapphim'] . "</span>" : "<span class=\"status-update\">SD</span>"),
//        'film.ACTOR' => $film_actor,
//        'film.ACTORDES' => strip_tags($film_actor),
//        'film.POSTER' => $posterby,
//        'RandNUm' => rand(1000, 9999),
//        'film.COUNTRY' => $link_country,
//        'film.COUNTRYDES' => strip_tags($film_country),
//        'film.DIRECTOR' => $film_director,
//        'film.YEAR' => $film_year,
//        'film.RATE' => $r['film_rate'],
//        'film.RATETOTAL' => round($r['film_rating_total'] / $r['film_rate'], 1),
//        'film.TIME' => $film_time,
//        'film.SUB' => $sub,
//        'film.TAG' => ($r['film_tag'] ? '<div class="block-tags"><h3 class="movie-detail-h3">Từ khóa:</h3><ul class="tag-list">' . TAGS_LINK2($film_tag) . '</div>' : ""),
//        'film.AREA' => TAGS_LINK2($area),
//        'film.CAT' => $film_cat_info,
//        'film.CATDES' => strip_tags($film_cat_info),
//        'film.BL' => $film_bl,
//        'film.VIEWED' => $r['film_viewed'],
//        'film.INFO' => cut_string(htmltxt(text_tidy1($r['film_info'])), 500),
//        'film.INFOMOBILE' => $film_info1,
//        'film.REAL' => $r['film_name_real'],
//        'BREADCRUMBS' => $breadcrumbs,
//            )
//    );
//
//    // phÃ¢n title
//    $film_lb = $r['film_lb'];
//    if ($film_lb == 0) {
//        $titlephim = 'Download phim ' . check_data($r['film_name']) . " VietSub HD" . ($r['film_name_real'] ? ' | ' . $r['film_name_real'] : "") . " | " . $r['film_year'];
//    } else {
//        $titlephim = 'Download phim ' . check_data($r['film_name']) . " - " . $film_title_en . " | " . $film_country . " | " . $r['film_year'];
//    }
//    // phÃ¢n title
//    // seo keywords
//    $key = $r['film_name_real'] . ", " . $r['film_name'] . ", Phim " . $r['film_name'] . ", Xem phim " . $r['film_name'] . ", xem phim " . $r['film_name_real'] . ", xem phim " . $r['film_name_ascii'];
//    if ((strlen($film_key)) > 1) {
//        $key = $film_key1;
//    }
//    // seo keywords
//    // seo description
//    $film_lb = $r['film_lb'];
//    if ($film_lb == 0) {
//        $des = $titlephim . ': ' . html_entity_decode(del_HTML(trim(str_replace('"', "'", get_words((strip_tags(text_tidy($r['film_info']))), 14)))), ENT_QUOTES, 'UTF-8');
//    } else {
//        $des = $titlephim . ': ' . html_entity_decode(del_HTML(trim(str_replace('"', "'", get_words((strip_tags(text_tidy($r['film_info']))), 14)))), ENT_QUOTES, 'UTF-8');
//    }
//    // seo description
//    $web_title_main = $titlephim;
//    $web_keywords_main = $key;
//    $web_des_main = $des;
//    $link_film = $web_link . '/phim-' . replace($r['film_name_ascii']) . '.vc' . replace($r['film_id']) . '.html';
//    $link_img = check_img(replaceimg($r['film_img']));
//    $web_imgfilm = $link_img;
//    $meta_seo = "<h1 class='meta_title'><a href='" . $link_film . "' title='Phim " . $r['film_name'] . "'>Phim " . $r['film_name'] . "</a></h1>";
//    $web_catid = $r['film_cat'];
//    $link_img = check_img(replaceimg($r['film_img']));
//    $web_imgfilm = $link_img;
        $data['temp'] = '__site/home_info';
        $this->load->view('__site/template/master',$data);
        
    }
    
    public function category(){
        
    }
    
    public function seriesMovie(){
        
    }
    
    public function singleMovies(){
        
    }
    
    public function theatersMovie (){
        
    }
    
    public function yearMovie(){
        
    }
    
    public function watchMovie(){
        
    }
    
    public function trailerMovie(){
        
    }

}
