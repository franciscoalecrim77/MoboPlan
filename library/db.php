<?php

$host = 'localhost';
$db = "moboplan";
$user = "francisco";
$password = "Ecl3t1c@f00d9";
$port = "3308";

$mysqli = new mysqli($host, $user, $password, $db, $port);

if ($mysqli->connect_errno) {
   echo "erro ao conectar ao banco de dados";
} else {
    echo "conectado com sucesso";
}


?>