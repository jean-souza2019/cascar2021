<div>
    <?php foreach ($anotacoes as $anotacao) { ?>


        <span class="card text-white bg-primary card-OS buscar_ordem" style="max-width: 18rem;" onclick="moveOrdem(<?= $cliente['ID'] ?>)">
            <div class="card-header TitAmarelo"></div>
            <div class="card-body ">
                <h5 class="card-title"><?= $anotacao['TITULO'] ?></h5>
                <textarea class="form-control rounded-0 textareaIndex" id="exampleFormControlTextarea1" rows="4" readonly="true" disabled="true"><?= $anotacao['MENSAGEM'] ?></textarea>
                
            </div>
        </span>

    <?php } ?>
</div>