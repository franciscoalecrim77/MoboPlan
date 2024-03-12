<?php
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
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerencial</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" type="text/css"  href="css/teste.css" />
    <script type="text/javascript" src="js/header.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
		<script type="text/javascript">
			jQuery(window).load(function($){
				atualizaRelogio();  
			});
		</script>
    
</head>
<body>
    
    <header>
        <div class="header">
            <img class="logo" src="img/ecletica.jpg" alt="a" >            
            <output id="hora" class="hora"></output>
            <output id="data" class="data"></output>        
            <p class="usuario"><?php echo "Seja bem vindo - " . $validado['nome'] . ' ! ';?></p>
            <p class="titulo">Controle de ponto</p>
            <a href="registro.php" class="registrar">Registrar</a>
            <a href="logout.php" class="BotaoSair">Sair</a>
        </div>
        
		
    </header>
           

        <div>
            <form action="" method="post">

            </form>
        </div>
        

</body>

<script>
    
</script>
</html>