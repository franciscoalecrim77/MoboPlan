<?php

if(!isset($_SESSION)){
    session_start();
}


if(!isset($_SESSION['id']))

    die("Voce não pode acessar este conteudo, pois não esta logado. <p> <a href=\"index.php\">Entrar</a></p>")

?>