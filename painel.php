<?php

include __DIR__.'/includes/headerEcletica.php';
include('protect.php');
$operadorLogado = new \app\model\cadOperador();
$operadorLogado->setIdUsuario($_SESSION['id_usuario']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/painesl.css">
    <title>Painel de controle</title>
</head>
<body>

<div id="menubar">
    <a href="logout.php">sair!</a>
  
    
</body>
</html>

