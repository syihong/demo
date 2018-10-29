 <?php
    /**
     * Author: Wei ZhiHua
     * Date: 2017/6/30 0030
     * Time: 上午 10:15
     */
    header('Content-Type:text/html;Charset=utf-8;');
    include "RSA.php";
	include "../common.php";
    echo '<pre>';
    
    $pubfile = '.\rsa_public_key.pem';
    $prifile = '.\rsa_private_key.pem';
    $rsa = new RSA($pubfile, $prifile);
    $rst = array(
        'ret' => 'c',
        'code' => 1,
        'data' => array(1, 2, 3, 4, 5, 6),
		'message'  =>'测试中文是否可行',
        'msg' => "success",
    );
    $ex = json_encode($rst,JSON_UNESCAPED_UNICODE);//不加 中文不转为unicode 乱码而错误;
    //加密
    $ret_e = $rsa->encrypt($ex);
    //解密
    $ret_d = $rsa->decrypt($ret_e);
	
    dump( $ret_e); //加密(每次输出结果都不一样)
    
    dump( $ret_d); //解密
    
    
    $a = 'test';
    //签名
    $x = $rsa->sign($a);//参数必须为string
    //验证
    $y = $rsa->verify($a, $x);
	
	dump($x);//签名
	
	dump($y);//验证

    exit;