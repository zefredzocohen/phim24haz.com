<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        if(!$data['phim_de_cu']=$this->cacher->get('phim_de_cu')){
            $data['__phim_de_cu']= $this->Film_model->get_list(
                array(
                    'where'=>array('film_hot'=>1,'film_imgbn!='=>''),
                    'order'=>array('film_time_update','desc'),
                    'limit'=>array(20,0)
                )
            );
            $data['phim_de_cu']=$this->load->view('__site/phim_de_cu',$data,true);
            unset($data['__phim_de_cu']);
            $this->cacher->set('phim_de_cu',$data['phim_de_cu']);
        }
        if(!$data['bxh_week_single']=$this->cacher->get('bxh_week_single')){
            $data['__bxh_week_single'] = $this->db->from('film')
                ->where('film_viewed_w >',0)->where('film_lb',0)
                ->not_like('film_cat','16')
                ->order_by('film_viewed_w','desc')
                ->limit(20,0)
                ->get()->result();
            $data['bxh_week_single']=$this->load->view('__site/bxh_week_single',$data,true);
            unset($data['__bxh_week_single']);
            $this->cacher->set('bxh_week_single',$data['bxh_week_single']);
        }
        if(!$data['trailer_top']=$this->cacher->get('trailer_top')){
        $data['__trailer_top'] = $this->Film_model->get_list(
            array(
                'where'=>array('film_trailer !='=>''),
                'order'=>array('film_date','desc'),
                'limit'=>array(20,0)
            )
        );
            $data['trailer_top']=$this->load->view('__site/trailer_top',$data,true);
            unset($data['__trailer_top']);
            $this->cacher->set('trailer_top',$data['trailer_top']);
        }
        if(!$data['tag_box']=$this->cacher->get('tag_box')){
        $data['__tag_box'] = $this->db->from('tags')
                ->order_by('tag_view','desc')
                ->limit(30,0)
                ->get()->result();
        $data['tag_box']=$this->load->view('__site/tag_box',$data,true);
        unset($data['__tag_box']);
        $this->cacher->set('tag_box',$data['tag_box']);
        }
        if(!$data['chieu_rap']=$this->cacher->get('chieu_rap')){
        $data['__chieu_rap'] = $this->db->from('film')
                ->where('film_chieurap',1)
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['chieu_rap']=$this->load->view('__site/phim_dang_chieu_rap',$data,true);
        unset($data['__chieu_rap']);
        $this->cacher->set('chieu_rap',$data['chieu_rap']);
        }
        if(!$data['phim_hanh_dong']=$this->cacher->get('phim_hanh_dong')){
        $data['__phim_hanh_dong'] = $this->db->from('film')
                ->where_in('film_cat',array(1))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_hanh_dong']=$this->load->view('__site/phim_hanh_dong',$data,true);
        unset($data['__phim_hanh_dong']);
        $this->cacher->set('phim_hanh_dong',$data['phim_hanh_dong']);
        }
        if(!$data['phim_kinh_di']=$this->cacher->get('phim_kinh_di')){
        $data['__phim_kinh_di'] = $this->db->from('film')
                ->where_in('film_cat',array(3))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_kinh_di']=$this->load->view('__site/phim_kinh_di',$data,true);
        unset($data['__phim_kinh_di']);
        $this->cacher->set('phim_kinh_di',$data['phim_kinh_di']);
        }
        if(!$data['phim_vien_tuong']=$this->cacher->get('phim_vien_tuong')){
        $data['__phim_vien_tuong'] = $this->db->from('film')
                ->where_in('film_cat',array(10))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_vien_tuong']=$this->load->view('__site/phim_vien_tuong',$data,true);
        unset($data['__phim_vien_tuong']);
        $this->cacher->set('phim_vien_tuong',$data['phim_vien_tuong']);
        }
        if(!$data['phim_hoat_hinh']=$this->cacher->get('phim_hoat_hinh')){
        $data['__phim_hoat_hinh'] = $this->db->from('film')
                ->where_in('film_cat',array(5))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_hoat_hinh']=$this->load->view('__site/phim_hoat_hinh',$data,true);
        unset($data['__phim_hoat_hinh']);
        $this->cacher->set('phim_hoat_hinh',$data['phim_hoat_hinh']);
        }
        if(!$data['phim_co_trang']=$this->cacher->get('phim_co_trang')){
        $data['__phim_co_trang'] = $this->db->from('film')
                ->where_in('film_cat',array(12))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_co_trang']=$this->load->view('__site/phim_co_trang',$data,true);
        unset($data['__phim_co_trang']);
        $this->cacher->set('phim_co_trang',$data['phim_co_trang']);
        }
        if(!$data['phim_tam_ly']=$this->cacher->get('phim_tam_ly')){
        $data['__phim_tam_ly'] = $this->db->from('film')
                ->where_in('film_cat',array(4))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_tam_ly']=$this->load->view('__site/phim_tam_ly',$data,true);
        unset($data['__phim_tam_ly']);
            $this->cacher->set('phim_tam_ly',$data['phim_tam_ly']);
        }
        
        if(!$data['phim_hai_huoc']=$this->cacher->get('phim_hai_huoc')){
        $data['__phim_hai_huoc'] = $this->db->from('film')
                ->where_in('film_cat',array(7))
                ->order_by('film_time_update','desc')
                ->limit(20,0)
                ->get()->result();
        $data['phim_hai_huoc']=$this->load->view('__site/phim_hai_huoc',$data,true);
        unset($data['__phim_hai_huoc']);
            $this->cacher->set('phim_hai_huoc',$data['phim_hai_huoc']);
        }
        $data['temp'] = '__site/home';
        $this->load->view('__site/template/master',$data);
    }
    
    function register(){
        
    }
    
    function login(){
        
    }

}
