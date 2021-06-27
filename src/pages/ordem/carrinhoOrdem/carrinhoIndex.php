<div class="row justify-content-md-center mb-4">`
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <td class="w-5">Qtd</td>
                <td class="w-50">Produto</td>
                <td class="w-15">Valor Un.</td>
                <?php if (!isset($_GET['add'])) { ?>
                    <td class="w-5">Opções</td>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['carrinho'] as $item) { ?>
                <tr>
                    <td><?= $item['qtdItem'] ?></td>
                    <td><?php
                        $desItem = $crd->getItemPnl($item['nomeItem']);
                        echo ($desItem[0]['DESCRICAO']);
                        ?></td>
                    <td><?= $item['valorItem'] ?></td>
                    <?php if (!isset($_GET['add'])) { ?>
                        <td>
                            <a class="btn btn-outline-danger btn-sm" href="carrinhoOrdem/removeItem?id=<?= $item['id'] ?>" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td style="text-align: right;">Total: </td>
                <td> <?php
                        if (isset($_SESSION['carrinho'])) {
                            $total = 0;
                            foreach ($_SESSION['carrinho'] as $item) {
                                $it = $item['valorItem'] * $item['qtdItem'];
                                $total = $total + $it;
                            }
                            echo $total;
                        } ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>



    <div class="components">
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Adicionar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpar()">limpar</button>
    </div>

    <?PHP
    require_once("adicionarItemCarrinho.php");
    ?>

</div>

<script>
    $(function() {
        $('.form').submit(function() {
            $.ajax({
                url: 'carrinhoOrdem/session.php',
                type: 'POST',
                data: $('.form').serialize(),
                success: function(data) {
                    window.location.href = "<?= SIS_URL_CADOS ?>";
                }
            });
            return false;
        });
    });

    function limpar() {
        window.location.href = "./carrinhoOrdem/limparItens";
    }

    // $(document).ready(function() {
    //     $('#nomeItem').select2({
    //         width: '100%'
    //     });
    // });



    function buscarValorProduto() {

        var req;
        // Verificando Browser
        if (window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }
        // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var produto = document.getElementById('nomeItem').value;
        // resultado = produto.replace(/[^\d]+/g, '');
        // var produto = resultado;
        if (produto > 0) {
            // console.log(produto);

            var url = "carrinhoOrdem/model_vlr_produto?cod=" + produto;

            // Chamada do método open para processar a requisição
            req.open("Get", url, true);
            // Quando o objeto recebe o retorno, chamamos a seguinte função;
            req.onreadystatechange = function() {
                // Exibe a mensagem "Buscando Distribuidores e Revendedores..." enquanto carrega
                if (req.readyState == 1) {
                    document.getElementById("valorItem").value = 'Buscando valor...';
                }
                if (req.readyState == 4 && req.status == 200) {
                    var resposta = req.responseText;
                    // console.log(resposta);
                    document.getElementById("valorItem").value = resposta;
                    if (resposta === "") {
                        // alert("Fornecedor inativo ou inexistente.");
                        document.getElementById("valorItem").value = "0";
                    }
                }
            }
            req.send(null);
        } else {
            document.getElementById("valorItem").value = "";
        }
    }
</script>