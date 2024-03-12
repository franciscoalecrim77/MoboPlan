<?php

use app\Model\usuarioLogado;

include('protect.php');
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

$usuarioLogado = intval($_SESSION['id']);
require_once 'vendor/autoload.php';

$data = date('d-m-Y H:i:s');

//criação objeto para pegar as informações do registro.
$registro = new \app\model\insereRegistro();
$registro->setusuarioLogado($usuarioLogado);
$registro->setdata($data);

//Criação do objeto para inserir registro no banco. Utilização do Método "inserirRegistro" para inserção no banco de dados.
$registra = new \app\model\insereRegistroDao();
$registra->inserirRegistro($registro);

// header("location: gerencial.php");

?>