<?php 
require_once __DIR__ . '/../config/database.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/6_gerenciamento_de_livros/app/styles.css">
</head>
<body>
    <section class="wid-mob">
        <div class="alig-center">
            <?php  require_once __DIR__ . '/../includes/header.php'; ?>                
        </div>
        <div class="alig-left">
            <h3 class="alig-left">Registrar livro</h3>
            <p class="p-default">Registre quantos livros você precisar.</p>

            <form class="form-cadastro" action="" method="post">
                <label for="nome">Nome do livro: </label>
                <input type="text" name="nome" id="">

                <label for="email">Ano de publicação: </label>
                <input type="email" name="email" id="">

                <label for="senha">Gênero: </label>
                <input type="password" name="senha" id="">

                <input class="btn-secundario" type="submit" value="Registrar">
            </form>
        </div>
    </section>
</body>

</html>