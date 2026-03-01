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

    function MeusLivros($conn) {
        $stmt = $conn->prepare('SELECT * FROM registrar_livro ORDER BY id DESC;');

        if (!$stmt) {
        die("<p style='color:#f00;'>Erro no prepare: " . htmlspecialchars($conn->error) . "</p>");
        }

        if (!$stmt->execute()) {
            die("<p style='color:#f00;'>Erro no execute: " . htmlspecialchars($stmt->error) . "</p>");
        }

        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<div class='alig-left card-primary cont-livros'>
                    <p><b>Nome: </b>" . $row['nome'] . "</p>
                    <p><b>Publicação: </b>" . $row['ano_publicação'] . "</p>
                    <p><b>Gênero: </b>" . $row['genero'] . "</p>
                    <div class='cont-ico'>
                        <img src='/6_gerenciamento_de_livros/app/assets/botao-apagar.png' alt='Botão de apagar'>
                        <img src='/6_gerenciamento_de_livros/app/assets/caneta.png' alt='Caneta'>
                    </div>
                    </div>";
        }
        
        $stmt->close();
    }






?>