<?php

$host = 'localhost';
$db = "moboplan";
$user = "francisco";
$password = "root";
$port = "3306";

$mysqli = new mysqli($host, $user, $password, $db, $port);

if ($mysqli->connect_errno) {
   echo "erro ao conectar ao banco de dados";
} else {
    echo "conectado com sucesso";
}


?>