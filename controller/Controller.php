<?php
require_once("model/banco.php");
require_once("model/Pessoa.php");
require_once("controller/ControllerListarPessoa.php");
require_once("controller/ControllerDeletarPessoa.php");


class FormularioCadastro {

    public function __construct(){
       if (isset($_GET['editarId']) && $_GET['editarId'] > 0) {

            $banco = new Banco();
            $pessoa = $banco->getPessoa($_GET['editarId']);

            $data['pagina']['titulo'] = 'Atualizando pessoa';
            $data['pagina']['form_action'] = 'controller/ControllerEditarPessoa.php';
            $data['pagina']['pessoa']['nome'] = $pessoa['nome'];
            $data['pagina']['pessoa']['sexo'] = $pessoa['sexo'];
            $data['pagina']['botao'] = 'Atualizar';
       }else{
            $data['pagina']['titulo'] = 'Adicionar pessoa';
            $data['pagina']['form_action'] = 'controller/ControllerAdicionarPessoa.php';
            $data['pagina']['pessoa']['nome'] = '';
            $data['pagina']['pessoa']['sexo'] = '';
            $data['pagina']['botao'] = 'Adicionar';
       }

        $html  = '<h4 class="modal-title modal-body">'.$data['pagina']['titulo'].'</h4>';
        $html .= '<form class="form-ajax modal-body" action="'.$data['pagina']['form_action'].'" >
            <div class="mb-3 modal-body">
                <label for="nome" class="form-label">Nome</label>
                <input id="name" type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="'.$data['pagina']['pessoa']['nome'].'" required autocomplete="off">
            </div>
            <div class="mb-3 modal-body">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" class="form-control" id="sexo"  required>';
                    if ( $data['pagina']['pessoa']['sexo'] !== '') {
                        if ( $data['pagina']['pessoa']['sexo'] == 'Feminino') {
                            $html .= '<option value="Feminino" selected="selected">Feminino</option>
                                      <option value="Masculino">Masculino</option>';
                        }else{
                            $html .= '<option value="Feminino">Feminino</option>
                                      <option value="Masculino" selected="selected">Masculino</option>';
                        }
                    }else{
                        $html .= '<option hidden value>Sexo</option>
                                  <option value="Feminino">Feminino</option>
                                  <option value="Masculino">Masculino</option>';
                    }
        $html .= '</select>
            </div>
            <div class="mb-3 modal-body">
                <button type="submit" class="btn btn-success">'.$data['pagina']['botao'].'</button>
            </div>';
        if (isset($_GET['editarId']) && $_GET['editarId'] > 0) {
            $html .= '<input type="hidden" value="'.$_GET['editarId'].'" name="idpessoa">';
        }
        $html .= '</form>';

        echo $html;
    }
}
