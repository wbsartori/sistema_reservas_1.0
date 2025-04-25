<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Cadastrar Veículo</h4>
        <a href="/vehicles" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar
        </a>
    </div>

    <form method="POST" action="/vehicles/save">
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
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao"
                           value="<?= $registers->descricao ?? ''; ?>">
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
                    <select class="form-select" id="veiculo_cor" name="veiculo_cor" aria-label="Selecione a cor">
                        <?php if ($registers->veiculo_cor !== null) { ?>
                            <option value="<?= $registers->veiculo_cor ?>"><?= ucfirst($registers->veiculo_cor) ?></option>
                        <?php } ?>
                        <option value="">---</option>
                        <option value="branco">Branco</option>
                        <option value="preto">Preto</option>
                        <option value="prata">Prata</option>
                        <option value="cinza">Cinza</option>
                        <option value="azul">Azul</option>
                        <option value="vermelho">Vermelho</option>
                        <option value="azul escuro">Azul escuro</option>
                        <option value="bege">Bege</option>
                        <option value="verde">Verde</option>
                        <option value="marrom">Marrom</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
            </div>

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
                    <label for="veiculo_tipo">Tipo de Veículo:</label>
                    <select class="form-select" id="veiculo_tipo" name="veiculo_tipo">
                        <?php if ($registers->veiculo_tipo !== null) { ?>
                            <option value="<?= $registers->veiculo_tipo ?>"><?= ucfirst($registers->veiculo_tipo) ?></option>
                        <?php } ?>
                        <option value="">---</option>
                        <option value="automovel">Automóvel</option>
                        <option value="caminhao">Caminhão</option>
                        <option value="onibus">Ônibus</option>
                        <option value="motocicleta">Motocicleta</option>
                        <option value="caminhonete">Caminhonete (pickup)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="veiculo_combustivel">Tipo de Combustível:</label>
                    <select class="form-select" id="veiculo_combustivel" name="veiculo_combustivel">
                        <?php if ($registers->veiculo_combustivel !== null) { ?>
                            <option value="<?= $registers->veiculo_combustivel ?>"><?= ucfirst($registers->veiculo_combustivel) ?></option>
                        <?php } ?>
                        <option value="">---</option>
                        <option value="alcool">Álcool</option>
                        <option value="gasolina">Gasolina</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="status" name="status" <?= isset($registers->status) && $registers->status === \App\Enums\StatusEnum::ATIVO->value ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="status"><?= isset($registers->status) && $registers->status === \App\Enums\StatusEnum::ATIVO->value ? 'Inativar' : 'Ativar'; ?></label>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <div class="form-floating">
                    <textarea class="form-control" id="observacoes" name="observacoes" style="height: 100px"><?= $registers->observacoes ?? ''; ?></textarea>
                    <label for="observacoes">Escreva algo que queira destacar sobre o veículo:</label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Salvar
            </button>
        </div>
    </form>
</div>
