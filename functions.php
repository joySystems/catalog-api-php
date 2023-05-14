<?php


function get_all_categories($url, $user, $pass) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $user.":". $pass);
    
    $result = curl_exec($ch);
    
    if ($e = curl_error($ch)) {

        $data_json = array("data" => "error", "error" => $e);
        
    }else{
        
        $data_json = json_decode($result, true);
        //var_dump($data_json);
    }
    
    curl_close($ch);

    if ($data_json['error'] == ""){
       
        return $data_json['data'];

    }else{

        return $data_json['error'];

    }

}



function get_category_articles($id, $url, $user, $pass) {
    
    $cat_url = $url.$id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $cat_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $user.":". $pass);
    
    $result = curl_exec($ch);
    
    if ($e = curl_error($ch)) {

        $data_json = array("data" => "error", "error" => $e);
        
    }else{
        
        $data_json = json_decode($result, true);
        //var_dump($data_json);
    }
    
    curl_close($ch);

    if ($data_json['error'] == ""){
       
        return $data_json['data'];

    }else{

        return $data_json['error'];

    }

}



function get_article($id, $url, $user, $pass) {
    
    $cat_url = $url.$id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $cat_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $user.":". $pass);
    
    $result = curl_exec($ch);
    
    if ($e = curl_error($ch)) {

        $data_json = array("data" => "error", "error" => $e);
        
    }else{
        
        $data_json = json_decode($result, true);
        //var_dump($data_json);
    }
    
    curl_close($ch);

    if ($data_json['error'] == ""){
       
        return $data_json['data'];

    }else{

        return $data_json['error'];

    }

   

}


?>