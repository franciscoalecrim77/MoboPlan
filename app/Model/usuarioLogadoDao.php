<?php 

namespace app\Model;

class usuarioLogadoDao{

    public function usuarioLogado(usuarioLogado $ul){
        $sql = 'SELECT a.id_usuario, b.nome FROM cad_operadores a INNER JOIN cad_usuarios b ON a.id_usuario = b.id_usuario WHERE b.id_usuario = ?';        
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $ul->getIdUsuario());
        $stmt->execute();
        $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
    }
}