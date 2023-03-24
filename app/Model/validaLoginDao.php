<?php

namespace app\Model;

class validaLoginDao{


public function validaLogin(validaLogin $vL){     

    $sql = 'SELECT id_usuario, email, senha FROM cad_operadores where email = ? and senha = ?';
    $stmt = Conn::getConn()->prepare($sql);
    $stmt->bindValue(1, $vL->getEmail());
    $stmt->bindValue(2, $vL->getPassword());
    $stmt->execute();
    $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
}

public function idSessao(validaLogin $is){
    $sql = 'SELECT id_usuario from cad_operadores where email = :?';
    $stmt = Conn::getConn()->prepare($sql);
    $stmt->bindValue(1, $is->getIdUsuario());
    $stmt->execute();
    $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
}


}

?>