<?php
//session_start();
if ($tipoFormulario != DETALHAR) {
    
    if (isset($_SESSION['msgSucesso'])) { 
        echo $_SESSION['msgSucesso']; 
    }else if(isset($_SESSION['msgErro'])) {
        echo $_SESSION['msgErro'];
    }

    unset($_SESSION['msgSucesso']);
    unset($_SESSION['msgErro']);
}

if($tipoFormulario == CADASTRAR){ ?>
    <form action="alunoCadastrarInsert.adm.php" method="post"> <?php
}else if($tipoFormulario == ALTERAR){ ?>
    <form action="alunoAlterarUpdate.adm.php" method="post">
    <input type="hidden" name="idAluno" value="<?=$aluno->idAluno?>"> <?php
} ?>

<label for="nomeCompleto">Nome Completo:</label> <?php
if($tipoFormulario == DETALHAR){ 
    echo $aluno->nomeCompleto;
}else{ ?>
    <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?=$aluno->nomeCompleto?>"> <?php
} ?>

<label for="dataNascimento">Data de Nascimento:</label> <?php
if($tipoFormulario == DETALHAR){ 
    echo $aluno->dataNascimento;
}else{ ?>
<input type="date" name="dataNascimento" id="dataNascimento" value="<?=$aluno->dataNascimento?>"> <?php
} ?>

<label for="curso">Curso:</label> <?php
if($tipoFormulario == DETALHAR){ 
    echo $aluno->curso;
}else{ ?>
<input type="text" name="curso" id="curso" value="<?=$aluno->curso?>"> <?php
} ?>

<label for="turma">Turma:</label> <?php
if($tipoFormulario == DETALHAR){ 
    echo $aluno->turma;
}else{ ?>
<input type="text" name="turma" id="turma"  value="<?=$aluno->turma?>"> <?php
} ?>

<label for="turno">Turno:</label> <?php
if($tipoFormulario == DETALHAR){ 
    echo $aluno->turno;
}else{ 
        
    $manha = null; $tarde = null; $noite = null;

    if($aluno->turno == "Manhã"){
        $manha = "checked";
    }else if($aluno->turno == "Tarde"){
        $tarde = "checked";
    }else if($aluno->turno == "Noite"){
        $noite = "checked";
    } ?>
<input type="radio" name="turno" id="turno" value="Manhã" <?=$manha?>>Manhã 
<input type="radio" name="turno" id="turno" value="Tarde" <?=$tarde?>>Tarde
<input type="radio" name="turno" id="turno" value="Noite" <?=$noite?>>Noite <?php
} ?>

<label for="nessecidadeEspecial">Necessidade Especial:</label> <?php

if($tipoFormulario == DETALHAR){ 
    echo $aluno->necessidadeEspecial;
}else{ 

    $sim = null; $nao = null;

    if($aluno->necessidadeEspecial == "Sim"){
        $sim = "checked";
    }else{
        $nao = "checked";
    } ?>
<input type="radio" name="necessidadeEspecial" id="necessidadeEspecial" value="Não" <?=$nao?>>Não 
<input type="radio" name="necessidadeEspecial" id="necessidadeEspecial" value="Sim" <?=$sim?>>Sim <?php
}

if($tipoFormulario == CADASTRAR){ ?>
    <button type="submit">Cadastrar</button> 
    </form> <?php
}else if($tipoFormulario == ALTERAR){ ?>
    <button type="submit">Alterar</button> 
    </form> <?php
}





// </form>