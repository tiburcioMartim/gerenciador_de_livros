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

    fetch('/api.php', {
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
    event.stopPropagation();

    if (!confirm('Deseja deletar este livro?')) {
      return;
    }
    const formData = new FormData();
    formData.append('acao', 'deletar');
    formData.append('id', id);

    fetch('/api.php', {
        method: 'POST',
        body: formData
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
        console.error('Ooooie!!! Erro:', error);
        console.log('Erro ao processar a solicitação.');
      });
  }
</script>