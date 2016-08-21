<?php

class Book_library {

    var $CI = '';
    var $config = array();

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('Post_room_model');
    }

    /*
     * Tính giá trong 1 tuần
     * input:
     *      Số ngày ở
     *      Ngày đặt biệt
     *      Số tiền ngày thường
     *      Số tiền ngày dặt biệt
     *      Số khách vượt quá
     *      Tiền khách vượt quá
     *      Chi phí dọn dẹp
     *      Thuế VAT 
     */

    function getMoneyInWeek($day, $weekend, $moneyNormarDay, $moneyWeekend, $guestExcess=0, $moneyGuestExcess=0) {
        $data = array();
        $data['money'] = 0;
        //Tính tiền
        // cách 1 tính từng ngày 1;
//        for($i=$day['dayCheckIn'];$i<=$day['dayCheckOut']->format('N')+1;$i++){
//            if(in_array($i, $moneyWeekend))
//                    $data['money']+=($moneyWeekend + $guestExcess*$moneyGuestExcess);
//            else
//                $data['money'] +=($moneyNormarDay + $guestExcess*$moneyGuestExcess);
//        }
        // cách 2: tính từ ngày bình thường đến trước ngày cuối tuần + ngày cuối tuần
        $numberWeekend = 0;
        $dayDistance = $day['CheckOutWeek'] - $day['CheckInWeek']+1;
        foreach ($weekend as $key => $value) {
            if ($value >= $day['CheckInWeek'] && $value <= $day['CheckOutWeek']){
                $numberWeekend ++;
            }
        }
        $data['money'] = ($dayDistance - $numberWeekend)*$moneyNormarDay + $numberWeekend * $moneyWeekend + $dayDistance * $moneyGuestExcess * $guestExcess;
        $data['numberNormarDay'] = $dayDistance - $numberWeekend;
        $data['numberWeekend'] = $numberWeekend;
        return $data;
    }

    function getMoney($day, $guest, $dataPostRoom, $room_id=-1 ,$tax='') {
        $data = array();
        if ($room_id >= 0) {
            $dataPostRoom = $this->CI->Post_room_model->get_row(array('where' => array('post_room_id' => $room_id)));
            if (count($dataPostRoom) <= 0) {
                $data['error'] = array(
                    'success' => FALSE,
                    'message' => lang('unknown_order_room'),
                );
                return $data;
            }
        }
        if (!is_array($day) ||
                (!isset($day['checkin']) && !$this->CheckFormatDay($day['checkin'])) ||
                (!isset($day['checkout']) && !$this->CheckFormatDay($day['checkout']))
        ) {
            $data['error'] = array(
                'success' => FALSE,
                'message' => lang('unknown_day'),
            );
            return $data;
        }

        $date1 = new DateTime();
        $date2 = new DateTime();
        $day['checkin'] = $date1->setDate(
                date('Y', strtotime(str_replace('/', '-', $day['checkin']))), date('m', strtotime(str_replace('/', '-', $day['checkin']))), date('d', strtotime(str_replace('/', '-', $day['checkin'])))
        );
        $day['checkout'] = $date2->setDate(
                date('Y', strtotime(str_replace('/', '-', $day['checkout']))), date('m', strtotime(str_replace('/', '-', $day['checkout']))), date('d', strtotime(str_replace('/', '-', $day['checkout'])))
        );
        if ($day['checkin'] > $day['checkout']) {
            $data['error'] = array(
                'success' => FALSE,
                'message' => lang('unknown_day'),
            );
            return $data;
        }
        $numberDay = $day['checkout']->diff($day['checkin']);
        
        $dataCaculatorMoney = array(
            'CheckInWeek' => $day['checkin']->format('N') + 1,
            'CheckOutWeek' => $day['checkout']->format('N')<$day['checkin']->format('N')?$day['checkout']->format('N')+8:$day['checkout']->format('N')+1,
            'weekend' => explode(',', $dataPostRoom->type_last_week),
            'guestExcess' => $guest >= $dataPostRoom->num_guest ? $guest - $dataPostRoom->num_guest : 0,
            'moneyGuestExcess' => $dataPostRoom->price_guest_more_vn,
            'clearningFee' => $dataPostRoom->clearning_fee_vn,
            'moneyWeekend' => $dataPostRoom->price_lastweek_vn
        );
        if ($numberDay->days < 6){
//            echo 'TH1';
            $dataCaculatorMoney['moneyNormarDay'] = $dataPostRoom->price_night_vn;
            $result_calculator = $this->getMoneyInWeek(
                    array('CheckInWeek' => $dataCaculatorMoney['CheckInWeek'],'CheckOutWeek' => $dataCaculatorMoney['CheckOutWeek']), 
                    $dataCaculatorMoney['weekend'], 
                    $dataCaculatorMoney['moneyNormarDay'], 
                    $dataCaculatorMoney['moneyWeekend'], 
                    $dataCaculatorMoney['guestExcess'], 
                    $dataCaculatorMoney['moneyGuestExcess']
                );
            if(isset($result_calculator['error'])){
                return $result_calculator['error'];
            }else{
                $data['type'] = 1;
                $data['numberNormarDay'] = $result_calculator['numberNormarDay'];
                $data['moneyNormarDay'] = $dataCaculatorMoney['moneyNormarDay'];
                $data['numberWeekend'] = $result_calculator['numberWeekend'];
                $data['moneyWeekend'] = $dataCaculatorMoney['moneyWeekend'];
                $data['guestExcess'] = $dataCaculatorMoney['guestExcess'];
                $data['moneyGuestExcess'] = $dataCaculatorMoney['moneyGuestExcess'];
                $data['money'] = $result_calculator['money'];
            }
                
        }
        elseif ($numberDay->days < 19 && $numberDay->days >= 6){
//            echo 'truong hop 2';
            // tiền tính theo tuần đầu tiên 7 ngày
            $dataCaculatorMoney['moneyNormarDay'] = $dataPostRoom->price_week_vn;
            $result_calculator = $this->getMoneyInWeek(
                    array('CheckInWeek' => $dataCaculatorMoney['CheckInWeek'],'CheckOutWeek' => $dataCaculatorMoney['CheckInWeek']+6), 
                    $dataCaculatorMoney['weekend'], 
                    $dataCaculatorMoney['moneyNormarDay']/7, 
                    $dataCaculatorMoney['moneyWeekend']
                );
            $numberWeek = floor(($numberDay->days+1)/7);
            $numberDayExcess = ($numberDay->days+1)%7;
            $resultCalculatorExcess = $this->getMoneyInWeek(
                array('CheckInWeek' => $dataCaculatorMoney['CheckInWeek'],'CheckOutWeek' => $dataCaculatorMoney['CheckInWeek']-1+$numberDayExcess), 
                $dataCaculatorMoney['weekend'], 
                $dataCaculatorMoney['moneyNormarDay']/7, 
                $dataCaculatorMoney['moneyWeekend']
            );
            $data['type'] = 2;
            $data['money'] = $numberWeek*$result_calculator['money']+$resultCalculatorExcess['money'] + $dataCaculatorMoney['guestExcess']*$dataCaculatorMoney['moneyGuestExcess']*($numberDay->days+1);
            $data['numberNormarDay'] = $numberWeek*$result_calculator['numberNormarDay']+$resultCalculatorExcess['numberNormarDay'];
            $data['moneyNormarDay'] = $dataCaculatorMoney['moneyNormarDay'];
            $data['numberWeekend'] = $numberWeek*$result_calculator['numberWeekend']+$resultCalculatorExcess['numberWeekend'];
            $data['moneyWeekend'] = $dataCaculatorMoney['moneyWeekend'];
            $data['guestExcess'] = $dataCaculatorMoney['guestExcess'];
            $data['moneyGuestExcess'] = $dataCaculatorMoney['moneyGuestExcess'];
        }
        else{
//            echo 'TH 3';
            $dataCaculatorMoney['moneyNormarDay'] = $dataPostRoom->price_month_vn;
            $result_calculator = $this->getMoneyInWeek(
                    array('CheckInWeek' => $dataCaculatorMoney['CheckInWeek'],'CheckOutWeek' => $dataCaculatorMoney['CheckInWeek']+6), 
                    $dataCaculatorMoney['weekend'], 
                    $dataCaculatorMoney['moneyNormarDay']/30, 
                    $dataCaculatorMoney['moneyWeekend']
                );
            $numberWeek = floor(($numberDay->days+1)/7);
            $numberDayExcess = ($numberDay->days+1)%7;
//            return;
            $resultCalculatorExcess = $this->getMoneyInWeek(
                array('CheckInWeek' => $dataCaculatorMoney['CheckInWeek'],'CheckOutWeek' => $dataCaculatorMoney['CheckInWeek']-1+$numberDayExcess), 
                $dataCaculatorMoney['weekend'], 
                $dataCaculatorMoney['moneyNormarDay']/30, 
                $dataCaculatorMoney['moneyWeekend'] 
            );
            $data['type'] = 3;
            $data['money'] = $numberWeek*$result_calculator['money']+$resultCalculatorExcess['money'] + $dataCaculatorMoney['guestExcess']*$dataCaculatorMoney['moneyGuestExcess']*($numberDay->days+1);;
            $data['numberNormarDay'] = $numberWeek*$result_calculator['numberNormarDay']+$resultCalculatorExcess['numberNormarDay'];
            $data['moneyNormarDay'] = $dataCaculatorMoney['moneyNormarDay'];
            $data['numberWeekend'] = $numberWeek*$result_calculator['numberWeekend']+$resultCalculatorExcess['numberWeekend'];
            $data['moneyWeekend'] = $dataCaculatorMoney['moneyWeekend'];
            $data['guestExcess'] = $dataCaculatorMoney['guestExcess'];
            $data['moneyGuestExcess'] = $dataCaculatorMoney['moneyGuestExcess'];
        }
        $data['money']+=$dataPostRoom->clearning_fee_vn;
        $data['clearning_fee'] = $dataPostRoom->clearning_fee_vn;
        $data['guest'] = $guest;
        if ($tax!=''&& is_array($tax)&&$this->CI->config->item('tax')){
            $data['tax'] = 0;
            foreach ($tax as $key => $value) {
                $data['money'] += ($data['money'] * $value / 100);
                $data['tax'] +=($data['money'] * $value / 100); 
            }
        }
        return $data;
    }

    /*
     * Format Day: 2016-06-12
     * YYYY-MM-D
     *      */

    function CheckFormatDay($day) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date))
            return true;
        else
            return false;
    }

}

?>