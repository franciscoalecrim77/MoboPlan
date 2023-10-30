<?php

$host = 'localhost';
$db = "moboplan";
$user = "francisco";
$password = "weagle";
// $port = "3306";

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
   echo "erro ao conectar ao banco de dados";
} else {
    echo "conectado com sucesso";
}


?>