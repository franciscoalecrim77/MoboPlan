<?php
require_once 'vendor/autoload.php';

setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');
if ($_SERVER['REQUEST_METHOD'] == "POST"){


$resultado = null;
    
$nome =      (empty($_POST['nome']))? false : $_POST['nome'];
$datanasc =  (empty($_POST['datanasc']))? false : $_POST['datanasc'];
$cpf =       (empty($_POST['cpf']))? false : $_POST['cpf'];


$cpfajuste = preg_replace('/[^0-9]/', '',$cpf);
$cpfajustado = intval($cpfajuste);

 
$informacpf = new \app\model\cadUsuarios();
$informacpf->setcpf($cpfajustado);
$cadUsuarioDao = new \app\model\cadUsuarioDao(); 
$cadUsuarioDao->Validar($informacpf);

foreach($cadUsuarioDao->Validar($informacpf) as $resultado):
  //  var_dump($resultado);
endforeach;

    if(strlen($_POST['nome']) == 0){
        echo"<script>alert('Digite o seu nome!')</script>";
} else if (strlen($_POST['datanasc']) == 0){

    echo"<script>alert('Digite a sua data de nascimento!')</script>";}
        if(strlen($_POST['cpf']) == ''){
        echo"<script>alert('Digite o seu CPF!')</script>";
} 
               
    else if((!empty($nome) && ($datanasc) && ($cpfajustado)) && $resultado == ''){

        $usuario = new \app\model\cadUsuarios();
        $usuario->setNome($nome);
        $usuario->setdataNasc($datanasc);
        $usuario->setCPF($cpfajustado);
        $cadUsuarioDao = new app\Model\cadUsuarioDao();
        $cadUsuarioDao->create($usuario);
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        echo "<script>alert('Voce sera redirecionado para o cadastro de credenciais')</script>";
                 

        }else{
            echo "Voce ja consta em nossa base de dados. Realize o acesso na tela inicial";
            //echo "<meta http-equiv=\"refresh\" content=\"1; url=/www\moboplan\index.php\">";   
        
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