<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="ano_fabricacao">Ano de Fabricação:</label>
            <input type="date" class="form-control" id="ano_fabricacao" name="ano_fabricacao"
                   value="<?= $veiculo['ano_fabricacao'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="ano_modelo">Ano/Modelo:</label>
            <input type="date" class="form-control" id="ano_modelo" name="ano_modelo"
                   value="<?= $veiculo['ano_modelo'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="chassi">Número Chassi:</label>
            <input type="text" class="form-control" maxlength="50" id="chassi" name="chassi"
                   value="<?= $veiculo['chassi'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="numero_motor">Número Motor:</label>
            <input type="text" class="form-control" maxlength="50" id="numero_motor" name="numero_motor"
                   value="<?= $veiculo['numero_motor'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="placa">Placa:</label>
            <input type="text" class="form-control" maxlength="50" id="placa" name="placa"
                   value="<?= $veiculo['placa'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="renavam">Renavam:</label>
            <input type="text" class="form-control" maxlength="50" id="renavam" name="renavam"
                   value="<?= $veiculo['renavam'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="km_atual">Km Atual:</label>
            <input type="text" class="form-control" maxlength="50" id="km_atual" name="km_atual"
                   value="<?= $veiculo['km_atual'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="id_cor">Cor:</label>
            <select class="form-select" id="id_cor" name="id_cor" aria-label="Default select example">
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
                <label for="km_atual">Marca:</label>
                <input type="text" class="form-control" maxlength="50" id="km_atual" name="km_atual"
                       value="<?= $veiculo['km_atual'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="km_atual">Modelo:</label>
                <input type="text" class="form-control" maxlength="50" id="km_atual" name="km_atual"
                       value="<?= $veiculo['km_atual'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="id_tipo_veiculo">Tipo de Veiculo:</label>
                <select class="form-select" id="id_tipo_veiculo" name="id_tipo_veiculo"
                        aria-label="Default select example">
                    <option value="">---</option>
                    <option value="automovel">Automóvel</option>
                    <option value="caminhao">Caminhão</option>
                    <option value="onibus">Ônibus</option>
                    <option value="motocicleta">Motocicleta</option>
                    <option value="caminhonete">Caminhonete (pickup)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_combustivel">Tipo de combustivel:</label>
                <select class="form-select" id="id_combustivel" name="id_combustivel"
                        aria-label="Default select example">
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
            <?php if (isset($veiculo['status']) && $veiculo['status'] == 'A') { ?>
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
    <div class="form-group">
        <label for="observacoes">Observações: </label>
        <div class="form-floating">
            <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"
                      style="height: 100px"><?= $veiculo['observacoes'] ?? ''; ?></textarea>
            <label for="observacoes">Escreva algo que queria destacar sobre o veiculo:</label>
        </div>
    </div>
</div>