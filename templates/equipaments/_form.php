<div class="row g-4">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="_id" class="form-label">ID</label>
            <input type="text" class="form-control" id="_id" name="_id" value="<?= $registers->id ?? ''; ?>" disabled>
        </div>

        <div class="mb-3">
            <label for="data_aquisicao" class="form-label">Data de Aquisição</label>
            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao"
                   value="<?= $registers->data_aquisicao ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="nota_compra" class="form-label">Nº Nota Fiscal</label>
            <input type="text" class="form-control" id="nota_compra" name="nota_compra" maxlength="100"
                   value="<?= $registers->nota_compra ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="numero_patrimonio" class="form-label">Nº do Patrimônio</label>
            <input type="text" class="form-control" id="numero_patrimonio" name="numero_patrimonio" maxlength="100"
                   value="<?= $registers->numero_patrimonio ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="100"
                   value="<?= $registers->descricao ?? ''; ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="equipamento_tipo" class="form-label">Tipo de Equipamento</label>
            <input type="text" class="form-control" id="equipamento_tipo" name="equipamento_tipo" maxlength="100"
                   value="<?= $registers->equipamento_tipo ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="equipamento_marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="equipamento_marca" name="equipamento_marca" maxlength="100"
                   value="<?= $registers->equipamento_marca ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo"
                   value="<?= $registers->modelo ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Número de Série</label>
            <input type="text" class="form-control" id="numero_serie" name="numero_serie"
                   value="<?= $registers->numero_serie ?? ''; ?>">
        </div>
    </div>
</div>

<hr class="my-4">

<div class="row g-4">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="prazo_garantia_fabricante" class="form-label">Garantia do Fabricante (meses)</label>
            <input type="number" class="form-control" id="prazo_garantia_fabricante" name="prazo_garantia_fabricante"
                   placeholder="Ex: 12" value="<?= $registers->prazo_garantia_fabricante ?? ''; ?>">
        </div>

        <div class="mb-3">
            <label for="prazo_garantia_loja" class="form-label">Garantia da Loja (meses)</label>
            <input type="number" class="form-control" id="prazo_garantia_loja" name="prazo_garantia_loja"
                   placeholder="Ex: 6" value="<?= $registers->prazo_garantia_loja ?? ''; ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-check form-switch mt-5">
            <?php if (isset($registers->status) && $registers->status === \App\Enums\StatusEnum::ATIVO->value) { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                <label class="form-check-label" for="status">Inativar</label>
            <?php } else { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status">
                <label class="form-check-label" for="status">Ativar</label>
            <?php } ?>
        </div>
    </div>
</div>

<hr class="my-4">

<div class="mb-3">
    <label for="observacoes" class="form-label">Observações</label>
    <div class="form-floating">
        <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Deixe um comentário"
                  style="height: 120px"><?= $registers->observacoes ?? ''; ?></textarea>
        <label for="observacoes">Escreva algo que queria destacar sobre a reserva</label>
    </div>
</div>
