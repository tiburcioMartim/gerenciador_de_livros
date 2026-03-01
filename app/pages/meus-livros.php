<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

// processar exclusão caso tenha sido enviada pelo formulário
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    !empty($_POST['deletar_id'])
) {
    $id = intval($_POST['deletar_id']);
    if (DeletarLivro($conn, $id)) {
        // após excluir, redireciona para evitar reenvio de formulário
        header('Location: meus-livros.php');
        exit;
    }
}

// carregar lista de livros para exibição
MeusLivros($conn);

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

        <?php /* chamada movida para início do script */ ?>

        <?php if (!empty($livros)): ?>
            <?php foreach ($livros as $row): ?>
                <div class="alig-left card-primary cont-livros">
                <p><b>ID: </b><?= (int)($row['id']) ?></p>
                <p><b>Nome: </b><?= htmlspecialchars($row['nome']) ?></p>
                <p><b>Publicação: </b><?= htmlspecialchars($row['ano_publicação']) ?></p>
                <p><b>Gênero: </b><?= htmlspecialchars($row['genero']) ?></p>

                <div class="cont-ico">
                    <form method="POST">
                        <input type="hidden" name="deletar_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn-meus_livros">
                            <img src="/6_gerenciamento_de_livros/app/assets/botao-apagar.png">
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="alig-left">Nenhum livro cadastrado.</p>
        <?php endif; ?>

    </section>
</body>
</html> 