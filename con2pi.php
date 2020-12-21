<?php

//获得来自 URL 的 q 参数
$q = $_GET["pi"];
if ($q == "led_open" or $q == "led_close") {
  $file = fopen("/home/pi/my_web/tmp/led_control.txt", "w");
  //如果 q 大于 0，则查找数组中的所有提示
  if ($q == "led_open") {
    $str = "1";
  } elseif ($q == "led_close") {
    $str = "0";
  }

  fwrite($file, $str);
  fclose($file);
} elseif ($q == "get_led") {
  $file = fopen("/home/pi/my_web/tmp/led_control.txt", "r");
  $hint = fgets($file);
  if ($hint == "1") {
    $response = "1";
  } elseif ($hint == "0") {
    $response = "0";
  }
} elseif ($q == "get_temp") {
  $file = fopen("/sys/class/thermal/thermal_zone0/temp", "r");
  $temp = fgets($file) / 1000;
  fclose($file);
  $response = $temp;
} else {
  $response = "错误";
}
//输出响应
echo $response;
