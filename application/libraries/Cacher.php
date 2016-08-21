<?php

class Cacher {

    protected $CI;

    public function __construct() {
        $this->CI = & get_instance(); //grab an instance of CI
        $this->initiate_cache();
    }

    public function initiate_cache() {
        $this->CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }
    
    public function get($nameCache){
        $cache = $this->CI->cache->get($nameCache)?$this->CI->cache->get($nameCache):'';
        return $cache;
    }
    
    public function set($nameCache,$data,$time=28800){
        if($this->CI->cache->save($nameCache, $data, $time))return true;
        else return false;
    }
//    if ( ! $foo = $this->cache->get('foo1')){
//            echo 'Saving to the cache!<br />';
//            $foo = 'foobarbaz!';
//            // Save into the cache for 5 minutes
//            $this->cache->save('foo1', $foo, 300);
//        }
//        echo $this->cache->get('foo1');
//        exit;

}
