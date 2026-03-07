<?php
require_once __DIR__ . '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com" />
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <section class="wid-mob">
        <div class="alig-center">
            <a href="/index.php"><img src="/assets/logo-media.png" height="148.52" width="172.12" alt="Imagem gerenciamento de ebook"></a>
            
        </div>
        <div class="alig-left">
            <h3>Cadastro de usuário</h3>

            <form class="form-cadastro" action="" method="post">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="">

                <label for="email">E-mail: </label>
                <input type="email" name="email" id="">

                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="">

                <input class="btn-secundario" type="submit" value="Entrar">
            </form>
            <a class="link-primario" href="/pages/login.php">Login</a>
            
        </div>
    </section>
</body>

</html>