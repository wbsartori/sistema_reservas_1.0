<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome_completo">Nome completo:</label>
            <input type="text" class="form-control" maxlength="100" id="nome_completo" name="nome_completo"
                   value="<?= $registers->nome_completo ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="contato">Telefone:</label>
            <input type="text" class="form-control" maxlength="100" id="contato" name="contato"
                   value="<?= $registers->contato ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="<?= $registers->email ?? ''; ?>">
        </div>
    </div>
</div>
<hr>
<h6 class="mt-1">Permissões</h6>
<hr>
<div class="row mt-2">
    <div class="col-md-3">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" maxlength="50" id="usuario" name="usuario"
                   value="<?= $registers->usuario ?? ''; ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="row mt-2">
        <div class="col-md-3">
            <div class="form-group">
                <label for="senha">Senha:</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" maxlength="16" id="senha" name="senha"
                           value="<?= $registers->senha ?? ''; ?>">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-fill" id="bi-eye-fill"
                                                                        onclick="mostrarSenha()"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="permissao">Tipo de permissão:</label>
            <select class="form-select" id="permissao" name="permissao" aria-label="Default select example">
                <?php if($registers->permissao !== '') { ?>
                    <option value="<?= $registers->permissao ?>"><?= ucfirst($registers->permissao) ?></option>
                    <option value=""> ---</option>
                <?php } else {?>
                    <option value=""> ---</option>
                <?php }?>
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuário</option>
            </select>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <label class="mt-3" for="id_perfil">Status:</label>
        <label for="status"></label>
        <div class="form-check form-switch">
            <?php if (isset($registers->status) && $registers->status == 'on') { ?>
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