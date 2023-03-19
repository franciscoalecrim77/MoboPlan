<?php

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


*/



?>