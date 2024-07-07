<?php

use App\Classes\Utils\Services\Utils;
use App\Services\UserPermissionService;

require_once '../../vendor/autoload.php';

$Utils = new Utils();
$UsuarioPermissaoService = new UserPermissionService();
$perfil_usuario_editar = $UsuarioPermissaoService->editarUsuarioPermissao($_GET['id_usuario_perfil']);

?>

<?php include_once('../../templates/header.php');?>

    <div class="container-fluid">
        <h4 class="mt-5">Permissões</h4>
        <hr class="bg-dark">
        <div class="row mt-2">
            <div class="col-md-12">
                <form method="post" action="action/editar.php">
                    <?php if($_SESSION['users']['users_permission']['altera'] === 'S') { ?>
                        <button class="btn btn-success" type="submit">Salvar</button>
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                        <hr>
                    <?php } else { ?>                                        
                        <a href="index.php" class="btn btn-danger">Cancelar</a>
                    <?php } ?>                                        

                    <hr>
                    <input type="hidden" class="form-control" maxlength="7" id="id_usuario_perfil" name="id_usuario_perfil" value="<?= $_GET['id_usuario_perfil'] ?>">
                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Tabela</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($perfil_usuario_editar as $item) { ?>
                                <tr>
                                    <td><?= $item['usuario_permissao_id']?></td>
                                    <td><?= $item['usuario_perfil_descricao']?></td>
                                    <td><?= $item['usuario_permissao_tabela']?></td>
                                    <td>
                                        <?php if($item['usuario_permissao_tabela'] == 'reservar_multiplo' || $item['usuario_permissao_tabela'] == 'reservar_equipamento' || $item['usuario_permissao_tabela'] == 'reservar_sala' || $item['usuario_permissao_tabela'] == 'reservar_veiculo') { ?>
                                            <?php if($item['usuario_permissao_usuario_aprovador'] == 'S') { ?>
                                                <div class="form-check form-check-inline form-switch">
                                                    <input class="form-check-input" type="checkbox" id="usuario_aprovador[]" name="usuario_aprovador[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                    <label class="form-check-label" for="inlineCheckbox1">Usuário Aprovador</label>
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-check form-check-inline form-switch">
                                                    <input class="form-check-input" type="checkbox" id="usuario_aprovador[]" name="usuario_aprovador[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                    <label class="form-check-label" for="inlineCheckbox1">Usuário Aprovador</label>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($item['usuario_permissao_cadastra'] == 'S') { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_cadastra[]" name="usuario_permissao_cadastra[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Cadastra</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_cadastra[]" name="usuario_permissao_cadastra[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Cadastra</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($item['usuario_permissao_altera'] == 'S') { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_altera[]" name="usuario_permissao_altera[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Altera</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_altera[]" name="usuario_permissao_altera[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Altera</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($item['usuario_permissao_lista'] == 'S') { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_lista[]" name="usuario_permissao_lista[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Lista</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_lista[]" name="usuario_permissao_lista[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Lista</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($item['usuario_permissao_deleta'] == 'S') { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_deleta[]" name="usuario_permissao_deleta[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Deleta</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_deleta[]" name="usuario_permissao_deleta[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Deleta</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($item['usuario_permissao_acessa_menu'] == 'S') { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_acessa_menu[]" name="usuario_permissao_acessa_menu[]" checked="checked" value="S.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Acessa Menu</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check form-check-inline form-switch">
                                                <input class="form-check-input" type="checkbox" id="usuario_permissao_acessa_menu[]" name="usuario_permissao_acessa_menu[]" value="N.<?= $item['usuario_permissao_tabela']?>">
                                                <label class="form-check-label" for="inlineCheckbox1">Acessa Menu</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <hr class="bg-dark mb-2 mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../../templates/footer.php');?>