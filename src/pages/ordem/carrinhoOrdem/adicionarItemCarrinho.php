<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form class="form" method="post" action="">

                    <div class="col-md-12">

                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Quantidade:</label>
                                    <input type="number" class="form-control" name="qtdItem" placeholder="Qtd" id="qtdItem">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Produto:</label>
                                    <input type="text" class="form-control" name="produto" placeholder="Produto" id="valorItem">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Valor:</label>
                                    <input type="number" class="form-control" name="valorItem" placeholder="R$" id="valorItem">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer justify-content-md-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>