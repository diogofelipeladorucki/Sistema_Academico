<?php

$raiz = '../../';
require_once $raiz."vendor/autoload.php";
require_once $raiz."source/support/config.php";

use App\aluno\aluno\Aluno;

$tituloPagina = "Cadastro de Alunos";
$aluno = new Aluno();

$tipoFormulario = CADASTRAR;

require_once "aluno.form.adm.php";
?>
<script>    window.reload()
            document.getElementsByName('nomeCompleto').value = '';
            console.log(x)
            window.alert(y)
</script>
