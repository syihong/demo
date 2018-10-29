<?php
include "common.php";

$data = [
'st_name' => $st_name, //油站名称
'st_province' => $st_province, //油站地址-省
'st_city' => $st_city, //油站地址-市
'st_area' => $st_area, //油站地址-区
'st_address' => $st_address, //油站地址-详细地址
'st_lng' => $st_lng, //油站经度
'st_lat' => $st_lat, //油站纬度
'license_num' => $license_num, //营业执照号码
'license_img_id' => $license_img_id, //营业执照照片ID
'oil_license_num' => $oil_license_num, //成品油经营许可证号
'oil_license_img_id' => $oil_license_img_id, //成品油经营许可证照片ID
'taxer_num' => $taxer_num, //纳税人识别号
'taxer_img_id' =>$taxer_img_id, //纳税人资格证照片ID
'st_tel' => $st_tel, //办公电话
'st_response_man' => $st_response_man, //负责人姓名
'st_response_phone' => $st_response_phone, //负责人手机号
'st_service_man' => $st_service_man, //业务联系人姓名
'st_service_phone' => $st_service_phone, //业务联系人手机号
'st_finance_man' => $st_finance_man, //财务人员姓名
'st_finance_phone' => $st_finance_phone, //财务人员手机号
'service_fee_type' => $service_fee_type, //服务费计算方式(1交易金额百分比，2交易量固定)
'service_fee_rote' => $service_fee_rote, //服务费率百分比
'contract_start_date' => $contract_start_date, //合同开始日期
'contract_end_date' => $contract_end_date, //合同结束日期
'contract_img_id_str' => $contract_img_id_str, //合同照片ID(英文半角逗号分隔)
'account_bank' => $account_bank, //开户行
'account_name' => $account_name, //开户名
'account_num' => $account_num, //开户账号
'account_img_id' => $account_img_id, //开户许可证照片ID
'invoice_rote' => $invoice_rote, //开票税率百分比
];

$str  = '';
foreach($data as $k=>$v){
	$str .= "'". $k . "', ";
}
dump($str);die;































$a = json_decode('aa');

if($a == null ){
	echo 1;
}



$arr = array('key'=>'中文/同时生效');
dump(json_encode($arr));
dump(json_encode($arr,JSON_UNESCAPED_UNICODE));
dump(json_encode($arr,256));
dump(json_encode($arr,320));

dump(12*17);
///////////////////////////////////////////////////////////

dump(str_split("Shanghai",3));
dump(str_split("阿斯顿发哈阿斯蒂芬",3));


dump(get_current_user());


			

?>