<?php

include __DIR__.'/includes/headerEcletica.php';
include('protect.php');
$usuarioLogado = intval($_SESSION['id']);

require_once 'vendor/autoload.php';
$operadorLogado = new \app\model\usuarioLogado();
$operadorLogado->setIdUsuario($usuarioLogado);
// $operadorLogadoDao = new \app\model\usuarioLogadoDao();
$usuarioLogado = new \app\model\usuarioLogadoDao();
$usuarioLogado->usuarioLogado($operadorLogado);
foreach($usuarioLogado->usuarioLogado($operadorLogado) as $validado):
  //print_r($validado);
endforeach;

echo "Seja bem vindo " . $validado['nome'] . ' !';


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

<div><?php echo $validado['nome']?></div>
<div id="menubar">
    <a href="logout.php">sair!</a>
  
    
</body>
</html>

