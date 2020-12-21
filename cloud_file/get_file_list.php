<?php
$dir = "/home/pi/my_web/cloud_file/store";
$handler = opendir($dir);
while (($filename = readdir($handler)) !== false) {
    // 务必使用!==，防止目录下出现类似文件名“0”等情况  
    if ($filename !== "." && $filename !== "..") {
        $path = 'http://x32r593676.qicp.vip/cloud_file/store/' . $filename;
        $file = array('id' => $filename, 'srcs' => $path);
        $files[] = $file;
    }
}
closedir($handler);

$q = $_GET["data"];
if ($q == "list") {
    $response = json_encode($files, JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE中文
    echo $response;
}
