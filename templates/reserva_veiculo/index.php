<?php

use App\Classes\Sessao\Login;
use App\Classes\Utils\Services\Utils;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();

$Utils = new Utils();
$reserva = $Utils->listarReservasVeiculo($_SESSION['users']['usuario_autenticacao']['id']);

?>

<?php include_once('../../templates/header.php');?>

<?php
if(!empty($_SESSION['MSG_RETORNO'])){
    echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
    echo $_SESSION['MSG_RETORNO'];
    echo '</div>';
}
$_SESSION['MSG_RETORNO'] = '';
?>

<h4 class="mt-5">Veiculos</h4>
<hr class="bg-dark">
<?php if($_SESSION['users']['reservar_veiculo']['cadastra'] === 'S') { ?>
    <a href="novo.php" class="btn btn-primary">Reservar</a>
    <hr class="bg-dark">
<?php } ?>
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Veículo reservado</th>
                <th scope="col">Usuário</th>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($reserva as $item) { ?>                              
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['veiculo_modelo']; ?></td>
                        <td><?= $item['usuario_nome']; ?></td>
                        <td><?= $Utils->formatDate($item['data_inicio']);?></td>
                        <td><?= $item['horario_descricao']; ?></td>
                        <td>
                            <?php if($item['status'] === 'E') { ?>
                                <div class="btn btn-warning">Em análise</div>
                            <?php } else if($item['status'] == 'A') { ?>
                                <div class="btn btn-success">Aprovada</div>
                            <?php } else if($item['status'] == 'F') { ?>
                                <div class="btn btn-info">Finalizada</div>
                            <?php } else { ?>
                                <div class="btn btn-danger">Cancelada</div>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($item['status'] != 'C' && $item['status'] != 'F' && $item['status'] != 'A') { ?>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">
                                
                                <?php if($_SESSION['users']['reservar_veiculo']['usuario_aprovador'] === 'S' && $_SESSION['users']['usuario_autenticacao']['id'] == $item['reserva_id_usuario']) { ?>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confimarAprovacao<?= $item['id'];?>"><i class="bi bi-check2"></i> Aprovar</button>
                                <?php } ?>     

                                 <!-- Modal Cancelar-->
                                 <div class="modal fade" id="confimarAprovacao<?= $item['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Aprovar Reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo MSG_CONFIRMAR_APROVADACAO?><strong><?php echo $item['id']?> ?</strong></p>                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form action="action/aprovar.php" method="post">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $item['id']?>">
                                                    <button type="submit" class="btn btn-success">Confirmar</i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <?php if($_SESSION['users']['reservar_veiculo']['altera'] === 'S' && $_SESSION['users']['usuario_autenticacao']['id'] == $item['reserva_id_usuario']) { ?>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#confimarCancelar<?= $item['id'];?>"><i class="bi bi-dash-circle"></i> Cancelar</button>
                                <?php } ?>     

                                 <!-- Modal Cancelar-->
                                 <div class="modal fade" id="confimarCancelar<?= $item['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Cancelar Reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo MSG_CONFIRMAR_CANCELAR?><strong><?php echo $item['id']?> ?</strong></p>                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form action="action/editar.php" method="post">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $item['id']?>">
                                                    <button type="submit" class="btn btn-danger">Confirmar</i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if($_SESSION['users']['reservar_veiculo']['deleta'] === 'S' && $_SESSION['users']['usuario_autenticacao']['id'] == $item['reserva_id_usuario']) { ?>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confimarDelete<?= $item['id'];?>"><i class="bi bi-trash-fill"></i></button>
                                <?php } ?>                                

                                <!-- Modal Excluir-->
                                <div class="modal fade" id="confimarDelete<?= $item['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Excluir Reserva</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo MSG_CONFIRMAR_DELETE ?></p>
                                                <label for="id">Id:</label>
                                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $item['id'];?>" disabled>
                                                <hr>
                                                <label for="veiculo_modelo">Reserva:</label>
                                                <input type="text" class="form-control" id="veiculo_modelo" name="veiculo_modelo" value="<?php echo $item['veiculo_modelo'];?>" disabled>
                                                <hr>
                                                <label for="usuario_nome">Usuário:</label>
                                                <input type="text" class="form-control" id="usuario_nome" name="usuario_nome" value="<?php echo $item['usuario_nome'];?>" disabled>
                                                <hr>
                                                <label for="id_cidade">Horário:</label>
                                                <input type="text" class="form-control" id="hora_inicio" name="hora_inicio" value="<?php echo $Utils->formatTime($item['hora_inicio']) . ' às ' . $Utils->formatTime($item['hora_final']);?>" disabled>
                                                <hr>
                                                <label for="id_cidade">Data:</label>
                                                <input type="text" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo $Utils->formatDate($item['data_inicio']) . ' até ' . $Utils->formatDate($item['data_final']);?>" disabled>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="action/excluir.php" method="post">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $item['id']?>">
                                                    <button type="submit" class="btn btn-danger">Confirmar</i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <td></td>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>                              
            </tbody>
        </table>
    </div>
</div>

<?php include_once('../../templates/footer.php');?>
