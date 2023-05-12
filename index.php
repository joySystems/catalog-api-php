<?php
$user = "labsales_test";
$pass = "18765gR5";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://test.labsales.ru/tasks/articles/rest/categories");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $user.":". $pass);

$result = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
}else{

    $data_json = json_decode($result, true);
    var_dump($data_json);
}

curl_close($ch);










?>