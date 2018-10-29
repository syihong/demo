<?php
/*
1.静态变量是公用的，单独的静态存储空间，一次程序执行过程中，一个静态变量只开辟一个空间，也只改变这一个空间


2.静态属性和常量必须用 ::name  来访问。但是静态方法都可以（静态方法内部不可有$this）
$p1 = new Person(); 
//echo $p1->country;   // 错误写法




*/


Class Person{
    // 定义静态成员属性
     static $count = 10;
	 
    // 定义静态成员方法
    public static function myCountry() {
		self::$count++;
        // 内部访问静态成员属性
        echo "有".self::$count."人<br />";
		
    }
}
class Student extends Person {
    function study() {
		$p1 = new Person();
		$p1->myCountry();
		//或者：self::myCountry();
    }
}

//Person::$count++;

$t1 = new Student();
$t1->study();    // 输出：有11人


$t1 = new Student();
$t1->study();    // 输出：有12人


$t1 = new Student();
$t1->study();    // 输出：有13人

$t1 = new Student();
$t1->study();    // 输出：有14人

?>