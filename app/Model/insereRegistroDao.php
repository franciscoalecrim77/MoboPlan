<?php



namespace app\Model;

class insereRegistroDao{

    
    public function inserirRegistro(InsereRegistro $ir){
        $sql = 'INSERT INTO cad_registros (id_usuario, data_registro, hora_registro) VALUES (?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $ir->getusuarioLogado());
        $stmt->bindValue(2, $ir->getdata());
        $stmt->bindValue(3, $ir->getHora());
        
        $stmt->execute();
        
    }
    
}
header("location: gerencial.php");

//$cmd = new cadUsuarioDao;
//$conn = new Conn;
//$cmd->Validar();
//var_dump($cmd);
?>

