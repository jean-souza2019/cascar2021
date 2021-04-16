<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Quantidade:</label>
                        <input type="number" class="form-control" name="qtdItem" placeholder="Qtd" id="qtdItem">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Produto:</label>
                        <input type="text" class="form-control" name="nomeItem" placeholder="nomeItem" id="nomeItem">

                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Valor:</label>
                        <input type="number" class="form-control" name="valorItem" placeholder="R$" id="valorItem">
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