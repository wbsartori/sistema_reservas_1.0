<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome_completo">Nome completo:</label>
            <input type="text" class="form-control" maxlength="100" id="nome_completo" name="nome_completo" required
                   value="<?= $registers->nome_completo ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="contato">Telefone:</label>
            <input type="text" class="form-control" maxlength="30" id="contato" name="contato"
                   value="<?= $registers->contato ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" maxlength="100" id="email" name="email"
                   value="<?= $registers->email ?? ''; ?>">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3">
        <hr>
        <h6 class="mt-1">Permissões</h6>
        <hr>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" maxlength="50" id="usuario" name="usuario" required
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
                    <input type="password" class="form-control" maxlength="30" id="senha" name="senha" required
                           value="<?= $registers->senha ?? ''; ?>">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-fill" id="bi-eye-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="perfil">Tipo de perfil:</label>
            <select class="form-select" id="perfil" name="perfil" aria-label="Default select example" required>
                <?php if($registers->perfil !== null) { ?>
                    <option value="<?= $registers->perfil ?>"><?= ucfirst($registers->perfil) ?></option>
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
<div class="row mt-3">
    <div class="col-md-3">
        <hr>
        <div class="form-group">
            <label class="mb-2" for="perfil"><strong>Tipo de permissão:</strong></label>
            <p>Cadastros</p>
            <?php if(isset($registers->criar_equipamento) && $registers->criar_equipamento === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="criar_equipamento" name="criar_equipamento" checked>
                    <label class="form-check-label" for="criar_equipamento">
                        Equipamentos
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="criar_equipamento" name="criar_equipamento">
                    <label class="form-check-label" for="criar_equipamento">
                        Equipamentos
                    </label>
                </div>
            <?php }?>
            <?php if(isset($registers->criar_sala) && $registers->criar_sala === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="criar_sala" name="criar_sala" checked>
                    <label class="form-check-label" for="criar_sala">
                        Salas
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="criar_sala" name="criar_sala">
                    <label class="form-check-label" for="criar_sala">
                        Salas
                    </label>
                </div>
            <?php }?>
            <?php if(isset($registers->criar_usuario) && $registers->criar_usuario === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="criar_usuario" name="criar_usuario" checked>
                    <label class="form-check-label" for="criar_usuario">
                        Usuários
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="criar_usuario" name="criar_usuario">
                    <label class="form-check-label" for="criar_usuario">
                        Usuários
                    </label>
                </div>
            <?php }?>
            <?php if(isset($registers->criar_veiculo) && $registers->criar_veiculo === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="criar_veiculo" name="criar_veiculo" checked>
                    <label class="form-check-label" for="criar_veiculo">
                        Salas
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="criar_veiculo" name="criar_veiculo">
                    <label class="form-check-label" for="criar_veiculo">
                        Veículos
                    </label>
                </div>
            <?php }?>
            <hr>
            <p>Reservas</p>
            <?php if(isset($registers->reservar_equipamento) && $registers->reservar_equipamento === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="reservar_equipamento" name="reservar_equipamento" checked>
                    <label class="form-check-label" for="reservar_equipamento">
                        Reservar Equipamentos
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="reservar_equipamento" name="reservar_equipamento">
                    <label class="form-check-label" for="reservar_equipamento">
                        Reservar Equipamentos
                    </label>
                </div>
            <?php }?>
            <?php if(isset($registers->reservar_sala) && $registers->reservar_sala === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="reservar_sala" name="reservar_sala" checked>
                    <label class="form-check-label" for="reservar_sala">
                        Reservar Salas
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="reservar_sala" name="reservar_sala">
                    <label class="form-check-label" for="reservar_sala">
                        Reservar Sala
                    </label>
                </div>
            <?php }?>
            <?php if(isset($registers->reservar_veiculo) && $registers->reservar_veiculo === 'S') { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="S" id="reservar_veiculo" name="reservar_veiculo" checked>
                    <label class="form-check-label" for="reservar_veiculo">
                        Reservar Salas
                    </label>
                </div>
            <?php } else { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="N" id="reservar_veiculo" name="reservar_veiculo">
                    <label class="form-check-label" for="reservar_veiculo">
                        Reservar Veículos
                    </label>
                </div>
            <?php }?>
            <hr>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label class="mt-3" for="status">Status:</label>
        <label for="status"></label>
        <div class="form-check form-switch">
            <?php if (isset($registers->status) && $registers->status === \App\Enums\StatusEnum::ATIVO->value) { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status"
                      checked>
                <label class="form-check-label" for="status" id="label_status_ativo">Desativar Usuário</label>
            <?php } else { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status"
                       >
                <label class="form-check-label" for="status" id="label_status_ativo">Ativar Usuário</label>
            <?php } ?>
        </div>
    </div>
</div>