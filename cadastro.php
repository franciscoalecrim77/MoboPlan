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


$ativo = "S";
$categoria = 1;

$cpfajuste = preg_replace('/[^0-9]/', '',$cpf);
$cpfajustado = intval($cpfajuste);

 
$informacpf = new \app\model\CadPessoas();
$informacpf->setcpf($cpfajustado);
$cadPessoasDao = new \app\model\cadPessoasDao(); 
$cadPessoasDao->Validar($informacpf);

foreach($cadPessoasDao->Validar($informacpf) as $resultado):
endforeach;

    if($resultado['cpf'] == $cpfajustado){
        $consulta = new \app\model\cadPessoas();
        $consulta->setNome($resultado['nome']);
        //echo "<script>alert('teste')</script>";
        // echo "<pre>";
        // print_r($consulta);
    }

    if((!empty($nome) && ($datanasc) && ($cpfajustado)) && $resultado == ''){

        $pessoa = new \app\model\cadPessoas();
        $pessoa->setNome($nome);
        $pessoa->setdataNasc($datanasc);
        $pessoa->setCPF($cpfajustado);
        $pessoa->setCategoria($categoria);
        $pessoa->setAtivo($ativo);        
        $cadPessoasDao = new app\Model\cadPessoasDao();
        $cadPessoasDao->create($pessoa);
        
        $id_pessoa_consulta = new \app\model\cadPessoasDao(); 
        $id_pessoa_consulta->pegaId($informacpf);

        foreach($id_pessoa_consulta->pegaId($informacpf) as $id_novo):
            $id_tratado = $id_novo['id'];
            // echo "<pre>";
            // var_dump($id_tratado);
        endforeach;

        $enderecoPessoa = new \app\model\cadEnderecos();
        $enderecoPessoa->setPessoaId($id_tratado);
        $enderecoPessoa->setCep($cep);
        $enderecoPessoa->setEndereco($rua);
        $enderecoPessoa->setNumero($numero);
        $enderecoPessoa->setComplemento($complemento);
        $enderecoPessoa->setBairro($bairro);
        $enderecoPessoa->setCidade($cidade);
        $enderecoPessoa->setEstado($estado);
        $enderecoPessoa->setUf($uf);

        $enderecoPessoacadastro = new \app\model\cadEnderecosDao();
        $enderecoPessoacadastro->createEndereco($enderecoPessoa);

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