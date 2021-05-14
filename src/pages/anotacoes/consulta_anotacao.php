<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anotação </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form " method="post" action="">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo_consulta" placeholder="Título" id="titulo_consulta">
                    </div>

                    <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Prioridade:</label>
                        <select class="form-control" id="prioridade_consulta" name="prioridade_consulta">
                            <option value="1">Baixa</option>
                            <option value="2">Média</option>
                            <option value="3">Alta</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descrição:</label>
                        <textarea class="form-control" name="mensagem_consulta" placeholder="Descrição" id="mensagem_consulta"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary TitVermelho" onclick="excluirAnotacao()">Excluir</button>
                        <button type="submit" class="btn btn-primary ">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var res_id;

    function excluirAnotacao() {
        window.location.href = "<?= SIS_URL_EXCANOTA ?>?id=" + res_id;
    }


    function buscarAnotacao(id) {

        var req;
        // Verificando Browser
        if (window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var id_anotacao = id;
        if (id_anotacao > 0) {
            // console.log(id_anotacao);


            var url = "src/pages/anotacoes/select_anotacao?id=" + id_anotacao;

            // Chamada do método open para processar a requisição
            req.open("Get", url, true);
            // Quando o objeto recebe o retorno, chamamos a seguinte função;
            req.onreadystatechange = function() {
                // Exibe a mensagem "Buscando Distribuidores e Revendedores..." enquanto carrega
                if (req.readyState == 1) {
                    document.getElementById("titulo_consulta").value = 'Carregando...';
                    document.getElementById("mensagem_consulta").value = 'Carregando...';
                }
                if (req.readyState == 4 && req.status == 200) {
                    var resposta = req.responseText;
                    const obj = JSON.parse(resposta);
                    res_id = obj.ID;
                    var res_titulo = obj.TITULO;
                    var res_mensagem = obj.MENSAGEM;
                    var res_prioridade = obj.PRIORIDADE;

                    document.getElementById("titulo_consulta").value = res_titulo;
                    document.getElementById("mensagem_consulta").value = res_mensagem;
                    document.getElementById("prioridade_consulta").value = res_prioridade;

                    if (resposta === "") {
                        document.getElementById("titulo_consulta").value = "";
                        document.getElementById("mensagem_consulta").value = "";
                    }
                }
            }
            req.send(null);
        } else {
            document.getElementById("titulo_consulta").value = "";
            document.getElementById("mensagem_consulta").value = "";
        }
    }

    function tst(i) {
        console.log(i);
    }
</script>