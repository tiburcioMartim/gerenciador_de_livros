<?php
    function RegistrarLivro($conn, $dados) {
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








?>