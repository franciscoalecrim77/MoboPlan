<?php
include("db.php");
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['nome']) || isset($_POST['datanasc']) || isset($_POST['cpf']) || isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['nome']) == 0){
        echo"Digite seu nome";
    } else if(strlen($_POST['datanasc']) == 0){
        echo"preencha a data de nascimento";
    } else if(strlen($_POST['cpf']) == null){
        echo"Preencha o seu cpf";
    }else if(strlen($_POST['email']) == 0){
        echo"Preenchao seu E-mail";
    }else if(strlen($_POST['senha']) == 0){
        echo"Preencha a sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $datanasc = $mysqli->real_escape_string($_POST['datanasc']);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $data = date('d-m-Y H:i:s');

        $verifica = mysqli_query($mysqli, "SELECT cpf FROM usuarios WHERE cpf = '$cpf'");
        $resultado = mysqli_num_rows($verifica);
        
        if($resultado == true){
            echo "Voce ja consta em nossa base de dados. Realize o acesso na tela inicial";
            echo "<meta http-equiv=\"refresh\" content=\"1; url=/\">";
        }else {
            $insert = mysqli_query($mysqli, "INSERT INTO usuarios (nome,data_nasc,cpf,email,senha,data_cadastro) VALUES ('{$nome}','{$datanasc}','{$cpf}','{$email}','{$senha}','{$data}')");
            echo "cadastro realizado com sucesso";
            echo "<meta http-equiv=\"refresh\" content=\"1; url=/\">";
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
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
    <div>
        <label for=""> Seu Nome completo
            <input type="text" name="nome" id="nome">
        </label>
        <label for=""> data de nascimento
            <input type="date" name="datanasc" id="datanasc">
        </label>
        <label for=""> CPF
            <input oninput="mascara(this)" type="text" name="cpf" id="cpf">
        </label>
        <label for=""> email
            <input type="email" name="email" id="email">
        </label>
        <label for=""> senha
            <input type="password" name="senha" id="senha">
        </label>
        <br></br>
        <label for=""> 
            <input type="submit" value="Cadastrar">
        </label>
    </div>
    </form>
</body>
<script>
    function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}
</script>
</html>