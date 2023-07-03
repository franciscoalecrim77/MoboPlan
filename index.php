<?php
require_once 'vendor/autoload.php';
include __DIR__.'/includes/headerEcletica.php';
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
$credenciais->setPassword($password);
$validaLoginDao = new \app\model\validaLoginDao();
$validaLoginDao->validaLogin($credenciais);
foreach($validaLoginDao->validaLogin($credenciais) as $validado):
  //print_r($validado);
endforeach;

if($validado == null){
    $validado == 0;
}else{
    $idUsuario = $validado['id_usuario'];
}
// $idUsuario = $validado['id_usuario'];


//var_dump($idUsuario);


    if(strlen($_POST['email']) == 0){
    echo"<script>alert('Digite o seu nome!')</script>";

    }else if(strlen($_POST['password']) == 0){
    echo"<script>alert('Digite o seu nome!')</script>";

}else if($validado >= 1){   
    $usuarioLogado = $validado;
    !isset($_SESSION);
    session_start();
    $_SESSION['id'] = $validado['id_usuario'];

    header("location: gerencial.php");


}else {
    echo "<script>alert('Email ou senha incorretos! Tente novamente.');</script>";
   
    

}







    
   /* else { var_dump($validado);
        
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
            
      
                
                echo "<script>alert('Email ou senha incorretos! Tente novamente.');</script>";
                
        }
    }

        */
}

?>


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

            <p>Não é cadastrado? <a href="cadastro.php">Clique aqui</a></p>
                
        </div>
    </section>


