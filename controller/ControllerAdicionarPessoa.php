<?php


class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Pessoa();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setSexo($_POST['sexo']);
        
        $result = $this->cadastro->incluir();

        if($result === TRUE){
            $json['msg'] = 'Pessoa adicionada com sucesso';
            $json['status'] = '1';
            $json['redirecionar'] = 'index.php';
            echo json_encode ($json);
        }else{
            $json['msg'] = 'Erro ao adicionar a pessoa';
            $json['status'] = '0';
            echo json_encode ($json);
        }
    }
}

if (isset($_POST['nome']) && $_POST['nome'] !== '' && isset($_POST['sexo']) && $_POST['sexo'] !== '') {
	require_once("../model/banco.php");
    require_once("../model/Pessoa.php");
	new cadastroController();
}

?>
