<?php

namespace App\aluno\aluno;
//session_start();

require_once("../../source/support/config.php");

class Aluno{
    public $idAluno;
    public $nomeCompleto;
    public $dataNascimento;
    public $curso;
    public $turma;
    public $turno;
    public $necessidadeEspecial;
    public $idUsuario;

    

    public function load($idAluno, $idUsuario){
        global $pdo;
        // var_dump($pdo); die;
        $stmt = $pdo->query("SELECT aluno.* FROM aluno LEFT JOIN usuario ON aluno.idUsuario = usuario.idUsuario WHERE aluno.idAluno = $idAluno AND usuario.idUsuario = $idUsuario"); 

        $stmt->execute();
      
        if($stmt->rowCount() > 0){
            $aluno = $stmt->fetch();
            $this->idAluno = $aluno->idAluno;
            $this->nomeCompleto = $aluno->nomeCompleto;
            $this->dataNascimento = $aluno->dataNascimento;
            $this->curso = $aluno->curso;
            $this->turma = $aluno->turma;
            $this->turno = $aluno->turno;
            $this->necessidadeEspecial = $aluno->necessidadeEspecial;
            $this->idUsuario = $aluno->idUsuario;

            return $this;
        }

    }

    public function update($idAluno, $nomeCompleto, $dataNascimento, $curso, $turma, $turno, $necessidadeEspecial, $idUsuario){
        global $pdo;
$q = "UPDATE aluno SET
nomeCompleto = $nomeCompleto,
dataNascimento = $dataNascimento,
curso = $curso, 
turma = $turma, 
turno = $turno, 
necessidadeEspecial = $necessidadeEspecial, 
idUsuario = $idUsuario
WHERE idAluno = $idAluno";
        $stmt = $pdo->prepare(  "UPDATE aluno SET
                                nomeCompleto = '$nomeCompleto',
                                dataNascimento = '$dataNascimento',
                                curso = '$curso', 
                                turma = '$turma', 
                                turno = '$turno', 
                                necessidadeEspecial = '$necessidadeEspecial', 
                                idUsuario = '$idUsuario'
                                WHERE idAluno = '$idAluno'");

        if(!$stmt->execute()){
            $_SESSION['msgErro'] = "Houve um erro com o banco de dados.";
        }

        return true;
    }

    public function delete($idAluno){
        global $pdo;

        $stmt = $pdo->query("DELETE FROM aluno WHERE aluno.idAluno = $idAluno"); 
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function insert($nomeCompleto, $dataNascimento, $curso, $turma, $turno, $necessidadeEspecial, $idUsuario){
        global $pdo;

        $stmt = $pdo->prepare("INSERT INTO aluno 
        (nomeCompleto, dataNascimento, curso, turma, turno, necessidadeEspecial, idUsuario) 
        VALUES (:nomeCompleto, :dataNascimento, :curso, :turma, :turno, :necessidadeEspecial, :idUsuario)"); 
        
        $stmt->bindValue(":nomeCompleto", $nomeCompleto);
        $stmt->bindValue(":dataNascimento", $dataNascimento);
        $stmt->bindValue(":curso", $curso);
        $stmt->bindValue(":turma", $turma);
        $stmt->bindValue(":turno", $turno);
        $stmt->bindValue(":necessidadeEspecial", $necessidadeEspecial);
        $stmt->bindValue(":idUsuario", $idUsuario);

        // if(!$this->validaInsertAluno($nomeCompleto, $dataNascimento, $curso, $turma, $turno, $necessidadeEspecial)){
        //     return false;
        // }

        if(!$stmt->execute()){
            $_SESSION['msgErro'] = "Houve um erro com o banco de dados.";
        }

        return true;
    }
    
    // public function loadAll($idUsuario){
    //     global $pdo;

    //     $stmt = $pdo->query("SELECT * FROM aluno LEFT JOIN usuario ON aluno.idUsuario = usuario.idUsuario WHERE usuario.idUsuario = $idUsuario"); 
        
    //     $stmt->execute();
      
    //     if($stmt->rowCount() > 0){
    //         $aluno = $stmt->fetchAll();
    //         return $aluno;
    //     }
    // }
    // public function validaInsertAluno($nomeCompleto, $dataNascimento, $curso, $turma, $turno, $necessidadeEspecial){
     
    // }
}
