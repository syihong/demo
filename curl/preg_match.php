<?php
include "../common.php";
// 从URL中获取主机名称
preg_match('@^(?:http://)?([^/]+)@i',"http://www.runoob.com/index.html", $matches);

dump($matches);
dump($matches[1]);

//preg_match('/[0-9]+/',"sdfg345234fdg", $matches);

//dump($matches);


// 获取主机名称的后面两部分
//preg_match('/[^.]+\.[^.]+$/', $host, $matches);
//echo "domain name is: {$matches[0]}\n";
?>