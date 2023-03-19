<?php



namespace app\Model;
class cadUsuarioDao{

    //public $res;
    
    public function create(CadUsuarios $cd){
        $sql = 'INSERT INTO usuarios (nome, data_nasc, cpf) VALUES (?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);       
        $stmt->bindValue(1, $cd->getNome());
        $stmt->bindValue(2, $cd->getdataNasc());
        $stmt->bindValue(3, $cd->getCPF()); 
        $stmt->execute();
        
    }

    public function Validar(cadUsuarios $c){
            
            //$sql = 'SELECT * FROM usuarios where cpf = ?';
            $sql = 'SELECT * FROM usuarios where cpf = ?';
            $stmt = Conn::getConn()->prepare($sql);  
            $stmt->bindValue(1, $c->getCPF());
            $stmt->execute();
            $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
                return $resultado;
            
            
            /*if($stmt->rowCount() > 1):
                $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
                return $resultado;
            endif;*/
            
                                    
    }

   
}

//$cmd = new cadUsuarioDao;
//$conn = new Conn;
//$cmd->Validar();
//var_dump($cmd);
?>

