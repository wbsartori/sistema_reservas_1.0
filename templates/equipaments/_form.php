<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="data_aquisicao">ID:</label>
            <input type="text" class="form-control" id="_id" name="_id"
                   value="<?= $registers->id ?? ''; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="data_aquisicao">Data Aquisição:</label>
            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao"
                   value="<?= $registers->data_aquisicao ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="nota_compra">N&ordm; Nota Fiscal:</label>
            <input type="text" class="form-control" id="nota_compra" name="nota_compra" maxlength="100"
                   value="<?= $registers->nota_compra ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="numero_patrimonio">N&ordm do Patrimônio:</label>
            <input type="text" class="form-control" id="numero_patrimonio" name="numero_patrimonio" maxlength="100"
                   value="<?= $registers->numero_patrimonio ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" maxlength="100"
                   value="<?= $registers->descricao ?? ''; ?>">
        </div>
    </div>
    <div class="col-md-12">
        <hr class="mt-3 mb-3">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="equipamento_tipo">Tipo de equipamento</label>
                    <input type="text" class="form-control" id="equipamento_tipo" name="equipamento_tipo"
                           maxlength="100"
                           value="<?= $registers->equipamento_tipo ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="equipamento_marca">Marca de Equipamento</label>
                    <input type="text" class="form-control" id="equipamento_marca" name="equipamento_marca"
                           maxlength="100"
                           value="<?= $registers->equipamento_marca ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo do Equipamento: </label>
                    <input type="text" class="form-control" id="modelo" name="modelo"
                           value="<?= $registers->modelo ?? ''; ?>">
                </div>
                <div class="form-group">
                    <label for="numero_serie">Número de serie: </label>
                    <input type="text" class="form-control" id="numero_serie" name="numero_serie"
                           value="<?= $registers->numero_serie ?? ''; ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="prazo_garantia_fabricante">Prazo de Garantia do Fabricante:</label>
            <input type="number" class="form-control" id="prazo_garantia_fabricante" name="prazo_garantia_fabricante"
                   maxlength="100" placeholder="Quantidade de Meses"
                   value="<?= $registers->prazo_garantia_fabricante ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="prazo_garantia_loja">Prazo de Garantia da Loja:</label>
            <input type="number" class="form-control" id="prazo_garantia_loja" name="prazo_garantia_loja"
                   maxlength="100" placeholder="Quantidade de Meses"
                   value="<?= $registers->prazo_garantia_loja ?? ''; ?>">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <label class="mt-3" for="id_perfil">Status:</label>
        <label for="status"></label>
        <div class="form-check form-switch">
            <?php if (isset($registers->status) && $registers->status == 'A') { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status"
                       onclick="ativarDesativarUsuario()" checked>
                <label class="form-check-label" for="status" id="label_status_ativo">Desativar Usuário</label>
            <?php } else { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status"
                       onclick="ativarDesativarUsuario()">
                <label class="form-check-label" for="status" id="label_status_ativo">Ativar Usuário</label>
            <?php } ?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="observacoes">Observações: </label>
            <div class="form-floating">
                <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"
                          style="height: 100px"><?= $registers->observacoes ?? ''; ?></textarea>
                <label for="observacoes">Escreva algo que queria destacar sobre a reserva:</label>
            </div>
        </div>
    </div>
</div>