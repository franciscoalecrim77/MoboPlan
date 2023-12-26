<?php 

namespace app\Model;

class usuarioLogadoDao{

    public function usuarioLogado(usuarioLogado $ul){
        $sql = 'SELECT a.pessoa_id, b.nome FROM usuarios a INNER JOIN pessoas b ON a.pessoa_id = b.id WHERE b.id = ?';        
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $ul->getIdUsuario());
        $stmt->execute();
        $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
    }
}