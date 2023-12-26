<?php

require_once 'vendor/autoload.php';
//include ('includes/headerLogin.php');
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$validado = null;    
$usuarioLogado = Null;
$validado = NULL;
$email =    (empty($_POST['email']))? false : $_POST['email'];
$password = (empty($_POST['password']))? false : $_POST['password'];

$credenciais = new \app\model\validaLogin();
$credenciais->setEmail($email);
$credenciais->setPassword(base64_encode($password));
$validaLoginDao = new \app\model\validaLoginDao();
$validaLoginDao->validaLogin($credenciais);
foreach($validaLoginDao->validaLogin($credenciais) as $validado):
//   var_dump($validado);
endforeach;

if($validado == null){
    $validado == 0;
}else{
    $idUsuario = $validado['id'];
}
// $idUsuario = $validado['id_usuario'];


//var_dump($idUsuario);


    if(strlen($_POST['email']) == 0){
    echo"<script>alert('Digite o seu Email!')</script>";

    }else if(strlen($_POST['password']) == 0){
    echo"<script>alert('Digite a sua senha!')</script>";

}else if($validado >= 1){   
    $usuarioLogado = $validado;
    !isset($_SESSION);
    
    session_start();
    
    $_SESSION['id'] = $validado['pessoa_id'];

    header("location: gerencial.php");
    exit;


}else {
    echo "<script>alert('Email ou senha incorretos! Tente novamente.');</script>";
   

}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
</head>

    <section class="area-login">
        <div class="login">
            <div>
                <img src="img/ecletica.png" alt="">
            </div>
        

            <form action="" method="post">
            <input type="email" name="email" placeholder="E-mail" autofocus>
            <input type="password" name="password" placeholder="Digite a sua senha">
            <input type="submit" value="Login">
            </form>

            <p>Não é cadastrado? <a href="cadOperador.php">Clique aqui</a></p>
                
        </div>
    </section>


