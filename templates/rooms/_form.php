<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" class="form-control" maxlength="50" id="descricao" name="descricao"
                   value="<?= $registers->descricao ?? ''; ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidade" class="form-label">Capacidade:</label>
            <input type="number" class="form-control" maxlength="15" id="capacidade" name="capacidade"
                   value="<?= $registers->capacidade ?? ''; ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label class="mt-3 form-label" for="id_perfil">Status:</label>
        <div class="form-check form-switch">
            <?php if (isset($registers->status) && $registers->status === \App\Enums\StatusEnum::ATIVO->value) { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                <label class="form-check-label" for="status" id="label_status_ativo">Inativar</label>
            <?php } else { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status">
                <label class="form-check-label" for="status" id="label_status_ativo">Ativar</label>
            <?php } ?>
        </div>
    </div>
</div>