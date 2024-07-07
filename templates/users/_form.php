<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" maxlength="100" id="nome" name="nome"
                   value="<?= $usuario['nome'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" maxlength="100" id="telefone" name="telefone"
                   value="<?= $usuario['telefone'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="<?= $usuario['email'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email_corporativo">E-mail Corporativo:</label>
            <input type="email" class="form-control" maxlength="100" id="email_corporativo" name="email_corporativo"
                   value="<?= $usuario['email_corporativo'] ?? ''; ?>">
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
                   value="<?= $usuario['users'] ?? ''; ?>">
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
                           value="<?= $usuario['senha'] ?? ''; ?>">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-fill" id="bi-eye-fill"
                                                                        onclick="mostrarSenha()"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row mt-2">
        <div class="col-md-3">
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha:</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" maxlength="50" id="confirmar_senha"
                           name="confirmar_senha" value="<?= $usuario['senha'] ?? ''; ?>">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-fill"
                                                                        id="bi-eye-fill-confirmar-senha"
                                                                        onclick="mostrarSenha()"></i></span>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="id_perfil">Perfil:</label>
            <select class="form-select" id="id_perfil" name="id_perfil" aria-label="Default select example">
                <option value=""> ---</option>
                <option value="admin">Administrador</option>
                <option value="user">Usuário</option>
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
            <?php if (isset($usuario['status']) && $usuario['status'] == 'A') { ?>
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