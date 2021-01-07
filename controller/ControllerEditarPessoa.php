<?php

class editarController{

    private $banco;

    public function __construct(){
        $this->banco = new Banco();
        $this->update();
    }

    private function update(){
       
        $result = $this->banco->updatePessoa($_POST['nome'], $_POST['sexo'], $_POST['idpessoa']);

        if($result === TRUE){
            $json['msg'] = 'Pessoa atualizada com sucesso';
            $json['status'] = '1';
            $json['redirecionar'] = 'index.php';
            echo json_encode ($json);
        }else{
            $json['msg'] = 'Erro ao atualizar a pessoa';
            $json['status'] = '0';
            echo json_encode ($json);
        }
    }
}

if (isset($_POST['nome']) && $_POST['nome'] !== '' && isset($_POST['sexo']) && $_POST['sexo'] !== '' && isset($_POST['idpessoa']) && $_POST['idpessoa'] > 0) {
    require_once("../model/banco.php");
    require_once("../model/Pessoa.php");
    new editarController();
}

?>
