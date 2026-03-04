<?php
header('content-type: application/json; charset=utf-8');
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions-php.php';
// api.php não pode haver nada de HTML ou JS, senão a resposta JSON irá quebrar.
// Deixe a lógica JS em arquivos separados.

$response = ['sucesso' => false, 'mensagem' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'deletar') {
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            if (DeletarLivro($conn, $id)) {
                $response['sucesso'] = true;
                $response['mensagem'] = 'Livro deletado com sucesso.';
            }
        } else {
            $response['mensagem'] = 'ID inválido.';
        }
    } elseif ($acao === 'atualizar') {
        $id = intval($_POST['id'] ?? 0);
        $nome = $_POST['nome'] ?? '';
        $ano_publicacao = $_POST['ano_publicacao'] ?? '';
        $genero = $_POST['genero'] ?? '';

        if ($id > 0 && !empty($nome) && !empty($ano_publicacao) && !empty($genero)) {
            if (AtualizarLivro($conn, $id, $nome, $ano_publicacao, $genero)) {
                $response['sucesso'] = true;
                $response['mensagem'] = 'Livro atualizado com sucesso.';
            }
        } else {
            $response['mensagem'] = 'Dados incompletos.';
        }
    } else {
        $response['mensagem'] = 'Ação inválida.';
    }
}

echo json_encode($response);
exit();
