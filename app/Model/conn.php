<?php

namespace app\Model;



class conn{

    private static $instance;

    public static function getConn() {

    if(!isset(self::$instance)):
        self::$instance = new \PDO('mysql:host=127.0.0.1;dbname=eponto;port=3306','francisco','weagle');        
    endif;
        return self::$instance;          
    }
}


?>