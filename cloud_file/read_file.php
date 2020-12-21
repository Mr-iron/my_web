<?php
function read_txt($file)
{
    $fop = fopen($file, "r");
    $allFileContent = fread($fop, filesize($file));
    return str_replace("\n", "<br/>", $allFileContent);
}

function read_md($file)
{
    $fop = fopen($file, "r");
    $allFileContent = fread($fop, filesize($file));

    $md_src = str_replace("\n", "<br/>", $allFileContent);
    return $md_src;
}

function read_jpg($file)
{
    // $fop = fopen($file, "r");
    // $allFileContent = fread($fop, filesize($file));

    // $md_src = str_replace("\n", "<br/>", $allFileContent);
    return '不支持';
}



$file_name = $_GET['data'];
$file_path = "/home/pi/my_web/cloud_file/store/" . $file_name;
$file_type = substr(strrchr($file_name, '.'), 1);

if (file_exists($file_path)) {
    switch ($file_type) {
        case 'txt':
            $out = read_txt($file_path);
            break;
        case 'md':
            $out = read_md($file_path);
            break;
        case 'jpg' || 'jpeg':
            $out = read_jpg($file_path);
            break;
        default:
            $out = "格式不支持";
    }
} else {
    $out = "未选择文件";
}
echo $out;
