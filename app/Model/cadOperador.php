<?php

namespace app\Model;
class cadOperador{
    private $idUsuario;
    private $email;
    private $password;
    private $cpf;
    private $cpfoperador;

    public function getIdUsuario(){
            return $this->idUsuario;
    }
    public function setIdUsuario($iu){
        $this->idUsuario = intval($iu);
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = intval($cpf);
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($pw){
    $this->password = $pw;
    }

    public function getCpfOperador(){
        return $this->cpfoperador;
    }

    public function setCpfOperador($co){
        $this->cpfoperador = intval($co);
    }
}

?>