<?php

$host = '127.0.0.1';
$user = "francisco";
$password = "weagle";
$db = "desenvolvimento";
//$port = "3308";

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
   echo "erro ao conectar ao banco de dados";
} else {
    //echo "conectado com sucesso";
}


?>