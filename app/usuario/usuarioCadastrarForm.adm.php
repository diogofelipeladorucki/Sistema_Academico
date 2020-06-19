<?php
session_start();
$raiz = "../../";
use Source\support\Footer;
use Source\support\Header;

require_once "{$raiz}vendor/autoload.php";

Header::headConfig();
?>

<body class='container offset-lg-4 col-lg-4 offset-md-3 col-md-6 text-center'> <?php
    
    if(empty($_SESSION["msgSucesso"]) && empty($_SESSION["msgErro"])){
        echo "<br><br><br>";
    }

    if(isset($_SESSION["msgSucesso"])){
        echo "<br>
        <div class='alert alert-success' role='alert'>
        " . $_SESSION["msgSucesso"] . "
        </div>";
        unset($_SESSION["msgSucesso"]);
    }

    if(isset($_SESSION["msgErro"])){
        echo "<br>
        <div class='alert alert-warning' role='alert'>
        " . $_SESSION["msgErro"] . "
        </div>";
        unset($_SESSION["msgErro"]);
    }

    ?>

    <form class='form-signin' action="usuarioCadastrarInsert.adm.php" method="POST">
        <p style="font-size:50px">&#127891;</p>
        <h1 class="h3 mb-3 font-weight-normal text-success">faça seu cadastro </h1><br>

        <!-- <label class='sr-only' for="nomeCompleto">Nome Completo</label> -->
        <input class='form-control' type="text" name="nomeCompleto" id="nomeCompleto" placeholder="Nome Completo" value="<?=$_SESSION['nomeCompleto'] ?? ''; ?>"><br>
        <!-- <label for="nomeUsuario">Nome de Usuário</label> -->
        <input class='form-control' type="text" name="username" id="nomeUsuario" placeholder="Nome de Usuário" value="<?=$_SESSION['username'] ?? ''; ?>"><br>
        <!-- <label for="email">Email</label> -->
        <input class='form-control' type="email" name="email" id="email" placeholder="Email" value="<?=$_SESSION['email'] ?? ''; ?>"><br>
        <!-- <label for="senha">Senha</label> -->
        <input class='form-control' type="password" name="senha" id="senha" placeholder="Senha"><br>
        <div class="text-right">
        <button class='text-left btn btn-success' type="submit">Cadastrar</button>
        </div>
    </form>
    <?php   
    Footer::footerSimples();?>
</body>
</html>