<?php
require_once 'vendor/autoload.php';

setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');


if ($_SERVER['REQUEST_METHOD'] == "POST"){

$id = null;
$cpfrecolhido = null;
$cpf =      (empty($_POST['cpf']))? false : $_POST['cpf'];
$email =  (empty($_POST['email']))? false : $_POST['email'];
$password =       (empty($_POST['password']))? false : $_POST['password'];
$cpfajuste = preg_replace('/[^0-9]/', '',$cpf);
$cpfajustado = intval($cpfajuste);

// print_r($cpfajustado);
// print_r($email);
// print_r($password);

$cadoperador = new \app\model\cadOperadorDao;
$informacpf = new \app\model\cadOperador();
$informacpf->setcpf($cpfajustado);
$cadOperadorDao = new \app\model\cadOperadorDao(); 
$cadOperadorDao->pegainfo($informacpf);
      foreach($cadOperadorDao->pegaInfo($informacpf) as $id):
      //var_dump($id);
      endforeach;

$setaCpf = new \app\model\cadOperador();
$setaCpf->setCpf($cpfajustado);
$cadOperadorDao = new \app\model\cadOperadorDao(); 
$cadOperadorDao->pegaCpf($setaCpf);
      foreach($cadOperadorDao->pegaCpf($setaCpf) as $cpfrecolhido):
      //print_r($cpfrecolhido);
      endforeach; 


      if($id == ''){ //eu valido se o cpf do formulario consta no cadastro de usuarios;
        Echo "Voce não esta cadastrado. Realize seu cadastro na tela anterior, antes de criar suas credenciais";
      

        
      }
        else if((!empty($cpfajustado) && ($email) && ($password)) && $cpfrecolhido == ''){

            $operador = new \app\model\cadOperador();
            $operador->setidUsuario($id);
            $operador->setCpf($cpfajustado);
            $operador->setEmail($email);
            $operador->setPassword($password);
            $cadUsuarioDao = new app\Model\cadOperadorDao();
            $cadUsuarioDao->create($operador);
            
            echo "cadastro realizado com sucesso";
            //var_dump($operador);
            
        
        }else{
            Echo "voce ja esta cadastrado";
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