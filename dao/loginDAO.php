<?php

require_once 'conexao/conexao.php';

class loginDAO {

    private $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function login($usuario,$senha){
        try {
            $sql = "SELECT u.funcionarios_idfuncionario, u.usuario, p.perfil FROM usuarios u "
                 . "INNER JOIN perfil p ON (p.idperfil = u.perfil_idperfil) "
                 . "WHERE usuario = ? AND senha = ?";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
            
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        }
}
