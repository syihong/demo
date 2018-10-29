<?php
class Person {
    public $name = 'asdf';
    public $age;

    //定义一个构造方法初始化赋值
   

    function say() {
        echo "我的名字叫：".$this->name."<br />";
		echo "我的年龄是：".$this->age;
    }
}

$p1=new Person();
$p1->say();
?>