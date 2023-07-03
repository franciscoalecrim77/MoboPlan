<?php



namespace app\Model;

class insereRegistroDao{

    
    public function inserirRegistro(InsereRegistro $ir){
        $sql = 'INSERT INTO cad_registro (id_usuario, data_hora_registro) VALUES (?,?)';
        $stmt = Conn::getConn()->prepare($sql);       
        $stmt->bindValue(1, $ir->getusuarioLogado());
        $stmt->bindValue(2, $ir->getdataHora());
        
        $stmt->execute();
        
    }
   
}

//$cmd = new cadUsuarioDao;
//$conn = new Conn;
//$cmd->Validar();
//var_dump($cmd);
?>

