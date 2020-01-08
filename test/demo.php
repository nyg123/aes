<?php
require_once "../src/Aes.php";

use Nyg\Aes;
$data=['name'=>'张三','email'=>'admin@admin.com'];
$key='4r5ewt64ewt78tr7ey8e9y7';
$sign=Aes::sign_encrypt($data,$key);
echo $sign."\n\r";
$bool=Aes::sign_decrypt($data,$sign,$key);
var_dump($bool);