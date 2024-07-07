<div class="row">
    <div class="col-md-6 mb-2">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" maxlength="50" id="descricao" name="descricao" value="<?= $sala['sala_descricao'] ?? ''; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="capacidade">Capacidade:</label>
                    <input type="number" class="form-control" maxlength="15" id="capacidade" name="capacidade" value="<?= $sala['sala_capacidade'] ?? ''; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="mt-3" for="id_perfil">Status:</label>
                    <label for="status"></label>
                    <div class="form-check form-switch">
                        <?php if(isset($sala['sala_status']) && $sala['sala_status'] == 'A') { ?>
                            <input class="form-check-input" type="checkbox" id="status" name="status" onclick="ativarDesativarUsuario()" checked>
                            <label class="form-check-label" for="status" id="label_status_ativo">Desativar Usuário</label>
                        <?php } else { ?>
                            <input class="form-check-input" type="checkbox" id="status" name="status" onclick="ativarDesativarUsuario()">
                            <label class="form-check-label" for="status" id="label_status_ativo">Ativar Usuário</label>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>