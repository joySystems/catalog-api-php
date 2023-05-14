<?php

require_once('constants.php');

$user = USERNAME;
$pass = PASSWORD;
$categories_url = CATS_URL;


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $categories_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $user.":". $pass);

$result = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo "ответ curl:". '<br>';
    echo $e;
}else{
    echo "ответ сервера:". '<br>';
    $data_json = json_decode($result, true);
    var_dump($data_json);
}

curl_close($ch);










?>