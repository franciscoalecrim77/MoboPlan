<?php

namespace app\Model;

class cadOperadorDao{

public function create(CadOperador $co){
        $sql = 'INSERT INTO cad_operadores (id_usuario, cpf, email, senha) VALUES (?,?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);       
        $stmt->bindValue(1, $co->getIdUsuario());
        $stmt->bindValue(2, $co->getcpf());
        $stmt->bindValue(3, $co->getEmail());
        $stmt->bindValue(4, $co->getPassword());  
        $stmt->execute();
        
    }

    public function pegainfo(cadOperador $pi){
        $sql = 'SELECT id_usuario from cad_usuarios where cpf = ?';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $pi->getcpf());
        $stmt->execute();
        $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
        
    }
    public function pegaCpf(cadOperador $pc){
        $sql = 'SELECT cpf from cad_operadores where cpf = ?';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $pc->getCpf());
        $stmt->execute();
        $consulta = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $consulta;
    }
}
?>