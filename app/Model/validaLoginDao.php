<?php

namespace app\Model;

class validaLoginDao{


public function validaLogin(validaLogin $vL){     

    $sql = 'SELECT pessoa_id, email, senha FROM usuarios where email = ? and senha = ?';
    $stmt = Conn::getConn()->prepare($sql);
    $stmt->bindValue(1, $vL->getEmail());
    $stmt->bindValue(2, $vL->getPassword());
    $stmt->execute();
    $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
}

public function idSessao(validaLogin $is){
    $sql = 'SELECT pessoa_id from usuarios where email = :?';
    $stmt = Conn::getConn()->prepare($sql);
    $stmt->bindValue(1, $is->getIdUsuario());
    $stmt->execute();
    $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
}


}

?>