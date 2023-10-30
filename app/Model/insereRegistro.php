<?php
namespace app\Model;

class insereRegistro{
    private $usuarioLogado;
    private $data;
    private $hora;

    public function getusuarioLogado(){
        return $this->usuarioLogado;
    }
    public function setusuarioLogado($usuarioLogado){
        $this->usuarioLogado = $usuarioLogado;
    }
    public function getdata(){
        return $this->data;
    }
    public function setdata($data){
        $this->data = $data;
    }
    public function getHora(){
        return $this->hora;
    }
    public function setHora($hora){
        $this->hora = $hora;
    }
}


?>