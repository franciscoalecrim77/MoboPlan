<?php

namespace app\Model;
class cadUsuario{
    private $pessoaId;
    private $cpf;
    private $email;
    private $password;
    private $ativo;
    private $cpfoperador;

    public function getPessoaId(){
        return $this->pessoaId;
    }
    public function setPessoaId($pi){
        $this->pessoaId = intval($pi);
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

    public function getAtivo(){
        return $this->ativo;
    }
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
    public function getCpfOperador(){
        return $this->cpfoperador;
    }
    public function setCpfOperador($co){
        $this->cpfoperador = intval($co);
    }
}

?>