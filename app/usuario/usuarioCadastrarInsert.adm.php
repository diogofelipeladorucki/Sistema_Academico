<?php
session_start();
use Source\support\conection\Conection;
use Source\support\Helpers;

$raiz = "../../";
require_once "../../vendor/autoload.php";

$pdo = Conection::getInstance();

$_SESSION["nomeCompleto"] = $_POST["nomeCompleto"];
$_SESSION["username"] = $_POST["username"];
$_SESSION["email"] = $_POST["email"];

$usuario = new \App\usuario\usuario\Usuario();

if($_POST["nomeCompleto"] && $_POST["username"] && $_POST["email"] && $_POST["senha"]){

    if($usuario->insert($_POST["nomeCompleto"], 
                        $_POST["username"], 
                        $_POST["email"], 
                        $_POST["senha"])){
                        
        $_SESSION["msgSucesso"] = "Cadastro criado com sucesso! 
        Clique <a href='../../index'>aqui</a> para fazer o login."; 

        header("Location: usuarioCadastrarForm.adm.php");
        exit;
    }else{
        header("Location: usuarioCadastrarForm.adm.php");
        exit; 
    }
    
}else{
    $_SESSION["msgErro"] = "Todos os campos devem ser preenchidos!";
    header("Location: usuarioCadastrarForm.adm.php");
    exit;
}

