<?php
//Variável global
global $contagem_livros;

// Includes
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions-php.php';
require_once __DIR__ . '/../includes/functions-js.php';

// carregar lista de livros para exibição
meusLivros($conn);
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
            <?php require_once __DIR__ . '/../includes/header.php'; ?>
        </div>
        <h3 class="alig-left">Meus livros</h3>
        <p>Tenho <?php echo "<span id='contagem_livros_id'></span>"; ?> livros cadastrados.</p>

        <?php if (!empty($livros)): ?>
            <?php foreach ($livros as $row): ?>
                <!-- Contando quantos livros têm. -->
                <?php if ($row) {
                    $contagem_livros = $contagem_livros + 1;
                } ?>
                <div class="alig-left card-primary cont-livros" id="livro-<?= $row['id'] ?>">
                    <!-- Exibição dos dados -->
                    <div class="info-display" id="info-<?= $row['id'] ?>">
                        <p><b>ID: </b><?= (int)($row['id']) ?></p>
                        <p><b>Nome: </b><span id="nome-display-<?= $row['id'] ?>"><?= htmlspecialchars($row['nome']) ?></span></p>
                        <p><b>Publicação: </b><span id="ano-display-<?= $row['id'] ?>"><?= htmlspecialchars($row['ano_publicação']) ?></span></p>
                        <p><b>Gênero: </b><span id="genero-display-<?= $row['id'] ?>"><?= htmlspecialchars($row['genero']) ?></span></p>
                    </div>

                    <!-- Campos de edição -->
                    <div class="campo-edicao" id="edicao-<?= $row['id'] ?>">
                        <label><b>Nome:</b></label>
                        <input type="text" id="nome-input-<?= $row['id'] ?>" value="<?= htmlspecialchars($row['nome']) ?>">

                        <label><b>Publicação:</b></label>
                        <input type="text" id="ano-input-<?= $row['id'] ?>" placeholder="Exe.: 1994" value="<?= htmlspecialchars($row['ano_publicação']) ?>">

                        <label><b>Gênero:</b></label>
                        <?php require __DIR__ . '/../includes/generos.php'; ?>
                    </div>

                    <!-- Botões -->
                    <div class="cont-ico">
                        <button type="button" class="btn-secundario campo-edicao ativo" id="btn-editar-<?php echo $row['id']; ?>" onclick="editarLivro(<?= $row['id'] ?>, event)">Editar</button>
                        <button type="button" class="btn-secundario campo-edicao ativo" id="btn-deletar-<?php echo $row['id'] ?>" onclick="deletarLivro(<?= $row['id'] ?>, event)">Deletar</button>
                    </div>

                    <!-- Botões de edicao -->
                    <div class="botoes-edicao" id="botoes-<?= $row['id'] ?>">
                        <button type="button" class="btn-salvar" onclick="salvarLivro(<?= $row['id'] ?>, event)">Salvar</button>
                        <button type="button" class="btn-cancelar" onclick="cancelarEdicao(<?= $row['id'] ?>, event)">Cancelar</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <script>
                const trocar_valor = document.getElementById('contagem_livros_id').innerText = <?= htmlspecialchars(json_encode($contagem_livros), ENT_QUOTES, 'UTF-8') ?>;
            </script>
        <?php else: ?>
            <p class="alig-left">Nenhum livro cadastrado.</p>
        <?php endif; ?>

    </section>
</body>

</html>