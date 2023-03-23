<?php 

namespace app\Model;

class validaLogin{
    private $email;
    private $password;
    private $idUsuario;

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = $e;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($p){
        $this->password = $p;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($iu){
        $this->idUsuario = $iu;
    }

}


?>