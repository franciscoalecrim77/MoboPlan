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
            <img class="logo" src="img/pig.jpg" alt="a" >            
            <output id="hora" class="hora"></output>
            <output id="data" class="data"> - </output>        
            <p class="usuario"><?php echo "Seja bem vindo " . $validado['nome'] . ' ! ';?></p>
            <p class="titulo">Controle de ponto</p>

        </div>
        
		
    </header>
           <nav>
            <ul class="menu">
                <li><a href="#">Cadastro</a>
                    <ul>
                        <li><a href="#">Acessos</a></li>
                        <li><a href="#">Dados Pessoais</a></li>
                        <li><a href="#">Design</a></li>
                    </ul>
                </li>
                <li><a href="#">Relatórios</a>
                    <ul>
                        <li><a href="#">Banco de Horas</a></li>
                        <li><a href="#">Registro de Ponto</a></li>
                        <li><a href="#">Modelação</a></li>
                    </ul>
                </li>
                <li class="BotaoSair"><a href="logout.php">Sair</a>
                    
                </li>
            <ul>
        </nav>

        <div>
            <form action="" method="post">

            </form>
        </div>
        

</body>

<script>
    
</script>
</html>