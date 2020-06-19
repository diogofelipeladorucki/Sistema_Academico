<?php

$raiz = '../../';
require_once $raiz."vendor/autoload.php";
require_once $raiz."source/support/config.php";
use Source\support\Header;
use Source\support\conection\Conection;
use App\aluno\aluno\Aluno;

$pdo = Conection::getInstance();

$tituloPagina = "Cadastro de Alunos";

$aluno = new Aluno();
$aluno->load($_GET['idAluno'], $_SESSION['idUsuario']);

$tipoFormulario = DETALHAR;

Header::headConfig();
Header::headerSimples();
require_once "aluno.form.adm.php";

