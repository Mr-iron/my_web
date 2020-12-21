<?php
$file = "/home/pi/my_web/cloud_file/store/" . $_GET['data'];
echo $file;
if (!unlink($file))
{
echo ("Error deleting $file");
}
else
{
echo ("Deleted $file");
}
?>
