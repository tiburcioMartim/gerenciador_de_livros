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
        <h3 class="alig-left">Meus livros</h3>

        <div class="alig-left card-primary cont-livros">
            <p><b>Nome:</b> O Hobbit</p>
            <p><b>Publicação:</b> 1990</p>
            <p><b>Gênero:</b> Fantasia</p>
            <div class="cont-ico">
                <img src="/6_gerenciamento_de_livros/app/assets/botao-apagar.png" alt="Botão de apagar">
                <img src="/6_gerenciamento_de_livros/app/assets/caneta.png" alt="Caneta">
            </div>
        </div>

    </section>
</body>

</html>