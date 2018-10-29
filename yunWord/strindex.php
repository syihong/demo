
<?php

$str = file_get_contents("word.txt");//将整个文件内容读入到一个字符串中
$content = iconv("gb2312","utf-8//IGNORE",$str);
$content = json_decode($content, true);//字符串一定要带：{}

$output = '';
if(!is_array($content)){
    $output = false;
}

foreach ($content as $k=>$v){
    $output.= $k." => '" .$v."' //<br/>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文档工具</title>
</head>
<body>
<?php echo $output; ?>
</body>
</html>