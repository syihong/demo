<?php
include "../common.php";

//非静态：
function normalfun(){
	
	$num = 0;
	dump($num);
	$num++;
}

normalfun();
normalfun();
normalfun();

echo "--------------------------------";

//静态：
function staticfun(){
	
	static $num = 0;
	dump($num);
	$num++;
}

staticfun();
staticfun();
staticfun();


?>