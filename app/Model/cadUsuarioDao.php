<?php



namespace app\Model;
class cadUsuarioDao{

    //public $res;
    
    public function create(CadUsuarios $cd){
        $sql = 'INSERT INTO cad_usuarios (nome, data_nasc, cpf, cep, endereco, numero, complemento, bairro, cidade, estado, uf) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);       
        $stmt->bindValue(1, $cd->getNome());
        $stmt->bindValue(2, $cd->getdataNasc());
        $stmt->bindValue(3, $cd->getCPF());
        $stmt->bindValue(4, $cd->getCep());
        $stmt->bindValue(5, $cd->getRua());
        $stmt->bindValue(6, $cd->getNumero());
        $stmt->bindValue(7, $cd->getComplemento());
        $stmt->bindValue(8, $cd->getBairro());
        $stmt->bindValue(9, $cd->getCidade());
        $stmt->bindValue(10, $cd->getEstado());
        $stmt->bindValue(11, $cd->getUf());

        $stmt->execute();
        
    }

    public function Validar(cadUsuarios $c){
            
            //$sql = 'SELECT * FROM usuarios where cpf = ?';
            $sql = 'SELECT * FROM cad_usuarios where cpf = ?';
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

   public function consulta(){
        $sql = 'SELECT * FROM cad_usuarios';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchALL(\PDO::FETCH_ASSOC);
        return $resultado;
   }
}

//$cmd = new cadUsuarioDao;
//$conn = new Conn;
//$cmd->Validar();
//var_dump($cmd);
?>

