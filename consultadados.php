<?php

/* Consulta dados de cadastro

require_once 'vendor/autoload.php';


$cpf = 44013435812;
$resultado = null;

$informacpf = new \app\model\cadUsuarios();
$informacpf->setcpf($cpf);
$cadUsuarioDao = new \app\model\cadUsuarioDao(); 
$cadUsuarioDao->Validar($informacpf);

foreach($cadUsuarioDao->Validar($informacpf) as $resultado):
echo "<hr>";
echo "valor recebido do banco: ";
echo "</br>";
var_dump($resultado);
endforeach;
echo "<hr>";
echo "</br>";
echo "</br>";
/*
        $usuario = new \app\model\cadUsuarios();
        $usuario->setNome('teste');
        $usuario->setdataNasc('11111111');
        $usuario->setCPF('44013435810');
        $cadUsuarioDao = new app\Model\cadUsuarioDao();
        $cadUsuarioDao->create($usuario);



// Consulta dados do id e cpf para cadastro de operador


require_once 'vendor/autoload.php';

$cpf = 44013435810;
$resultado = null;
$informacpf = new \app\model\cadOperador();
$informacpf->setCpf($cpf);
$cadOperadorDao = new \app\model\cadOperadorDao(); 
$cadOperadorDao->pegainfo($informacpf);
foreach($cadOperadorDao->pegaInfo($informacpf) as $resultado):
      print_r($resultado);
      endforeach;

echo '<hr>';

$setaCpf = new \app\model\cadOperador();
$setaCpf->setCpf($cpf);
$cadOperadorDao = new \app\model\cadOperadorDao(); 
$cadOperadorDao->pegaCpf($setaCpf);
foreach($cadOperadorDao->pegaCpf($setaCpf) as $cpfrecolhido):
      print_r($cpfrecolhido);
      endforeach;     

      */

      
?>