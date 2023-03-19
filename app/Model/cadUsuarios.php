<?php

namespace app\Model;
class CadUsuarios{
    private $id;
    private $nome;
    private $dataNasc;
    private $cpf;
    private $dataCad;
    private $consulta;
    private $cpfconsulta;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($no){
        $this->nome = $no;
    }

    public function getdataNasc(){
        return $this->dataNasc;
    }
    public function setdataNasc($dn){
        $this->dataNasc = $dn;
    }

    public function getcpf(){
        return $this->cpf;
    }
    public function setcpf($cpf){
        $this->cpf = intval($cpf);
    }

    public function getDatacad(){
        return $this->dataCad = date('d-m-Y H:i:s');
    }
    public function setDatacad($dc){
        $this->dataCad = $dc;
    }
    public function getConsulta(){
        return $this->consulta;
    }
    public function setConsulta($con){
        $this->consulta = $con;
    }

   
    
}





?>