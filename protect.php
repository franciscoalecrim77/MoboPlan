<?php

if(!isset($_SESSION)){
    session_start();
//echo $_SESSION['id'];
}


if(!isset($_SESSION['id']))

    die("Voce não pode acessar este conteudo, pois não esta logado. <p>")

?>