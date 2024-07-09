<div class="row">
    <div class="col-md-6 mb-2">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" maxlength="50" id="descricao" name="descricao"
                   value="<?= $registers->descricao ?? ''; ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="capacidade">Capacidade:</label>
                    <input type="number" class="form-control" maxlength="15" id="capacidade" name="capacidade"
                           value="<?= $registers->capacidade ?? ''; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="mt-3" for="id_perfil">Status:</label>
                    <label for="status"></label>
                    <div class="form-check form-switch">
                        <?php if (isset($registers->status) && $registers->status == 'on') { ?>
                            <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                            <label class="form-check-label" for="status" id="label_status_ativo">Desativar
                                Usuário</label>
                        <?php } else { ?>
                            <input class="form-check-input" type="checkbox" id="status" name="status">
                            <label class="form-check-label" for="status" id="label_status_ativo">Ativar Usuário</label>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
