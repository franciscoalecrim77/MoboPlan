<?php
include 'db.php';
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");



//$mail = isset($_POST['email']);
//$password = isset($_POST['senha']);

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo"digite seu email";
    } else if (strlen($_POST['senha']) == 0){

        echo"Digite sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sql_query = "SELECT * FROM usuarios where email = '$email' and senha = '$senha'";
        $sql_result = $mysqli -> query($sql_query) or die("Falha ao realizar consulta");

        $resultado = $sql_result->num_rows;

        if($resultado == 1){

            $usuario = $sql_result->fetch_assoc();   

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['nome'];

            header("location: painel.php");

        }else {
            echo "falha ao logar, E-mail ou senha incorretos";
        }
    }

        
    
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Oficial</title>
    <link rel="icon" href="img/icone.png">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="titulo" id="titulo"> teste teste teste testeSistema de planejamento financeiro</div>
        
    <form action="" method="post" class="login" id="login">
        <div class="conect" id="conect">
        <label>Email</label>
        <input type="email" name="email" id="email">
        <Br></Br>
        <label>Senha</label>
        <input type="password" name="senha" id="senha"> 
        </div>
        <Br></Br>
        <label>Clique aqui para logar</label>
        <input type="submit" value="Login">

        <div>
            <label for=""><a href="cadastro.php"> Não é cadastrado? clique aqui</a> </label>
            <a href="cadastro.php"> </a>
        </div>
    </form>
    
</body>
</html>

