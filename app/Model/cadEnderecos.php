<?php

namespace app\Model;
class cadEnderecos{
    private $pessoa_id;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $uf;

       public function getPessoaId(){
        return $this->pessoa_id;
       }

       public function setPessoaId($pi){
        $this->pessoa_id = $pi;
       }

       public function getCep(){
        return $this->cep;
       }
    
       public function setCep($c){
            $this->cep = $c;
       }
    
       public function getEndereco(){
        return $this->endereco;
       }
       public function setEndereco($endereco){
        $this->endereco = $endereco;
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