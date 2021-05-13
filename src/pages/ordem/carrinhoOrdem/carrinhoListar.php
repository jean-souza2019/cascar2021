<div class="row justify-content-md-center mb-4">`
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <td class="w-5">Quantidade</td>
                <td class="w-50">Produto</td>
                <td class="w-15">Valor Unitário</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados_ordem as $item) { ?>
                <tr>
                    <td class="maskNumero"><?= $item['QUANTIDADE'] ?></td>
                    <td><?php
                        $desItem = $crd->getItemPnl($item['PRODUTO']);
                        echo ($desItem[0]['DESCRICAO']);
                        ?></td>
                    <td>R$ <span class="maskNumero"><?= $item['VALOR'] ?></span></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td style="text-align: right;">Total:</td>
                <td>R$ <span class="maskNumero"><?php
                                                $total = 0;
                                                foreach ($dados_ordem as $item) {
                                                    $it = $item['VALOR'] * $item['QUANTIDADE'];
                                                    $total = $total + $it;
                                                }
                                                echo $total; ?></span></td>
                <td></td>
            </tr>
        </tbody>
    </table>


</div>

<script>
    $(document).ready(function() {

        $(".maskNumero").mask("000.000.000", {
            reverse: true
        });
    });
</script>