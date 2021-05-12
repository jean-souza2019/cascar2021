<div class="row justify-content-md-center mb-4">`
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <td class="w-5">Qtd</td>
                <td class="w-50">Produto</td>
                <td class="w-15">Valor Un.</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados_ordem as $item) { ?>
                <tr>
                    <td><?= $item['QUANTIDADE'] ?></td>
                    <td><?php
                        $desItem = $crd->getItemPnl($item['PRODUTO']);
                        echo ($desItem[0]['DESCRICAO']);
                        ?></td>
                    <td><?= $item['VALOR'] ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td style="text-align: right;">Total: </td>
                <td> <?php
                        $total = 0;
                        foreach ($dados_ordem as $item) {
                            $it = $item['VALOR'] * $item['QUANTIDADE'];
                            $total = $total + $it;
                        }
                        echo $total; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>


</div>

<script>

</script>