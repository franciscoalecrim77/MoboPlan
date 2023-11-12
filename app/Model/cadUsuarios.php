<?php

namespace app\Model;
class CadUsuarios{
    private $id;
    private $nome;
    private $dataNasc;
    private $cpf;
    private $cep;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $uf;
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

   public function getCep(){
    return $this->cep;
   }

   public function setCep($c){
        $this->cep = $c;
   }

   public function getRua(){
    return $this->rua;
   }
   public function setRua($r){
    $this->rua = $r;
   }

   public function getNumero(){
    return $this->numero;
   }

   public function setNumero($num){
    $this->numero = $num;
   }

   public function getComplemento(){
    return $this->complemento;
   }

   public function setComplemento($comp){
    $this->complemento = $comp;
   }
   public function getBairro(){
    return $this->bairro;
   }

   public function setBairro($bai){
    $this->bairro = $bai;
   }

   public function getCidade(){
    return $this->cidade;
   }

   public function setCidade($ci){
    $this->cidade = $ci;
   }

   public function getEstado(){
    return $this->estado;
   }
   public function setEstado($es){
    $this->estado = $es;
   }

   public function getUf(){
    return $this->uf;
   }
   public function setUf($uf){
    $this->uf = $uf;
   }
}

?>