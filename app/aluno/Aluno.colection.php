<?php

namespace App\aluno\collection;

use App\aluno\aluno\Aluno;
use Source\support\Conection;

class AlunoCollection {
    public $dados;

    public function loadAll($idUsuario){
        global $pdo;

        $stmt = $pdo->query("SELECT aluno.* FROM aluno LEFT JOIN usuario ON aluno.idUsuario = usuario.idUsuario WHERE usuario.idUsuario = $idUsuario"); 
        
        $stmt->execute();
      
        if($stmt->rowCount() > 0){
            
            $alunoTemp = $stmt->fetchAll();
           
            foreach ($alunoTemp as $value) {
                $aluno = new Aluno();
                $aluno->idAluno = $value->idAluno;
                $aluno->nomeCompleto = $value->nomeCompleto;
                $aluno->dataNascimento = $value->dataNascimento;
                $aluno->curso = $value->curso;
                $aluno->turma = $value->turma;
                $aluno->turno = $value->turno;
                $aluno->necessidadeEspecial = $value->necessidadeEspecial;
                $aluno->idUsuario = $value->idUsuario;

                $arrayAlunos[] = $aluno;
                
            }
            //var_dump($arrayAlunos); die;
            
            
            return $arrayAlunos;
        }
    }
}
