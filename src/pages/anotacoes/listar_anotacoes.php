<div>
    <?php foreach ($anotacoes as $anotacao) { ?>


        <span class="card text-white bg-primary card-OS buscar_ordem onPass" style="max-width: 18rem;" onclick="<?php $anotacoes = $anotacao['ID'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@getbootstrap">
            <div class="card-header TitVerde"></div>
            <div class="card-body ">
                <h5 class="card-title"><?= $anotacao['TITULO'] ?></h5>
                <textarea class="form-control rounded-0 textareaIndex" id="exampleFormControlTextarea1" rows="4" readonly="true" disabled="true"><?= $anotacao['MENSAGEM'] ?></textarea>

            </div>
        </span>

    <?php } ?>

    <div class="components">
        <button type="button" class="btn btn-primary azulcascar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Nova <i class="fas fa-plus"></i></button>
    </div>

    <?php
    require_once("incluir_anotacao.php");
    require_once("consulta_anotacao.php");
    ?>
</div>
