<?php
/*
静态属性和常量必须用 ::name  来访问。但是静态方法都可以（静态方法内部不可有$this）
$p1 = new Person(); 
//echo $p1->country;   // 错误写法




*/
Class Person{
    // 定义静态成员属性
     static $country = 10;
	 
	 //self::$country++;
    // 定义静态成员方法
    public static function myCountry() {
		self::$country++;
        // 内部访问静态成员属性
        echo "我是".self::$country."人<br />";
		
    }
}
class Student extends Person {
    function study() {
		$p1 = new Person();
		$p1->myCountry();
		$p1->myCountry();
		//self::myCountry();
        //echo "我是". parent::$country."人<br />";
    }
}

//Person::$country++;

$t1 = new Student();
$t1->study();    // 输出：我是中国人

// echo "我是".Person::$country."人<br />";

$t1 = new Student();
$t1->study();    // 输出：我是中国人
?>