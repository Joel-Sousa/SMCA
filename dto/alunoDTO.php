<?php

class AlunoDTO {
	
    private $idaluno;
    private $nome;
    private $sobrenome;
    private $idade;
    private $matricula;
    private $cpf;
    private $datanascimento;
    private $sexo;
    private $celular;
    private $endereco;
    private $cidade;
    private $estado;
    private $imagem;
    private $status;
    private $idperfil;
    private $hora;
    private $data;
    
    public function getIdaluno() {
        return $this->idaluno;
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

    public function getMatricula() {
        return $this->matricula;
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

    public function getImagem() {
        return $this->imagem;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getIdperfil() {
        return $this->idperfil;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getData() {
        return $this->data;
    }

    public function setIdaluno($idaluno) {
        $this->idaluno = $idaluno;
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

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
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

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setData($data) {
        $this->data = $data;
    }


}

?>

