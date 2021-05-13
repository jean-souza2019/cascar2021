<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anotação </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Título" id="titulo">
                    </div>

                    <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Prioridade:</label>
                        <select class="form-control" id="nomeItem" name="nomeItem" onchange="buscarValorProduto()">
                            <option value="1">Baixa</option>
                            <option value="2">Média</option>
                            <option value="3">Alta</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descrição:</label>
                        <textarea class="form-control" name="mensagem" placeholder="Descrição" id="mensagem"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="teste()">Excluir</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function teste() {
        console.log("1");
    }
</script>