<?php
session_start();

$raiz = "../../";
require_once("../../source/support/config.php");

use Source\support\conection\Conection;
$pdo = Conection::getInstance();


//$_POST"username" TRAS NOME DE USUARIO OU EMAIL 
if($_POST["username"] && $_POST["senha"]){

    $usuario = new \App\usuario\usuario\Usuario();
    if($usuario->load($_POST["username"], $_POST["senha"])){ 
        header('Location: ../aluno/alunoBuscarSelect.adm.php');
        exit;

    }else{
        $_SESSION["msgErro"] = "Ops. Acho que você digitou algo errado!";
        header("Location: ../../login.php");
        exit;
    }
}else{
    $_SESSION["msgErro"] = "Todos os campos devem ser preenchidos!";
    header("Location: ../../login.php");
    exit;
}



