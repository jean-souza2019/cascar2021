<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova Anotação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form fm2" method="post" action="">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Título" id="titulo">
                    </div>

                    <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Prioridade:</label>
                        <select class="form-control" id="prioridade" name="prioridade">
                            <option value="1">Baixa</option>
                            <option value="2">Média</option>
                            <option value="3">Alta</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descrição:</label>
                        <textarea class="form-control" name="descricao" placeholder="Descrição" id="descricao"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('.fm2').submit(function() {
            $.ajax({
                url: 'src/pages/anotacoes/gravar_nova_anotacao.php',
                type: 'POST',
                data: $('.fm2').serialize(),
                success: function(data) {
                    window.location.href = "<?= SIS_URL ?>";
                }
            });
            return false;
        });
    });
</script>