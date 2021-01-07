<?php
class listarPessoas{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();
    }

    private function criarTabela(){
        $row = $this->lista->getPessoas();
        if ($row)
        foreach ($row as $value){
            $html  = "<tr>";
            $html .= "<th>".$value['nome'] ."</th>";
            $html .= "<td>".$value['sexo'] ."</td>";
            $html .= "<td>".date('d/m/Y à\s H:i', strtotime($value['criadoem']))."</td>";
            $html .= "<td>".date('d/m/Y à\s H:i', strtotime($value['alteradoem']))."</td>";
            $html .= "<td><a class='btn btn-warning' href='cb.php?editarId=".$value['idpessoa']."'>Editar</a><form class='form-ajax' action='controller/ControllerDeletarPessoa.php'>
            <input type='hidden' name='deleteIdPessoa' value='".$value['idpessoa']."'><button class='btn btn-danger'>Excluir</button></form></td>";
            $html .= "</tr>";

            echo $html;
        }
    }
}