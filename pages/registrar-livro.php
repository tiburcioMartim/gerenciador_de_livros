<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions-php.php';
require_once __DIR__ . '/../includes/functions-js.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once __DIR__ . '/../includes/head.php'; ?>
</head>

<body>
    
    <?php registrarLivro($conn, $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT)); ?>
    
    <section class="wid-mob">
        <div class="alig-center">
            <?php require_once __DIR__ . '/../includes/header.php'; ?>
        </div>
        <div class="alig-left">
            <h3 class="alig-left">Registrar livro</h3>
            <p class="p-default">Registre quantos livros você precisar.</p>

            <form class="form-cadastro" action="" method="post">
                <label for="nome_livro">Nome do livro: </label>
                <input type="text" name="nome_livro" placeholder="Qual é o e-book?" required>

                <label for="ano_publicacao">Ano de publicação: </label>
                <input type="number" name="ano_publicacao" placeholder="Quando que foi publicado?" required>

                <label for="genero">Gênero: </label>
                <?php require_once __DIR__ . '/../includes/generos.php'; ?>

                <input class="btn-secundario" type="submit" name="registrar_livro" value="Registrar">
            </form>
        </div>
    </section>
</body>

</html>