<?php
//include 'library/db.php';
include __DIR__.'/includes/headerEcletica.php';
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");



//$mail = isset($_POST['email']);
//$password = isset($_POST['senha']);

if(isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) == 0){
        echo"<script>alert('Digite o seu email!')</script>";
    } else if (strlen($_POST['senha']) == 0){

        echo"<script>alert('Digite a sua senha!')</script>";
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
            
      
                
                echo "<script>alert('Email ou senha incorretos! Tente novamente.');</script>";
                
        }
    }

        
    
}

?>


    <section class="area-login">
        <div class="login">
            <div>
                <img src="img/logo.png" alt="">
            </div>
        

            <form action="" method="post">
            <input type="email" name="email" placeholder="E-mail" autofocus>
            <input type="password" name="senha" placeholder="Digite a sua senha">
            <input type="submit" value="Login">
            </form>

            <p>Não é cadastrado? <a href="cadastro.php">Clique aqui</a></p>
                
        </div>
    </section>
</body>
</html>

