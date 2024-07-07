<?php \App\Core\View::make()->load('layout/header');?>
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Item</th>
                <th scope="col">Usuário</th>                
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($registers as $item) { ?>
                    <tr>
                        <td><?= $item['id']; ?></td>

                        <?php if($item['sala_descricao']) { ?>
                            <td><?= $item['sala_descricao']; ?></td>      
                        <?php } else if($item['equipamento_descricao']) { ?>
                            <td><?= $item['equipamento_descricao']; ?></td>                                                    
                        <?php } else if($item['veiculo_descricao']) { ?>
                            <td><?= $item['veiculo_descricao']; ?></td>                                                    
                        <?php } else { ?>
                            <td><?= $item['multiplo_descricao']; ?></td>                            
                        <?php } ?>                        
                        <td><?= $item['usuario_nome']; ?></td>
                        <td><?= $Utils->formatDate($item['data_inicio']);?></td>
                        <td><?= $item['horario_descricao']; ?></td>
                        <td>
                            <?php if($item['status'] === 'E') { ?>
                                <div class="btn btn-warning">Em análise</div>
                            <?php } else if($item['status'] == 'I') { ?>                            
                                <div class="btn btn-success">Iniciada</div>
                            <?php } else { ?>                            
                                <div class="btn btn-danger">Cancelada</div>
                            <?php } ?>                            
                        </td>
                        <td>
                            <div class="btn-group float-end" role="group" aria-label="Basic example">                                                                    

                                <?php if($_SESSION['users']['reservar_sala']['deleta'] === 'S' && $_SESSION['users']['usuario_autenticacao']['id'] == $item['reserva_id_usuario']) { ?>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confimarDelete<?= $item['id'];?>">
                                    Cancelar
                                </button>
                                <?php } ?>

                                <!-- Modal -->
                                <div class="modal fade" id="confimarDelete<?= $item['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="staticBackdropLabel">Excluir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo MSG_CONFIRMAR_DELETE ?></p>
                                                <label for="id_cidade">Id:</label>
                                                <input type="text" class="form-control" id="id" name="id" value="<?= $item['id']?>" disabled>
                                                <hr>
                                                <?php if($item['sala_descricao']) { ?>
                                                    <?= $descricao = $item['sala_descricao']; ?>
                                                <?php } else if($item['equipamento_descricao']) { ?>
                                                    <?= $descricao = $item['equipamento_descricao']; ?>
                                                <?php } else if($item['veiculo_descricao']) { ?>
                                                    <?=$descricao = $item['veiculo_descricao']; ?>
                                                <?php } else { ?>
                                                    <?= $descricao = $item['multiplo_descricao']; ?>
                                                <?php } ?>
                                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $descricao?>" disabled>
                                                <hr>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="action/excluir.php" method="post">
                                                    <input type="hidden" name="estado_id" id="estado_id" value="<?php echo $item['id']?>">
                                                    <button type="submit" class="btn btn-warning">Confirmar<i class="bi bi-pencil-square"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                <?php } ?>                              
            </tbody>
        </table>
    </div>
</div>

<?php \App\Core\View::make()->load('layout/footer');?>
