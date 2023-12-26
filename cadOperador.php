<?php
require_once 'vendor/autoload.php';

setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');


if ($_SERVER['REQUEST_METHOD'] == "POST"){

$id = null;
$idUsuario = null;
$cpfrecolhido = null;
$cpf =      (empty($_POST['cpf']))? false : $_POST['cpf'];
$email =    (empty($_POST['email']))? false : $_POST['email'];
$password = (empty($_POST['password']))? false : $_POST['password'];
$criptografada = base64_encode($password);
$cpfajuste = preg_replace('/[^0-9]/', '',$cpf);
$cpfajustado = intval($cpfajuste);


$informacpf = new \app\model\cadUsuario();
$informacpf->setCpf($cpfajustado);
// $informacpf->setPessoaId($id);
echo "<pre>";
var_dump($informacpf);
$cadOperadorDao = new \app\model\cadUsuarioDao(); 
$cadOperadorDao->pegainfo($informacpf);
      foreach($cadOperadorDao->pegaInfo($informacpf) as $id):
       var_dump($id);
      endforeach;
      
    if($id == null){
        $id = 0;
    }else{
        $idUsuario = intval($id['id']);

    }

$setaCpf = new \app\model\cadUsuario();
$setaCpf->setCpf($cpfajustado);
$cadOperadorDao = new \app\model\cadUsuarioDao(); 
$cadOperadorDao->pegaCpf($setaCpf);
      foreach($cadOperadorDao->pegaCpf($setaCpf) as $cpfrecolhido):
      var_dump($cpfrecolhido);

      endforeach; 



      if(strlen($_POST['cpf']) == ''){
            echo"<script>alert('Digite o seu cpf!')</script>";
      } else if (strlen($_POST['email']) == ''){
            echo"<script>alert('Digite o seu email')</script>";}
        else if(strlen($_POST['password']) == ''){
            echo"<script>alert('Digite a sua senha')</script>";
} 
     else if($id == ''){ //eu valido se o cpf do formulario consta no cadastro de usuarios;
           
            echo"<script>alert('Voce não esta cadastrado. Realize seu cadastro na tela anterior, antes de criar suas credenciais')</script>";
            
        
      }
        else if((!empty($cpfajustado) && ($email) && ($password)) && $cpfrecolhido == ''){

            $operador = new \app\model\cadUsuario();
            $operador->SetPessoaId($idUsuario);
            $operador->setCpf($cpfajustado);
            $operador->setEmail($email);
            $operador->setPassword($criptografada);
            $operador->setAtivo("S");
            $cadUsuarioDao = new app\Model\cadUsuarioDao();
            $cadUsuarioDao->create($operador);
            // echo "<pre>";
            // print_r($operador);
            echo"<script>alert('Cadastro Realizado com sucesso!')</script>";
            // var_dump($operador);
            
        
        }else{
            echo"<script>alert('Suas credenciais ja estão cadastradas em nossa base de dados')</script>";
        }

        //else if($id > 0){ //aqui eu validei que um login cadastrado para o cpf informado
           // echo "Voce ja cadastrou suas credenciais em nossa base de dados. Realize o acesso na tela inicial";
            //echo "<meta http-equiv=\"refresh\" content=\"1; url=/www\moboplan\index.php\">";   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro operador</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon-32x32.png">
</head>
<body>
    
    <form action="" method="post">
    <div>
        <div>
            Confirme o seu CPF:
            <input oninput="mascara(this)" type="text" name="cpf" id="cpf">
        </div>
        <div>
            Informe seu Email:
            <input type="email" name="email" id="email">
        </div>
        <div>
            Informe sua senha: 
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Cadastrar">

    </div>
    </form>

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
</body>
</html>