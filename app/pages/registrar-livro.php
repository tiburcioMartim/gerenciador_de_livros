<?php 
require_once __DIR__ . '/../config/database.php'; 
require_once __DIR__ . '/../includes/functions.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/6_gerenciamento_de_livros/app/styles.css">
</head>
<body>
    <?php RegistrarLivro($conn, $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT)); ?>

    <section class="wid-mob">
        <div class="alig-center">
            <?php  require_once __DIR__ . '/../includes/header.php'; ?>                
        </div>
        <div class="alig-left">
            <h3 class="alig-left">Registrar livro</h3>
            <p class="p-default">Registre quantos livros você precisar.</p>

            <form class="form-cadastro" action="" method="post">
                <label for="nome_livro">Nome do livro: </label>
                <input type="text" name="nome_livro" placeholder="Qual é o e-book?" required>

                <label for="ano_publicacao">Ano de publicação: </label>
                <input type="date" name="ano_publicacao" placeholder="Quando que foi publicado?" required>

                <label for="genero">Gênero: </label>
                <select class="select-primario" name="genero" required>
                    <option value="" disabled selected>Selecione o gênero</option>
                    <option value="fantasia">Fantasia</option>
                    <option value="comedia">Comédia</option>
                    <option value="drama">Drama</option>
                    <option value="infantil">Infantil</option>
                    <option value="romance">Romance</option>
                    <option value="aventura">Aventura</option>
                    <option value="ficcao">Ficção</option>
                    <option value="luta">Luta</option>
                    <option value="terror">Terror</option>
                </select>

                <input class="btn-secundario" type="submit" name="registrar_livro" value="Registrar">
            </form>
        </div>
    </section>
</body>

</html>