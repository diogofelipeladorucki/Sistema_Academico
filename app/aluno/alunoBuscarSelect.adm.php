<?php
session_start(); phpinfo();
$raiz = '../../';
require_once $raiz."vendor/autoload.php";

use App\aluno\aluno\Aluno;
use App\aluno\collection\AlunoCollection;
use Source\support\Header;
use Source\support\conection\Conection;




$pdo = Conection::getInstance();
////

////
echo Header::headConfig();

echo "Olá, " . $_SESSION['nomeUsuario'];

$alunos = new AlunoCollection();
$alunos = $alunos->loadAll($_SESSION['idUsuario']);
// echo "<pre>";
// print_r($alunos);
// echo "<pre>"; die;
?><br>

<script language="javascript" type="text/javascript">
    function cadastrarPopUp(){
        window.open('alunoCadastrarForm.adm.php', 'Cadastrar Novo Aluno', "width=600 height=600")
    }

    function detalharPopUp(idAluno){
        
        window.open('alunoDetalhar.adm.php?idAluno='+idAluno, 'Detalhar Cadastro de Aluno', "width=600 height=600")
        
    }

    function deletarPopUp(idAluno){
        
        var resp = confirm("Deseja realmente deletar o cadastro?")
        
        if(resp)
            window.open('alunoDeletar.adm.php?idAluno='+idAluno, 'Deletar Cadastro de Aluno', "width=600 height=600")
    }

    function alterarPopUp(idAluno){
        window.open('alunoAlterarForm.adm.php?idAluno='+idAluno, 'Alterar Cadastro de Aluno', "width=600 height=600")
    }
</script>
<style>
    .centro{
        text-align: center;
        justify-content: center;
    }
</style>

<a href="" onClick='javascript:cadastrarPopUp(); return false' >Cadastrar Novo Aluno</a>
<?php
if(isset($alunos)){
    echo "
<table class='table table-sm'>
    <thead>
        <tr>
            <th class='centro' scope='col' wigth='10%'>ID</th>
            <th class='centro' scope='col' width='35%'>Nome</th>
            <th class='centro' scope='col' width='20%'>Curso</th>
            <th class='centro' scope='col' width='20%'>Turma</th>
            <th class='centro' scope='col' width='15%'>Opcões</th>
        
        </tr>
    </thead>
    <tbody>";  


    $qtd = count($alunos);

    for ($i=0; $i < $qtd; $i++) { 
        $idAluno = $alunos[$i]->idAluno;

        echo "
        <tr>
            
            <th class='centro' scope='row'>" . $alunos[$i]->idAluno . "</th>
            <td>" . $alunos[$i]->nomeCompleto . "</td>
            <td>" . $alunos[$i]->curso . "</td>
            <td class='centro'>" . $alunos[$i]->turma . "</td>
            <td class='centro'>

            &nbsp;
            <a href='' onClick='javascript:detalharPopUp({$idAluno}); return false'>
            <svg class='bi bi-eye' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path fill-rule='evenodd' d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z'/>
            <path fill-rule='evenodd' d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
            </svg></a>&nbsp;&nbsp;

            <a href='' onClick='javascript:alterarPopUp({$idAluno}); return false' >
            <svg class='bi bi-pencil-square' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
            </svg></a>&nbsp;&nbsp;

            <a href='' onClick='javascript:deletarPopUp({$idAluno}); return false'>
            <svg class='bi bi-trash' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg></a>&nbsp;

            </td>
        </tr>";
    }  
    echo "     
    </tbody>
</table>";
}else{
            echo "<p class='centro'>Nenhum aluno cadastrado</p>";
        }

            
         ?>
         

        
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>