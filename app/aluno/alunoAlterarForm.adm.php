<?php

$raiz = '../../';
require_once $raiz."vendor/autoload.php";
require_once $raiz."source/support/config.php";

use Source\support\conection\Conection;
use App\aluno\aluno\Aluno;

$pdo = Conection::getInstance();
//var_dump($_POST['idAluno']); die;
$tituloPagina = "Cadastro de Alunos";
$aluno = new Aluno();
$aluno->load($_GET['idAluno'], $_SESSION['idUsuario']);

$tipoFormulario = ALTERAR;

require_once "aluno.form.adm.php";
