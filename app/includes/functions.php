<!---------------------------------------------------------------------------->
<!-------------------------------- FUNÇÕES PHP ------------------------------->
<!---------------------------------------------------------------------------->
<?php
    function RegistrarLivro($conn, $dados)
    {
        if (!empty($dados['registrar_livro'])) {
            $nome = $dados['nome_livro'];
            $ano_publicacao = $dados['ano_publicacao'];
            $genero = $dados['genero'];

            $stmt = $conn->prepare("INSERT INTO registrar_livro (nome, ano_publicação, genero) VALUES (?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param("sss", $nome, $ano_publicacao, $genero);

                if ($stmt->execute()) {
                    if ($stmt->affected_rows > 0) {
                        echo "<script>alert('Livro cadastrado.');</script>";
                        $stmt->close();
                    }
                    // echo "<h3 style='color: green; text-align: center;'>Execute concluído.</h3>";

                } else {
                    echo "<h3 style='color: red; text-align: center;'>Falha no execute.</h3>";
                }

                // echo "<h3 style='color: green; text-align: center;'>Prepare concluído.</h3>";

            } else {
                echo "<h3 style='color: red; text-align: center;'>Falha no prepare.</h3>";
            }
        }
    }

    function MeusLivros($conn)
    {
        // busca todos os livros e deixa disponível em $livros para a view
        $stmt = $conn->prepare('SELECT * FROM registrar_livro ORDER BY id DESC;');

        if (!$stmt) {
            die("<p style='color:#f00;'>Erro no prepare: " . htmlspecialchars($conn->error) . "</p>");
        }

        if (!$stmt->execute()) {
            die("<p style='color:#f00;'>Erro no execute: " . htmlspecialchars($stmt->error) . "</p>");
        }

        $result = $stmt->get_result();
        if (!$result) {
            die("<p style='color:#f00;'>Erro no get_result: " . htmlspecialchars($stmt->error) . "</p>");
        }

        // atribui o array de resultados a uma variável global para uso na view
        global $livros;
        $livros = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
    }

    function DeletarLivro(mysqli $conn, int $id): bool
    {
        // prepara consulta usando placeholder e vincula parâmetro
        $stmt = $conn->prepare('DELETE FROM registrar_livro WHERE id = ?');
        if (!$stmt) {
            die("<p style='color:#f00;'>Erro no prepare (DELETE): " . htmlspecialchars($conn->error) . "</p>");
        }

        $stmt->bind_param("i", $id);

        $executar = $stmt->execute();

        if (!$executar) {
            die("<p style='color:#f00;'>Erro no execute (DELETE): " . htmlspecialchars($stmt->error) . "</p>");
        }

        $stmt->close();
        return true;
    }

    function AtualizarLivro(mysqli $conn, int $id, string $nome, string $ano_publicacao, string $genero): bool
    {
        // prepara consulta de atualização
        $stmt = $conn->prepare('UPDATE registrar_livro SET nome = ?, ano_publicação = ?, genero = ? WHERE id = ?');
        if (!$stmt) {
            die("<p style='color:#f00;'>Erro no prepare (UPDATE): " . htmlspecialchars($conn->error) . "</p>");
        }

        $stmt->bind_param("sssi", $nome, $ano_publicacao, $genero, $id);

        $executar = $stmt->execute();

        if (!$executar) {
            die("<p style='color:#f00;'>Erro no execute (UPDATE): " . htmlspecialchars($stmt->error) . "</p>");
        }

        $stmt->close();
        return true;
    }


    function debug($a) : bool {
        return $a + ": Passou pelo debug.";
    }
?>

<!---------------------------------------------------------------------------->
<!---------------------------- FUNÇÕES JAVASCRIPT ---------------------------->
<!---------------------------------------------------------------------------->

<script>
    function editarLivro(id, event) {
        event.preventDefault();
        event.stopPropagation();

        // Oculta exibição e mostra campos de edição
        document.getElementById('info-' + id).classList.add('oculto');
        document.getElementById('edicao-' + id).classList.add('ativo');
        document.getElementById('botoes-' + id).classList.add('ativo');
        document.getElementById('btn-editar-' + id).classList.remove('ativo');
        document.getElementById('btn-deletar-' + id).classList.remove('ativo');
    }

    function cancelarEdicao(id, event) {
        event.preventDefault();
        event.stopPropagation();

        // Mostra exibição e oculta campos de edição
        document.getElementById('info-' + id).classList.remove('oculto');
        document.getElementById('edicao-' + id).classList.remove('ativo');
        document.getElementById('botoes-' + id).classList.remove('ativo');
        document.getElementById('btn-editar-' + id).classList.add('ativo');
        document.getElementById('btn-deletar-' + id).classList.add('ativo');
    }

    function salvarLivro(id, event) {
        event.preventDefault();
        event.stopPropagation();
        
        const nome = document.getElementById('nome-input-' + id).value.trim();
        const ano = document.getElementById('ano-input-' + id).value.trim();
        const genero = document.getElementById('genero-input-' + id).value.trim();

        if (!nome || !ano || !genero) {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        const formData = new FormData();
        formData.append('acao', 'atualizar');
        formData.append('id', id);
        formData.append('nome', nome);
        formData.append('ano_publicacao', ano);
        formData.append('genero', genero);

        fetch('/6_gerenciamento_de_livros/app/api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    // Atualiza os dados na tela
                    document.getElementById('nome-display-' + id).textContent = nome;
                    document.getElementById('ano-display-' + id).textContent = ano;
                    document.getElementById('genero-display-' + id).textContent = genero;

                    // Volta para modo de exibição
                    cancelarEdicao(id, new Event('submit'));
                    alert('Livro atualizado com sucesso!');
                } else {
                    alert('Erro ao atualizar: ' + data.mensagem);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao processar a solicitação.');
            });
    }

    function deletarLivro(id, event) {
        event.preventDefault();
        // event.stopPropagation();

        // if (!confirm('Deseja deletar este livro?')) {
        //     return;
        // }
        const formData = new FormData();
        formData.append('acao', 'deletar');
console.log(formData.append('acao', 'deletar'))
        formData.append('id', id);

        fetch('/6_gerenciamento_de_livros/app/api.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log(response);
                return response.json();
            })
            .then(response => response.json())
            .then(data => {
                if (data.sucesso) {
                    // Remove o elemento do DOM
                    const elemento = document.getElementById('livro-' + id);
                    if (elemento) {
                        elemento.remove();
                    }
                    alert('Livro deletado com sucesso!');
                } else {
console.log('Erro ao deletar: ' + data.mensagem);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
console.log('Erro ao processar a solicitação.');
            });
    }
</script>