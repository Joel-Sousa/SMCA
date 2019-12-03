<?php

class FuncionarioDTO {

    private $idfuncionario;
    private $nome;
    private $sobrenome;
    private $idade;
    private $cpf;
    private $datanascimento;
    private $sexo;
    private $celular;
    private $endereco;
    private $cidade;
    private $estado;
    
    public function getIdfuncionario() {
        return $this->idfuncionario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getDatanascimento() {
        return $this->datanascimento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdfuncionario($idfuncionario) {
        $this->idfuncionario = $idfuncionario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }


}

?>
