<?php

class UsuarioDTO {

    private $idusuario;
    private $usuario;
    private $senha;
    private $idperfil;

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getIdperfil() {
        return $this->idperfil;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }


}
