<?php

namespace app\Model;



class conn{

    private static $instance;

    public static function getConn() {

    if(!isset(self::$instance)):
        self::$instance = new \PDO('mysql:host=localhost;dbname=moboplan;charset=utf8;port=3306','francisco','root');        
    endif;
        return self::$instance;          
    }
}


?>