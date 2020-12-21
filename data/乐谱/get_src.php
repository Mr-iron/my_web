<?php
$dir = "/home/pi/my_web/data/乐谱/source";
$handler = opendir($dir);
while (($filename = readdir($handler)) !== false) {
    // 务必使用!==，防止目录下出现类似文件名“0”等情况  
    if ($filename !== "." && $filename !== "..") {

        $dir2 = $dir . '/' . $filename;
        $handler2 = opendir($dir2);
        $files2 = array();
        while (($filename2 = readdir($handler2)) !== false) {
            if ($filename2 !== "." && $filename2 !== "..") {
                $files2[] = '/data/乐谱/source/' . $filename . '/' . $filename2;
            }
        }
        closedir($handler2);
        // print_r($files2);
        // echo "<br>";
        sort($files2);
        // print_r($files2);
        // echo "<br>";
        $song = array('id' => $filename, 'srcs' => $files2);
        $files[] = $song;
    }
}
closedir($handler);

$q = $_GET["data"];
if ($q == "list") {
    $response = json_encode($files, JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE中文
    echo $response;
} else {
    foreach ($files as $song) {
        if ($song['id'] == $q) {
            $response = json_encode($song['srcs'], JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE中文
            echo $response;
        }
    }
}
