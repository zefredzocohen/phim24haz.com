<?php

    class Payment_library{
        var $CI = '';
        function __construct(){
            $this->CI = & get_instance();
        }
        
        function getMoneyPayDoitac($arrayIds){
//            $this->CI->load->model('order');
            $data= array();
            $data_room=$this->CI->db->from('order')
            ->join('post_room','post_room.post_room_id=order.post_room_id')->join('user','user.user_id=post_room.user_id')
            ->where('refer_id!=',0)->where_in('order_id',$arrayIds)
            ->get()->result();
            if(count($data_room)==0){
                $data['error'] = 'Không tồn tại các đơn hàng.';
                return $data;
            }
            $total = 0;
            foreach ($data_room as $row){
                $tmp = $row->payment_type*(1-$row->profit_rate/100);
                $data['payment_id'][] = $tmp;
                $data['total']+=$tmp;
            }
            return $data;
        }
    }
?>