<?php
require_once __DIR__ . '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . '/../includes/head.php'; ?>
</head>

<body>
    <section class="wid-mob">
        <div class="alig-center">
            <a href="/index.php"><img src="/assets/logo-media.png" height="148.52" width="172.12" alt="Imagem gerenciamento de ebook"></a>
            
        </div>
        <div class="alig-left">
            <h3>Login</h3>

            <form class="form-cadastro" action="" method="post">
                <label for="nome">Nome / E-mail: </label>
                <input type="text" name="nome" id="">

                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="">

                <input class="btn-secundario" type="submit" value="Entrar">
            </form>
            <a class="link-primario" href="/pages/cadastro-usuario.php">Cadastro</a>

        </div>
    </section>
</body>

</html>