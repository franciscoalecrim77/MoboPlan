<?php

//Caso não tenha uma sessão criada, ele vai criar uma sessão.
if(!isset($_SESSION)){
    session_start();
//echo $_SESSION['id'];
}

//Se não tem uma sessão iniciada com o id do usuario, ele da a mensagem abaixo.
if(!isset($_SESSION['id']))

    die("Voce não pode acessar este conteudo, pois não esta logado. <p>")

?>