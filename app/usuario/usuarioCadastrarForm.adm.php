<?php
session_start();
$raiz = "../../";
use Source\support\Header;

require_once "{$raiz}vendor/autoload.php";

echo Header::headConfig();
?>

<body>
    <?= $_SESSION["msgSucesso"] ?? ''; ?>
    <?= $_SESSION["msgErro"] ?? ''; ?>
    
    <div>
        <form action="usuarioCadastrarInsert.adm.php" method="POST">
            Nome Completo: <input type="text" name="nomeCompleto" id="" value="<?=$_SESSION['nomeCompleto'] ?? ''; ?>">
            Nome de Usuário: <input type="text" name="username" id="" value="<?=$_SESSION['username'] ?? ''; ?>">
            Email: <input type="email" name="email" id="" value="<?=$_SESSION['email'] ?? ''; ?>">
            Senha: <input type="password" name="senha" id="" >
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <?php   unset($_SESSION["msgSucesso"]);
            unset($_SESSION["msgErro"]);
            unset($_SESSION["nomeCompleto"]);
            unset($_SESSION["username"]);
            unset($_SESSION["email"]); ?>
</body>
</html>