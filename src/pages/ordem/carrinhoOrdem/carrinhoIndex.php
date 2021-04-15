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
            <tr>
                <td>Jane</td>
                <td>Doe</td>
                <td>Doe</td>
                <?php if (!isset($_GET['add'])) { ?>
                    <td>Doe</td>
                <?php } ?>
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