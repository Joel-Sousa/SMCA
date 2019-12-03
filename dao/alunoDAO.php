<?php

require_once 'conexao/conexao.php';

class AlunoDAO {

    private $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(AlunoDTO $alunoDTO) {
        try {
           

            // salvar o aluno
            $sql2 = "INSERT INTO alunos(nome,sobrenome,idade,matricula,cpf,datanascimento,sexo,celular,endereco,cidade,estado,imagem,status,perfil_idperfil)"
                    . " VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $alunoDTO->getNome());
            $stmt2->bindValue(2, $alunoDTO->getSobrenome());
            $stmt2->bindValue(3, $alunoDTO->getIdade());
            $stmt2->bindValue(4, $alunoDTO->getMatricula());
            $stmt2->bindValue(5, $alunoDTO->getCpf());
            $stmt2->bindValue(6, $alunoDTO->getDatanascimento());
            $stmt2->bindValue(7, $alunoDTO->getSexo());
            $stmt2->bindValue(8, $alunoDTO->getCelular());
            $stmt2->bindValue(9, $alunoDTO->getEndereco());
            $stmt2->bindValue(10, $alunoDTO->getCidade());
            $stmt2->bindValue(11, $alunoDTO->getEstado());
            $stmt2->bindValue(12, $alunoDTO->getImagem());
            $stmt2->bindValue(13, $alunoDTO->getStatus());
            $stmt2->bindValue(14, $alunoDTO->getIdperfil());
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getAllHistorico() {
        try {
            $sql = "SELECT h.nome,h.matricula,h.status,h.hora,h.data "
                    . "FROM historico h ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $historico = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $historico;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getAllAluno() {
        try {
            $sql = "SELECT a.idaluno,a.nome,a.sobrenome,a.idade,a.matricula,a.cpf,a.datanascimento,"
                    . "a.sexo,a.celular,a.endereco,a.cidade,a.estado,a.status "
                    . "FROM alunos a ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function deleteById($idaluno) {
        try {

            $sql1 = "DELETE FROM alunos "
                    . "WHERE idaluno = ?";
            $stmt1 = $this->pdo->prepare($sql1);
            $stmt1->bindValue(1, $idaluno);
            $stmt1->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function pesquisarHistoricoByNome($matricula) {
        try {

            $sql = "SELECT h.nome,h.matricula,h.hora,h.data "
                    . "FROM historico h "
                    . "WHERE h.matricula LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $matricula . "%");
            $stmt->execute();
            $historico = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $historico;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    //pesquisar
    public function pesquisarAlunoByNome($nome) {
        try {

            $sql = "SELECT a.idaluno,a.nome,a.sobrenome,a.idade,a.matricula,a.cpf,a.datanascimento,"
                    . "a.sexo,a.celular,a.endereco,a.cidade,a.estado,a.status "
                    . "FROM alunos a "
                    . "WHERE a.nome LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $nome . "%");
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

        public function getAlunoById($idaluno) {
        try {
            $sql = "SELECT a.idaluno,a.nome,a.sobrenome,a.matricula,a.cpf,a.datanascimento,"
                    . "a.sexo,a.celular,a.endereco,a.cidade,a.estado,a.imagem,a.status "
                    . "FROM alunos a "
                    . "WHERE a.idaluno = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idaluno);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getAlunoByStatus($idaluno) {
        try {
            $sql = "SELECT a.idaluno,a.nome,a.sobrenome,a.matricula,a.cpf,a.datanascimento,"
                    . "a.sexo,a.celular,a.endereco,a.cidade,a.estado,a.status "
                    . "FROM alunos a "
                    . "WHERE a.idaluno = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idaluno);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function alterar(AlunoDTO $alunoDTO) {
        try {
            // salvar o aluno
            $sql2 = "UPDATE alunos SET nome = ?, "
                    . "                 sobrenome = ?, "
                    . "                 matricula = ?, "
                    . "                 cpf = ?, "
                    . "                 datanascimento = ?, "
                    . "                 sexo = ?, "
                    . "                 celular = ?, "
                    . "                 endereco = ?, "
                    . "                 cidade = ?, "
                    . "                 estado = ?, "
                    . "                 imagem = ?, "
                    . "                 status = ? "
                    . "WHERE idaluno = ? ";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $alunoDTO->getNome());
            $stmt2->bindValue(2, $alunoDTO->getSobrenome());
            $stmt2->bindValue(3, $alunoDTO->getMatricula());
            $stmt2->bindValue(4, $alunoDTO->getCpf());
            $stmt2->bindValue(5, $alunoDTO->getDatanascimento());
            $stmt2->bindValue(6, $alunoDTO->getSexo());
            $stmt2->bindValue(7, $alunoDTO->getCelular());
            $stmt2->bindValue(8, $alunoDTO->getEndereco());
            $stmt2->bindValue(9, $alunoDTO->getCidade());
            $stmt2->bindValue(10, $alunoDTO->getEstado());
            $stmt2->bindValue(11, $alunoDTO->getImagem());
            $stmt2->bindValue(12, $alunoDTO->getStatus());
            $stmt2->bindValue(13, $alunoDTO->getIdaluno());
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function pesquisarAlunoByMatricula($matricula) {
        try {

            $sql = "SELECT idaluno,nome,sobrenome,matricula,sexo,imagem,status FROM alunos a "
                    . "WHERE a.matricula LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $matricula . "%");
            $stmt->execute();
            
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function salvarHistorico(AlunoDTO $alunoDTO) {
        try {
           

            // salvar o aluno
            $sql2 = "INSERT INTO historico(alunos_idaluno,nome,matricula,status,hora,data)"
                    . " VALUES (?,?,?,?,?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->bindValue(1, $alunoDTO->getIdaluno());
            $stmt2->bindValue(2, $alunoDTO->getNome());
            $stmt2->bindValue(3, $alunoDTO->getMatricula());
            $stmt2->bindValue(4, $alunoDTO->getStatus());
            $stmt2->bindValue(5, $alunoDTO->getHora());
            $stmt2->bindValue(6, $alunoDTO->getData());
            return $stmt2->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
        public function getAllAluno1() {
        try {
            $sql = "SELECT a.idaluno,a.nome,a.sobrenome,a.matricula,a.cpf,a.datanascimento,"
                    . "a.sexo,a.celular,a.endereco,a.cidade,a.estado,a.status "
                    . "FROM alunos a ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function getAlunoByCpfP($cpf) {
        try {
            $sql = "SELECT * FROM alunos WHERE cpf LIKE '%{$cpf}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getAlunoByMatriculaP($matricula) {
        try {
            $sql = "SELECT * FROM alunos WHERE matricula LIKE '%{$matricula}%'";
            $stmt = $this->pdo->prepare($sql);
            //$stmt->bindValue(1, $nome);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function deleteHistorico(){
        try {
            $sql = "TRUNCATE TABLE historico";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        }
    
}

?>
