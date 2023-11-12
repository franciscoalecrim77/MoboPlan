<?php

require_once 'vendor/autoload.php';


setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['REQUEST_METHOD'] == "POST"){


$resultado = null;
    
$nome =        (empty($_POST['nome']))? false : $_POST['nome'];
$datanasc =    (empty($_POST['datanasc']))? false : $_POST['datanasc'];
$cpf =         (empty($_POST['cpf']))? false : $_POST['cpf'];
$cep =         (empty($_POST['cep']))? false : $_POST['cep'];
$rua =         (empty($_POST['rua']))? false : $_POST['rua'];
$numero =      (empty($_POST['numero']))? false : $_POST['numero'];
$complemento = (empty($_POST['complemento']))? false : $_POST['complemento'];
$bairro =      (empty($_POST['bairro']))? false : $_POST['bairro'];
$cidade =      (empty($_POST['cidade']))? false : $_POST['cidade'];
$estado =      (empty($_POST['estado']))? false : $_POST['estado'];
$uf =          (empty($_POST['uf']))? false : $_POST['uf'];




$cpfajuste = preg_replace('/[^0-9]/', '',$cpf);
$cpfajustado = intval($cpfajuste);

 
$informacpf = new \app\model\cadUsuarios();
$informacpf->setcpf($cpfajustado);
$cadUsuarioDao = new \app\model\cadUsuarioDao(); 
$cadUsuarioDao->Validar($informacpf);

foreach($cadUsuarioDao->Validar($informacpf) as $resultado):
endforeach;

    if($resultado['cpf'] == $cpfajustado){
        $consulta = new \app\model\cadUsuarios();
        $consulta->setNome($resultado['nome']);
        //echo "<script>alert('teste')</script>";
        // echo "<pre>";
        // print_r($consulta);
    }

    if((!empty($nome) && ($datanasc) && ($cpfajustado)) && $resultado == ''){

        $usuario = new \app\model\cadUsuarios();
        $usuario->setNome($nome);
        $usuario->setdataNasc($datanasc);
        $usuario->setCPF($cpfajustado);
        $usuario->setCep($cep);
        $usuario->setRua($rua);
        $usuario->setNumero($numero);
        $usuario->setComplemento($complemento);
        $usuario->setBairro($bairro);
        $usuario->setCidade($cidade);
        $usuario->setEstado($estado);
        $usuario->setUf($uf);
       
        $cadUsuarioDao = new app\Model\cadUsuarioDao();
        $cadUsuarioDao->create($usuario);
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        //echo "<script>alert('Voce sera redirecionado para o cadastro de credenciais')</script>";
                 

        }else{
            echo "<script>alert('Voce ja consta em nossa base de dados. Realize o acesso na tela inicial')</script>";
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
    <link rel="icon" type="image/x-icon" href="./img/favicon-32x32.png">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css\cadastro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/cadastro.js"></script>
        
</head>
<body>
    <script type='text/javascript'>
            
        
    </script>
    <header class="header">
     
        <img class="logo" src="img/ecletica.jpg"></img>
      
    </header>
<section class="cadastro">
    <form class ="formulario" action="" method="POST" >

        <fieldset class="caixaBasico">
            <legend>Dados Básicos</legend>

                <div class="dadosBasicos">
                    <label class="labelCPF" for=""> CPF:
                        <input class="cpf" oninput="mascara(this)" type="text" name="cpf" id="cpf" required>
                    </label>
                    <label class="" for=""> Nome Completo:
                        <input class="nome" type="text" name="nome" id="nome" required>
                    </label>
                    <label class="" for=""> Data de Nascimento:
                        <input class="nasc" type="date" name="datanasc" id="datanasc" required>
                    </label>
                </div> 

        </fieldset>


        <fieldset class="caixaEndereco">
            <legend>Dados de endereço</legend>
                <div class="dadosEndereco">
                    <label class="descricao" for=""> CEP:
                        <input class="cep" type="text" id="cep" name="cep" onblur="pesquisacep(this.value)">
                    </label>
                    <label class="descricao" for=""> Endereço:
                        <input class="endereco"type="text" name="rua" id="rua">
                    </label>
                    <label class="descricao" for=""> Numero:
                        <input class="numero"type="text" name="numero" id="numero">
                    </label>
                    <label class="descricao" for=""> Complemento:
                        <input class="complemento" type="text" name="complemento" id="complemento">
                    </label>
                    <label class="descricao" for=""> Bairro:
                        <input class="bairro" type="text" name="bairro" id="bairro">
                    </label>
                    <label class="descricao" for=""> Cidade:
                        <input class="cidade"type="text" name="cidade" id="cidade">
                    </label>
                    <label class="descricao" for=""> Estado:
                        <input class="estado" type="text" name="estado" id="estado">
                    </label>
                    <label class="descricao" for=""> UF:
                        <input class="uf" type="text" name="uf" id="uf">
                    </label>
                </div> 
        </fieldset>
        <div class="cadastrar"> 
                <label class="" for=""> 
                    <input class="btn" type="submit" value="Cadastrar">
                </label>
        </div> 
    </form>
</section>
</body>

</html>