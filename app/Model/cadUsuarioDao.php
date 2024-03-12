<?php

namespace app\Model;

class cadUsuarioDao{

    public function create(CadUsuario $co){
        $sql = 'INSERT INTO usuarios (pessoa_id, cpf, email, senha, ativo) VALUES (?,?,?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);       
        $stmt->bindValue(1, $co->getPessoaId());
        $stmt->bindValue(2, $co->getCpf());
        $stmt->bindValue(3, $co->getEmail());
        $stmt->bindValue(4, $co->getPassword());
        $stmt->bindValue(5, $co->getAtivo());  
        $stmt->execute();
    }

    public function pegainfo(CadUsuario $pi){
        $sql = 'SELECT id from pessoas where cpf = ?';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $pi->getcpf());
        $stmt->execute();
        $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function pegaCpf(cadUsuario $pc){
        $sql = 'SELECT cpf from usuarios where cpf = ?';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $pc->getCpf());
        $stmt->execute();
        $consulta = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $consulta;
    }
    public function pegaId(cadUsuario $pid){
        $sql = 'SELECT cpf from usuarios where cpf = ?';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $pid->getCpf());
        $stmt->execute();
        $consulta = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $consulta;
    }
}
?>