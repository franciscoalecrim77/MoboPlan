<?php

//include 'library/db.php';
include('protect.php');
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

$usuarioLogado = intval($_SESSION['id']);
require_once 'vendor/autoload.php';

// $operadorLogado = new \app\model\usuarioLogado();
// $operadorLogado->setIdUsuario($usuarioLogado);
// $operadorLogadoDao = new \app\model\usuarioLogadoDao();
// $usuarioLogado = new \app\model\usuarioLogadoDao();
// $usuarioLogado->usuarioLogado($operadorLogado);
// foreach($usuarioLogado->usuarioLogado($operadorLogado) as $validado):
//   print_r($validado);
// endforeach;
$data = date('d-m-Y');
$hora = date('H:i:s');
$registro = new \app\model\insereRegistro();
$registro->setusuarioLogado($usuarioLogado);
$registro->setdata($data);
$registro->setHora($hora);

$registra = new \app\model\insereRegistroDao();
$registra->inserirRegistro($registro);

// header("location: gerencial.php");



?>