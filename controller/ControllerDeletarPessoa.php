<?php

class deleta {
    private $deleta;

    public function __construct($id){
        $this->deleta = new Banco();
        if($this->deleta->deletePessoa($id)== TRUE){
			$json['msg'] = 'Pessoa deletada com sucesso';
			$json['status'] = '1';
            $json['removerDaLista'] = '0';
            echo json_encode ($json);
        }else{
        	$json['msg'] = 'Erro ao deletar a pessoa';
			$json['status'] = '0';
            echo json_encode ($json);
        }
    }
}
if (isset($_POST['deleteIdPessoa']) && $_POST['deleteIdPessoa'] > 0) {
	require_once("../model/banco.php");
	new deleta($_POST['deleteIdPessoa']);
}
?>
