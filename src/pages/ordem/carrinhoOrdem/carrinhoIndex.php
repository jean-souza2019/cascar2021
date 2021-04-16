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
                    <td><?= $item['nomeItem'] ?></td>
                    <td><?= $item['valorItem'] ?></td>
                    <?php if (!isset($_GET['add'])) { ?>
                        <td>
                            <a class="btn btn-outline-danger btn-sm" href="removeItem?id=<?= $item['id'] ?>" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
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
                    console.log('teste');
                    window.location.href = "/Carrinho";
                }
            });
            return false;
        });
    });
</script>