<?php

/**
 * 
 */
class Send_email_library {

    var $CI = '';
    var $config = array();

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('email');
        $this->CI->load->model('User_model');
        $this->config = $this->set_config_email();
    }

    function send_email_confirm($email, $message) {
        $this->CI->load->library('email');
        $data = array();
        if (count($this->config > 0)) {
            $this->CI->email->initialize($this->config);
            if (isset($email['user_id'])) {
                $user_info = $this->CI->User_model->getInfoLogin($email['user_id']);
                //Thông tin khách hàng
                $first_name = $user_info['first_name'];
                $last_name = $user_info['last_name'];
                $phone = $user_info['phone'];
                $email_customer = $user_info['email'];
            } else {
                $data['error'] = 'Bạn chưa có tài khoản';
                return $data;
            }
            $message = str_replace('__FIRST_NAME__', $first_name, $message);
            $message = str_replace('__LAST_NAME__', $last_name, $message);
            $message = str_replace('__PHONE_NUMBER__', $phone, $message);
            $message = str_replace('__EMAIL__', $email_customer, $message);

            $message = str_replace('__NAME_ROOM__', $email['name_room'], $message);
            $message = str_replace('__TYPE_ROOM__', $email['type_room'], $message);
            $message = str_replace('__CHECK_IN__', $email['check_in'], $message);
            $message = str_replace('__CHECK_OUT__', $email['check_out'], $message);
            $message = str_replace('__PRICE__', $email['price'], $message);

            $message = str_replace('__SIMILAR_POST__', $email['address'], $message);

            //Thông tin công ty
            $email_support = $this->config->items('mail_support');
            $name_company = $this->config->items('name_companny');
            $message = str_replace('__NAME_COMPANY__', $replace, $message);
            $message = str_replace('__LOGO__', $replace, $message);
            $message = str_replace('__IMAGE__', $this->config->items('image'), $message);
            $message = str_replace('__EMAIL_SUPPORT__', $replace, $message);

//                        $message = str_replace('__EMAIL_SUPPORT__', $replace, $message);
//                        $message = str_replace('__SIMILAR_POST__', $replace, $message);
//                        $message = str_replace('__EMAIL_SUPPORT__', $replace, $message);
//                        $message = str_replace('__SIMILAR_POST__', $replace, $message);
//                        $message = str_replace('__EMAIL_SUPPORT__', $replace, $message);
//                        $message = str_replace('__SIMILAR_POST__', $replace, $message);

            $this->CI->email->from($email_support, $name_company);
            $this->CI->email->to($email_customer);
//                        $this->CI->email->cc('lehai04.1991@gmail.com'); 

            $this->CI->email->set_mailtype("html");
            $this->CI->email->subject('Email xác nhận đặt phòng');
            $body = $this->CI->load->view('email_config_order.php', $data, TRUE);
            $this->CI->email->message($body);

            if ($this->CI->email->send()) {
                // trường hợp gửi email thành công
            } else {
                //trường hợp gửi email thất bại
            }
        }
    }

    function get_config_email() {
        return $this->config;
    }

    function set_config_email($type_email = 'gmail', $addressEmailSmtp = 'lehai04.1991@gmail.com', $addressPassSmtp = 'pymzrhbdgpfkuwac', $charset = 'utf-8') {
        if ($type_email != 'gmail') {
            return FALSE;
        } else {
            $this->config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => '465',
                'smtp_timeout' => '7',
                'smtp_user' => $addressEmailSmtp,
                'smtp_pass' => $addressPassSmtp,
                'charset' => $charset,
                'newline' => '\r\n',
                'crlf' => '\r\n',
                'mailtype' => 'html',
                'validation' => TRUE
            );
        }
    }

}

?>