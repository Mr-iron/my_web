<?php
$type = $_REQUEST["type"];
$data = $_REQUEST["data"];

$child_dir = "data/md";
$father_dir = "/home/pi/my_web/";

$full_dir = $father_dir . $child_dir;
$url_dir = "http://x32r593676.qicp.vip/" . $child_dir;

if ($type == "refresh") {
    $handler = opendir($full_dir);
    while (($filename = readdir($handler)) !== false) {
        $file_type = substr(strrchr($filename, '.'), 1);
        // 务必使用!==，防止目录下出现类似文件名“0”等情况  
        if ($filename !== "." && $filename !== ".." && $file_type == "md") {
            $path = $url_dir . "/" . $filename;
            $file = array('id' => $filename, 'srcs' => $path);
            $files[] = $file;
        }
    }
    closedir($handler);
    sort($files);
    $response = json_encode($files, JSON_UNESCAPED_UNICODE); //JSON_UNESCAPED_UNICODE中文
    echo $response;
} elseif ($type == "delete") {
    $file = $full_dir . "/" . $data;
    echo $file;
    if (!unlink($file)) {
        echo ("Error deleting $file");
    } else {
        echo ("Deleted $file");
    }
} elseif ($_FILES["file"]["error"] == 0) {
    $file_type = substr(strrchr($_FILES["file"]["name"], '.'), 1);
    if ($file_type == "md") {
        move_uploaded_file($_FILES["file"]["tmp_name"], $full_dir . "/" . $_FILES["file"]["name"]);
        echo "文件存储成功: " . $full_dir . "/" . $_FILES["file"]["name"];
    }
}else{
    echo "test1";
}
