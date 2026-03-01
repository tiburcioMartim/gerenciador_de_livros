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
    <section class="wid-mob">
        <div class="alig-center">
            <?php  require_once __DIR__ . '/../includes/header.php'; ?>            
        </div>
        <h3 class="alig-left">Meus livros</h3>

        <?php MeusLivros($conn); ?>       

    </section>
</body>

</html>