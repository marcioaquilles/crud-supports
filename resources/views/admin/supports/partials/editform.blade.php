@csrf
<div class="mb-3">
    <label for="subject" class="form-label">Assunto</label>
    <input type="text" id="subject" name="subject" class="form-control" placeholder="Assunto"
        value="{{ $supportEdit->subject }}">
</div>
<div class="mb-3">
    <label for="body" class="form-label">Descrição</label>
    <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Descrição"
        style="resize: none">{{ $supportEdit->body }}</textarea>
</div>
<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select">
        <option value="a">Em Andamento</option>
        <option value="p">Concluído</option>
        <option value="c">Pendente</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
