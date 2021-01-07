<?php
class Pessoa extends Banco {

    private $idpessoa;
    private $nome;
    private $sexo;
    private $criadoem;
    private $alteradoem;

    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setSexo($string){
        $this->sexo = $string;
    }

    //Metodos Get
    public function getIdpessoa(){
        return $this->idpessoa;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function getCriadoem(){
        return $this->criadoem;
    }
    public function getAlteradoem(){
        return $this->alteradoem;
    }

    public function incluir(){
        return $this->setPessoa($this->getNome(), $this->getSexo());
    }
}
?>
