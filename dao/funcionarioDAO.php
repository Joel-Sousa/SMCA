<?php 

require_once 'conexao/conexao.php';

class FuncionarioDAO {

    private $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(FuncionarioDTO $funcionarioDTO, UsuarioDTO $usuarioDTO) {
        try {
            //primeiro salvar o usuário
            $sql1 = "INSERT INTO usuarios(usuario,senha,perfil_idperfil)"
                    . " VALUES (?,?,?)";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $usuarioDTO->getUsuario());
            $stmt1->bindValue(2, $usuarioDTO->getSenha());
            $stmt1->bindValue(3, $usuarioDTO->getIdperfil());
            $stmt1->execute();
            $idusuario = $this->pdo->lastInsertId();

            // salvar o funcionario
            $sql2 = "INSERT INTO funcionarios(nome,sobrenome,idade,cpf,datanascimento,sexo,celular,endereco,cidade,estado,usuarios_idusuario)"
                    . " VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $funcionarioDTO->getNome());
            $stmt2->bindValue(2, $funcionarioDTO->getSobrenome());
            $stmt2->bindValue(3, $funcionarioDTO->getIdade());
            $stmt2->bindValue(4, $funcionarioDTO->getCpf());
            $stmt2->bindValue(5, $funcionarioDTO->getDatanascimento());
            $stmt2->bindValue(6, $funcionarioDTO->getSexo());
            $stmt2->bindValue(7, $funcionarioDTO->getCelular());
            $stmt2->bindValue(8, $funcionarioDTO->getEndereco());
            $stmt2->bindValue(9, $funcionarioDTO->getCidade());
            $stmt2->bindValue(10, $funcionarioDTO->getEstado());
            $stmt2->bindValue(11, $idusuario);
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getAllFuncionario() {
        try {
            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.idade,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario, p.perfil,u.funcionarios_idfuncionario,u.perfil_idperfil "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE u.perfil_idperfil = 2 ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getAllAdm() {
        try {
            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.idade,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario, p.perfil,u.funcionarios_idfuncionario,u.perfil_idperfil "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE u.perfil_idperfil = 1 ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteById($idusuario) {
        try {
            $sql2 = "DELETE FROM usuarios "
                    . "WHERE funcionarios_idfuncionario = ?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $idusuario);
            $stmt2->execute();

//            $sql1 = "DELETE FROM funcionarios "
//                    . "WHERE idfuncionario = ?";
//            $stmt1 = $this->pdo->prepare($sql1);
//            $stmt1->bindValue(1, $idfuncionario);
//            $stmt1->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getAllPerfil() {
        try {
            $sql = "SELECT * FROM perfil";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $perfils = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $perfils;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //pesquisar
    public function pesquisarFuncionarioByNome($nome) {
        try {

            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.idade,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario, p.perfil,u.funcionarios_idfuncionario "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE f.nome LIKE ? and p.idperfil = 2";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $nome . "%");
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function pesquisarFuncionarioByNome2($nome) {
        try {

            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.idade,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario, p.perfil,u.funcionarios_idfuncionario "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE f.nome LIKE ? and p.idperfil = 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $nome . "%");
            $stmt->execute();
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionarios;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getByid($idf) {
        try {

            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario,u.senha, p.perfil,u.funcionarios_idfuncionario "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE u.usuario LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $idf . "%");
            $stmt->execute();
            $funcionario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

        public function getFuncionarioById($idfuncionario) {
        try {
            $sql = "SELECT f.idfuncionario,f.nome,f.sobrenome,f.cpf,f.datanascimento,"
                    . "f.sexo,f.celular,f.endereco,f.cidade,f.estado,"
                    . "u.usuario, p.perfil,p.idperfil,u.funcionarios_idfuncionario "
                    . "FROM funcionarios f "
                    . "INNER JOIN usuarios u ON (f.usuarios_idusuario = u.funcionarios_idfuncionario) "
                    . "INNER JOIN perfil p ON (u.perfil_idperfil = p.idperfil) "
                    . "WHERE f.idfuncionario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idfuncionario);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function alterar(FuncionarioDTO $funcionarioDTO, UsuarioDTO $usuarioDTO) {
        try {
            $sql1 = "UPDATE usuarios SET usuario = ?, "
                  . "                   perfil_idperfil = ? "
                  . " WHERE funcionarios_idfuncionario = ?";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $usuarioDTO->getUsuario());            
            $stmt1->bindValue(2, $usuarioDTO->getIdperfil());
            $stmt1->bindValue(3, $usuarioDTO->getIdusuario());
            $stmt1->execute();            

            // salvar o funcionario
            $sql2 = "UPDATE funcionarios SET nome = ?, "
                    . "                 sobrenome = ?, "
                    . "                 cpf = ?, "
                    . "                 datanascimento = ?, "
                    . "                 sexo = ?, "
                    . "                 celular = ?, "
                    . "                 endereco = ?, "
                    . "                 cidade = ?, "
                    . "                 estado = ? "
                    . "WHERE idfuncionario = ?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $funcionarioDTO->getNome());
            $stmt2->bindValue(2, $funcionarioDTO->getSobrenome());
            $stmt2->bindValue(3, $funcionarioDTO->getCpf());
            $stmt2->bindValue(4, $funcionarioDTO->getDatanascimento());
            $stmt2->bindValue(5, $funcionarioDTO->getSexo());
            $stmt2->bindValue(6, $funcionarioDTO->getCelular());
            $stmt2->bindValue(7, $funcionarioDTO->getEndereco());
            $stmt2->bindValue(8, $funcionarioDTO->getCidade());
            $stmt2->bindValue(9, $funcionarioDTO->getEstado());
            $stmt2->bindValue(10, $funcionarioDTO->getIdfuncionario());
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getFuncionarioByCpfP($cpf) {
        try {
            $sql = "SELECT * FROM funcionarios WHERE cpf LIKE '%{$cpf}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getFuncionarioByUsuarioP($usuario) {
        try {
            $sql = "SELECT * FROM usuarios WHERE usuario LIKE '%{$usuario}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getSenhaByUsuario($usuario) {
        try {
            $sql = "SELECT senha FROM usuarios WHERE funcionarios_idfuncionario LIKE '%{$usuario}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function senha($idf) {
        try {

            $sql = "SELECT senha "
                    . "FROM usuarios "
                    . "WHERE funcionarios_idfuncionario LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $idf . "%");
            $stmt->execute();
            $senha = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $senha;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getUsuarioById($idusuario) {
        try {
            $sql = "SELECT u.usuario,u.senha,u.funcionarios_idfuncionario,u.perfil_idperfil 
                           
                    FROM usuarios u
                    INNER JOIN perfil p ON u.perfil_idperfil = p.idperfil
                    WHERE funcionarios_idfuncionario = ?";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getSenhaV($idsenhav) {
        try {
            $sql = "SELECT senha FROM usuarios WHERE funcionarios_idfuncionario LIKE '%{$idsenhav}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $funcionario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function alterarSenha(UsuarioDTO $usuarioDTO) {
        try {
            
            $sql = "UPDATE usuarios u SET                                 
                                u.senha = ?
                          WHERE u.funcionarios_idfuncionario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getSenha());
            $stmt->bindValue(2, $usuarioDTO->getIdusuario());
            $stmt->execute(); 
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        
        
    }
    
}


?>
