<?php

namespace app\Model;

class cadEnderecosDao{

    function createEndereco(cadEnderecos $endereco){
        $insert = 'INSERT INTO enderecos (pessoa_id, cep, endereco, numero, complemento, bairro, cidade, estado, uf) VALUES (?,?,?,?,?,?,?,?,?)';
        $stmt = Conn::getConn()->prepare($insert);
        $stmt->bindValue(1, $endereco->getPessoaId());
        $stmt->bindValue(2, $endereco->getCep());
        $stmt->bindValue(3, $endereco->getEndereco());
        $stmt->bindValue(4, $endereco->getNumero());
        $stmt->bindValue(5, $endereco->getComplemento());
        $stmt->bindValue(6, $endereco->getBairro());
        $stmt->bindValue(7, $endereco->getCidade());
        $stmt->bindValue(8, $endereco->getEstado());
        $stmt->bindValue(9, $endereco->getUf());    
        $stmt->execute();
    }
    
}
    ?>