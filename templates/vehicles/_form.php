<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="ano_fabricacao">Ano de Fabricação:</label>
            <input type="date" class="form-control" id="ano_fabricacao" name="ano_fabricacao"
                   value="<?= $registers->ano_fabricacao ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="ano_modelo">Ano/Modelo:</label>
            <input type="date" class="form-control" id="ano_modelo" name="ano_modelo"
                   value="<?= $registers->ano_modelo ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="chassi">Número Chassi:</label>
            <input type="text" class="form-control" maxlength="50" id="chassi" name="chassi"
                   value="<?= $registers->chassi ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="numero_motor">Número Motor:</label>
            <input type="text" class="form-control" maxlength="50" id="numero_motor" name="numero_motor"
                   value="<?= $registers->numero_motor ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="placa">Placa:</label>
            <input type="text" class="form-control" maxlength="50" id="placa" name="placa"
                   value="<?= $registers->placa ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="renavam">Renavam:</label>
            <input type="text" class="form-control" maxlength="50" id="renavam" name="renavam"
                   value="<?= $registers->renavam ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="km_atual">Km Atual:</label>
            <input type="text" class="form-control" maxlength="50" id="quilometragem_atual" name="quilometragem_atual"
                   value="<?= $registers->quilometragem_atual ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="veiculo_cor">Cor:</label>
            <select class="form-select" id="veiculo_cor" name="veiculo_cor" aria-label="Default select example">
                <?php if($registers->veiculo_cor !== '') { ?>
                    <option value="<?= $registers->veiculo_cor ?>"><?= ucfirst($registers->veiculo_cor) ?></option>
                <?php }?>

                <option value="">---</option>
                <option value="white">Branco</option>
                <option value="black">Preto</option>
                <option value="silver">Prata</option>
                <option value="grey">Cinza</option>
                <option value="blue">Azul</option>
                <option value="red">Vermelho</option>
                <option value="dark-blue">Azul escuro</option>
                <option value="beige">Bege</option>
                <option value="green">Verde</option>
                <option value="brown">Marrom</option>
                <option value="outro">Outro</option>
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="veiculo_marca">Marca:</label>
                <input type="text" class="form-control" maxlength="50" id="veiculo_marca" name="veiculo_marca"
                       value="<?= $registers->veiculo_marca ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="veiculo_modelo">Modelo:</label>
                <input type="text" class="form-control" maxlength="50" id="veiculo_modelo" name="veiculo_modelo"
                       value="<?= $registers->veiculo_modelo ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="veiculo_tipo">Tipo de Veiculo:</label>
                <select class="form-select" id="veiculo_tipo" name="veiculo_tipo"
                        aria-label="Default select example">
                    <?php if($registers->veiculo_tipo !== '') { ?>
                        <option value="<?= $registers->veiculo_tipo ?>"><?= ucfirst($registers->veiculo_tipo) ?></option>
                    <?php }?>
                    <option value="">---</option>
                    <option value="automovel">Automóvel</option>
                    <option value="caminhao">Caminhão</option>
                    <option value="onibus">Ônibus</option>
                    <option value="motocicleta">Motocicleta</option>
                    <option value="caminhonete">Caminhonete (pickup)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="veiculo_combustivel">Tipo de combustivel:</label>
                <select class="form-select" id="veiculo_combustivel" name="veiculo_combustivel"
                        aria-label="Default select example">
                    <?php if($registers->veiculo_combustivel !== '') { ?>
                        <option value="<?= $registers->veiculo_combustivel ?>"><?= ucfirst($registers->veiculo_combustivel) ?></option>
                    <?php }?>
                    <option value="">---</option>
                    <option value="alcool">Alcool</option>
                    <option value="gasolina">Gasolina</option>
                    <option value="diesel">Diesel</option>
                </select>
            </div>
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
                <label class="form-check-label" for="status" id="label_status_ativo">Inativar</label>
            <?php } else { ?>
                <input class="form-check-input" type="checkbox" id="status" name="status"
                       onclick="ativarDesativarUsuario()">
                <label class="form-check-label" for="status" id="label_status_ativo">Ativar</label>
            <?php } ?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group">
        <label for="observacoes">Observações: </label>
        <div class="form-floating">
            <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"
                      style="height: 100px"><?= $registers->observacoes ?? ''; ?></textarea>
            <label for="observacoes">Escreva algo que queria destacar sobre o veiculo:</label>
        </div>
    </div>
</div>