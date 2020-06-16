<?php
//session_start();
$raiz = '../../';
require_once $raiz."vendor/autoload.php";
require_once $raiz."source/support/config.php";

use Source\support\conection\Conection;
use App\aluno\aluno\Aluno;

$pdo = Conection::getInstance();

$aluno = new Aluno();
// var_dump($_POST['nomeCompleto'], 
// $_POST['dataNascimento'], 
// $_POST['curso'], 
// $_POST['turma'], 
// $_POST['turno'], 
// $_POST['necessidadeEspecial'], 
// $_SESSION['idUsuario']); die;

if( $_POST["nomeCompleto"] &&  
    $_POST['dataNascimento'] &&  
    $_POST['curso'] &&  
    $_POST['turma'] &&  
    $_POST['turno'] &&  
    $_POST['necessidadeEspecial'] &&  
    $_SESSION['idUsuario']){

    if($aluno->insert(  $_POST['nomeCompleto'], 
                        $_POST['dataNascimento'], 
                        $_POST['curso'], 
                        $_POST['turma'], 
                        $_POST['turno'], 
                        $_POST['necessidadeEspecial'], 
                        $_SESSION['idUsuario'])){

        //$_SESSION['msgSucesso'] = "Cadastro de Aluno Realizado com Sucesso!"; 

        $msg = "Cadastro de Aluno Atualizado com Sucesso!";
        echo "
        <script> 
            window.alert('$msg')
            window.opener.location.reload()
            window.close()
        </script>";
    }
}else{

    //$_SESSION['msgErro'] = "Todos os campos devem ser preenchidos.";

    $msg = "Todos os campos devem ser preenchidos.";
    echo "
        <script> 
            window.alert('$msg')
            window.opener.location.reload()
            window.close()
        </script>";
}


