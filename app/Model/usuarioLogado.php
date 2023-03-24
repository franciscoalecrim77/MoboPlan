<?php

namespace app\Model;

class usuarioLogado{

    private $idUsuario;
    private $nome;

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($iu){
        $this->idUsuario = $iu;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
}

?>