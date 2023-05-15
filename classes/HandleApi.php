<?php



class HandleApi {

private $user;
private $pass;



public function __construct($user,$pass) {
    $this->user = $user;
    $this->pass = $pass;
}

// Метод запроса данных
public function getApiData($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $this->user . ':' . $this->pass);
    
    $result = curl_exec($ch);
    
    if ($e = curl_error($ch)) {

        $data_json = array("data" => "error", "error" => $e);
        
    }else{
        
        $data_json = json_decode($result, true);
        
    }
    
    curl_close($ch);

    if ($data_json['error'] == ""){
       
        return $data_json['data'];

    }else{

        return $data_json['error'];

    }

}


}

?>