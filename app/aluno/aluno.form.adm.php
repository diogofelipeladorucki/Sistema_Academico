<?php

use Source\support\Footer;

if ($tipoFormulario != DETALHAR) {
    
    if (isset($_SESSION['msgSucesso'])) { 
        echo $_SESSION['msgSucesso']; 
    }else if(isset($_SESSION['msgErro'])) {
        echo $_SESSION['msgErro'];
    }

    unset($_SESSION['msgSucesso']);
    unset($_SESSION['msgErro']);
} ?>
<div class="container"> <?php
if($tipoFormulario == CADASTRAR){ ?>
    <form action="alunoCadastrarInsert.adm.php" method="post"> <?php
}else if($tipoFormulario == ALTERAR){ ?>
    <form action="alunoAlterarUpdate.adm.php" method="post">
    <input type="hidden" name="idAluno" value="<?=$aluno->idAluno?>"> <?php
} ?>
<br>
<label for="nomeCompleto">Nome Completo</label> <?php
if($tipoFormulario == DETALHAR){ ?>
    <input class='form-control form-control-sm' type="text" name="nomeCompleto" id="nomeCompleto" value="<?=$aluno->nomeCompleto?>" disabled><?php
}else{ ?>
    <input class='form-control form-control-sm' type="text" name="nomeCompleto" id="nomeCompleto" value="<?=$aluno->nomeCompleto?>"> <?php
} ?>

<label for="dataNascimento">Data de Nascimento</label> <?php
if($tipoFormulario == DETALHAR){ ?>
    <input class='form-control form-control-sm' type="date" name="dataNascimento" id="dataNascimento" value="<?=$aluno->dataNascimento?>" disabled> <?php
}else{ ?>
<input class='form-control form-control-sm' type="date" name="dataNascimento" id="dataNascimento" value="<?=$aluno->dataNascimento?>"> <?php
} ?>

<label for="curso">Curso</label> <?php
if($tipoFormulario == DETALHAR){ ?>
    <input class='form-control form-control-sm' type="text" name="curso" id="curso" value="<?=$aluno->curso?>" disabled> <?php
}else{ ?>
<input class='form-control form-control-sm' type="text" name="curso" id="curso" value="<?=$aluno->curso?>"> <?php
} ?>

<label for="turma">Turma</label> <?php
if($tipoFormulario == DETALHAR){ ?> 
    <input class='form-control form-control-sm' type="text" name="turma" id="turma"  value="<?=$aluno->turma?>" disabled> <?php
}else{ ?>
<input class='form-control form-control-sm' type="text" name="turma" id="turma"  value="<?=$aluno->turma?>"> 
<br><?php
} ?>
<div class="row">
<div class="col-sm">
<label for="turno">Turno</label> <?php
if($tipoFormulario == DETALHAR){ ?>
    <input class='form-control form-control-sm' type="text" name="turma" id="turma"  value="<?=$aluno->turno?>" disabled> <?php 
}else{ 
        
    $manha = null; $tarde = null; $noite = null;

    if($aluno->turno == "Manhã"){
        $manha = "checked";
    }else if($aluno->turno == "Tarde"){
        $tarde = "checked";
    }else if($aluno->turno == "Noite"){
        $noite = "checked";
    } ?>
<div class="form-check">
    <input class='form-check-input' type="radio" name="turno" id="turno1" value="Manhã" <?=$manha?>>
    <label class='form-check-label' for="turno1">Manhã</label>
</div>
<div class="form-check">
    <input class='form-check-input' type="radio" name="turno" id="turno2" value="Tarde" <?=$tarde?>>
    <label class='form-check-label' for="turno2">Tarde</label>
</div>
<div class="form-check">
    <input class='form-check-input' type="radio" name="turno" id="turno3" value="Noite" <?=$noite?>>
    <label class='form-check-label' for="turno3">Noite</label>
</div>
</div><br>
    <div class="col-sm"> <?php
} ?>
<label for="nessecidadeEspecial">Necessidade Especial</label> <?php

if($tipoFormulario == DETALHAR){ ?>
    <input class='form-control form-control-sm' type="text" name="turma" id="turma"  value="<?=$aluno->necessidadeEspecial?>" disabled> <?php 
}else{ 

    $sim = null; $nao = null;

    if($aluno->necessidadeEspecial == "Sim"){
        $sim = "checked";
    }else{
        $nao = "checked";
    } ?>
<div class="form-check">
    <input class='form-check-input' type="radio" name="necessidadeEspecial" id="necessidadeEspecial1" value="Não" <?=$nao?>>
    <label class='form-check-label' for="necessidadeEspecial1">Não</label>
</div>
<div class="form-check">
    <input class='form-check-input' type="radio" name="necessidadeEspecial" id="necessidadeEspecial2" value="Sim" <?=$sim?>>
    <label class='form-check-label' for="necessidadeEspecial2">Sim</label> 
</div>
</div>
</div><br> <?php
}

if($tipoFormulario == CADASTRAR){ ?>
<div class="col text-right">
    <button type="submit" class='btn btn-primary'>Cadastrar</button> 
</div>
    </form> <?php
}else if($tipoFormulario == ALTERAR){ ?>
<div class="col text-right">
    <button type="submit" class='btn btn-primary'>Alterar</button> 
</div>
    </form> 
    </div><?php
}

Footer::footerSimples();