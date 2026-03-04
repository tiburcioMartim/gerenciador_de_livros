<select class="select-primario" id="genero-input-<?= $row['id'] ?>" value="<?= htmlspecialchars($row['genero']) ?>" name="genero" required>
    <option id="option-vazio" value="" disabled selected>Selecione o gênero</option>
    <option value="romance">Romance</option>
    <option value="terror">Terror</option>
    <option value="drama">Drama</option>
    <option value="ficcao">Ficção</option>
    <option value="aventura">Aventura</option>
    <option value="misterio">Mistério</option>
    <option value="biografia">Biografia</option>
    <option value="historia">História</option>
    <option value="tecnologia">Tecnologia</option>
</select>