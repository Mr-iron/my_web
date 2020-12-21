<?php
$filePath = "tmp/weibo_top.csv";
//读数据 
$file = fopen($filePath, 'r');
while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
    $csv_list[] = $data;    //CSV二维数组结果[行][列]
}
fclose($file);

$response = json_encode($csv_list, JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE中文
echo $response;
?>
