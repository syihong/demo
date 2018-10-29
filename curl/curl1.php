<?php

include "../common.php";
/*
curl最重要4个函数：
curl_init();初始化
curl_setopt();设置选项
curl_exec();执行并获取
curl_close();释放句柄

*/
// 1. 初始化
 $ch = curl_init();
 // 2. 设置选项，包括URL
 curl_setopt($ch,CURLOPT_URL,"http://www.baidu.com");
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch,CURLOPT_HEADER,0);
 // 3. 执行并获取HTML文档内容
 $output = curl_exec($ch);
 $info = curl_getinfo($ch);
 dump($output);
dump($info);
 if($output === FALSE ){
 echo "CURL Error:".curl_error($ch);
 }
 // 4. 释放curl句柄
 curl_close($ch);
 
 
?>
