<?php

$raiz = '../../';
require_once $raiz."vendor/autoload.php";
require_once $raiz."source/support/config.php";
use Source\support\conection\Conection;
use App\aluno\aluno\Aluno;

$pdo = Conection::getInstance();

$tituloPagina = "Apagar Cadastro de Alunos";

$aluno = new Aluno();

if($aluno->delete($_GET['idAluno'])){
    $msg = "Cadastro apagado com sucesso.";
    echo "
        <script> 
            window.alert('$msg')
            window.opener.location.reload()
            window.close()
        </script>";
}else{
    $msg = "Ops... por algum motivo o cadastro não foi apagado.";
    echo "
        <script> 
            window.alert('$msg')
            window.opener.location.reload()
            window.close()
        </script>";
}

