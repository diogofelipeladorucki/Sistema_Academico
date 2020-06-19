<?php
session_start();

require_once "vendor/autoload.php";

use Source\support\Footer;
use Source\support\Header;

Header::headConfig();

?>

<body>        
    <form class='container offset-lg-4 col-lg-4 offset-md-3 col-md-6 text-center' action="app/usuario/usuarioLogar.adm.php" method="POST">
        <?php
        if(empty($_SESSION["msgErro"])){
            echo "<br><br><br>";
        }

        if(isset($_SESSION["msgErro"])){
            echo "<br>
            <div class='alert alert-warning' role='alert'>
            " . $_SESSION["msgErro"] . "
            </div>";
            unset($_SESSION["msgErro"]);
        } ?>
        
        <p style="font-size:50px">&#127891;</p>
        <h1 class="h3 mb-3 font-weight-normal text-primary">Academic Register </h1><br>
            <input class='form-control' type="text" name="username" value="<?= $_SESSION['username'] ?? '';  ?>" placeholder='Nome de Usuário ou Email'><br>
            <input class='form-control' type="password" name="senha" id="" placeholder='Senha'><br>
            <div class='text-right'>
                <a class='btn btn-success' href="app/usuario/usuarioCadastrarForm.adm.php">Cadastrar</a>
                <button class='btn btn-primary' type="submit">Entrar</button>
            </div>
        </form>
    <?php unset($_SESSION['msgErro']); 
    
    Footer::footerSimples(); ?>
</body>
</html>