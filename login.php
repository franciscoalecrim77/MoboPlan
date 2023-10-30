<?php

$usuarioLogado = $validado;
    !isset($_SESSION);
    
    session_start();
    
    $_SESSION['id'] = $validado['id_usuario'];

    header("location: gerencial.php");



?>