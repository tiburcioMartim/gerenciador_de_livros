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





?>