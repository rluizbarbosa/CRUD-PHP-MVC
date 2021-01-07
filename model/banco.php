<?php

//timezone
date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','crud');

//Apenas para definir uma url padrão, não mexa
define('URL_BASE','');

class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setPessoa($nome, $sexo){

        $stmt = $this->mysqli->prepare("INSERT INTO pessoa (`nome`, `sexo`) VALUES (?,?)");
        $stmt->bind_param("ss",$nome,$sexo);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getPessoas(){
        $result = $this->mysqli->query("SELECT * FROM pessoa");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        if (isset($array)) {
            return $array;
        }else{
            return false;
        }
    }

    public function deletePessoa($id){
        if($this->mysqli->query("DELETE FROM pessoa WHERE `idpessoa` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getPessoa($id){
        $result = $this->mysqli->query("SELECT * FROM pessoa WHERE idpessoa='$id' LIMIT 1");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function updatePessoa($nome,$sexo,$id){
        $stmt = $this->mysqli->prepare("UPDATE pessoa SET `nome` = ?, `sexo`=? WHERE `idpessoa` = ?");
        $stmt->bind_param("sss",$nome,$sexo,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
