<?php
    function get_config_email($address_email='lehai04.1991@gmail.com', $pass_email='pymzrhbdgpfkuwac', $charset = 'utf-8'){
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $address_email;
        $config['smtp_pass']    = $pass_email;
        $config['charset']    = $charset;
        $config['newline']    = "\r\n";
        $config['crlf']    = "\r\n";
        $config['mailtype'] = "html"; 
        $config['validation'] = TRUE;  
        return $config;
    }
    
    function send_email_(){
        
    }