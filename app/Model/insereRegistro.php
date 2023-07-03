<?php
namespace app\Model;

class insereRegistro{
    private $usuarioLogado;
    private $dataHora;

    public function getusuarioLogado(){
        return $this->usuarioLogado;
    }
    public function setusuarioLogado($usuarioLogado){
        $this->usuarioLogado = $usuarioLogado;
    }
    public function getdataHora(){
        return $this->dataHora;
    }
    public function setdataHora($dataHora){
        $this->dataHora = $dataHora;
    }
}


?>