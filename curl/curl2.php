<?php

include "../common.php";
/*
curl最重要4个函数：
curl_init();初始化
curl_setopt();设置选项
curl_exec();执行并获取
curl_close();释放句柄

*/

/**
 *@desc 封闭curl的调用接口，get的请求方式。
*/
function doCurlGetRequest($url,$data,$timeout = 5){
 
 $url = $url.'?'.http_build_query($data);
 dump($url);
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  //或者：$ch = curl_init((string)$url);
  
 curl_setopt($ch, CURLOPT_HEADER, false);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch, CURLOPT_TIMEOUT, (int)$timeout);
 
 dump( curl_exec($ch));
}

//doCurlGetRequest("http://www.test.com/curl/curl_test.php",array('param'=>1234));

 
 
 /**
** @desc 封装 curl 的调用接口，post的请求方式
**/
function doCurlPostRequest($url,$requestString,$timeout = 5){
 if($url == '' || $requestString == '' || $timeout <=0){
 return false;
 }
 dump($url);
  dump($requestString);
 $con = curl_init((string)$url);
 curl_setopt($con, CURLOPT_HEADER, false);
 curl_setopt($con, CURLOPT_POST,true);//必须放在CURLOPT_POSTFIELDS前面设置
 curl_setopt($con, CURLOPT_POSTFIELDS, $requestString);
 curl_setopt($con, CURLOPT_RETURNTRANSFER,true);
 curl_setopt($con, CURLOPT_TIMEOUT,(int)$timeout);
 dump( curl_exec($con)); 
}
doCurlPostRequest("http://www.test.com/curl/curl_test.php",array('post_param'=>'post_param'));

 
 private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    curl_setopt($curl,CURLOPT_CAINFO,dirname(__FILE__).'/cacert.pem');//这是根据http://curl.haxx.se/ca/cacert.pem 下载的证书，添加这句话之后就运行正常了
    curl_setopt($curl, CURLOPT_URL, $url);
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;

}

?>
