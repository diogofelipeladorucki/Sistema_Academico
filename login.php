<?php
session_start();

require_once "vendor/autoload.php";

use Source\support\Header;

echo Header::headConfig();

?>

<body>
    <header>
        HEADER
        <?php echo base64_decode('MTIzNA==') ?>
    </header>
    <div>

        <?= $_SESSION['msgErro'] ?? ""; ?>

        <form action="app/usuario/usuarioLogar.adm.php" method="POST">
            Nome de Usuário: <input type="text" name="username" value="<?= $_SESSION['username'] ?? '';  ?>">
            Senha: <input type="password" name="senha" id="">
            <button type="submit">Entrar</button>
        </form>
        <a href="app/usuario/usuarioCadastrarForm.adm.php">Cadastrar</a>
    </div>
    <?php unset($_SESSION['msgErro']); ?>
</body>
</html>