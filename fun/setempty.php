<?php
include "../common.php";

$a; //true;
$arr[] = '';//true
$arr[] = ' ';//	false
$arr[] = 0;//true
$arr[] = '0';//true
$arr[] = 00;//true
$arr[] = null;//true
$arr[] = false;//true
$arr[] = array();//true

//相当于双等号判断
//只要数据类型是否为 空或假 ，empty()就输出true
foreach($arr as $v){
	dump(empty($v));
}


echo '----------------------';

$b; //false;
$brr[] = '';//true
$brr[] = ' ';//true
$brr[] = 0;//true
$brr[] = '0';//true
$brr[] = 00;//true
$brr[] = null;//	false
$brr[] = false;//true
$brr[] = array();//true

//相当于全等于判断
//isset()只能用来判断是否为NULL和未定义
foreach($brr as $v){
	dump(isset($v));
}



      $live_time = C('SMS_CODE_LIVE_TIME');
            $time_now = C('TIME_NOW');
            $time_now = isset($time_now) ? $time_now : time();
            $format_time_now = C('FORMAT_TIME_NOW');
            $format_time_now = isset($format_time_now) ? $format_time_now : date('Y-m-d H:i:s', $time_now);
            $invalid_time = date('Y-m-d H:i:s', $time_now+$live_time);

            if (!(isset($type) && 0 < $type)) {
                func_think_log_rec($log_title . '类型type异常，TYPE：' . $type);
                return [
                    'state' => -1,
                    'msg' => '类型type值异常'
                ];
            }
            if (!$is_multi) {
                if (!preg_match('/^1[3456789]\d{9}$/', $to_phone)) {
                    func_think_log_rec($log_title . '手机号phone异常，PHONE：' . $to_phone);
                    return [
                        'state' => -2,
                        'msg' => '手机号不正确'
                    ];
                }
            }

            if (!('DEMO' == C('APP_ENV') || 'PROD' == C('APP_ENV'))) { //仅演示服、正式服发送短信
                func_think_log_rec($log_title . '非[演示服/正式服]不发送短信');
                return [
                    'state' => 1,
                    'msg' => '当前环境不发送短信'
                ];
            }

            func_think_log_rec($log_title . 'START，TYPE：' . $type . '，TO_PHONE：' . json_encode($to_phone, JSON_UNESCAPED_UNICODE) . '，PARAMS_ARR：' . json_encode($params_arr, JSON_UNESCAPED_UNICODE));

            header('Content-type:text/html;charset=utf-8');

            $template_code = ''; //短信模板code
            switch ($type) {
                case 1:
                    //
                    break;
                default:
                    func_think_log_rec($log_title . 'END，ERROR，类型type不正确，TYPE：' . $type);
                    return [
                        'state' => -4,
                        'msg' => '类型type不存在'
                    ];
                    break;
            }

            //短信发送记录
            $data_log = [
                'to_phone' => !$is_multi ? $to_phone : '',
                'app_source_id' => $params_arr['app_source'],
                'user_cate' => $params_arr['user_cate'],
                'sms_code' => $template_code,

                'sms_params_json' => json_encode($params_arr, JSON_UNESCAPED_UNICODE),
                'add_time' => $format_time_now,
                'invalid_time' => $invalid_time,
                'state' => 1
            ];
            $res_sms_log = M('all_sms_code')->add($data_log);
			

?>