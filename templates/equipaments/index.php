<?php \App\Core\View::make()->load('layout/header');?>

<?php
if(!empty($_SESSION['MSG_RETORNO'])){
    echo '<div class="alert alert-success mt-3" id="success-alert" role="alert">';
    echo $_SESSION['MSG_RETORNO'];
    echo '</div>';
}
$_SESSION['MSG_RETORNO'] = '';
?>

<h4 class="mt-5">Equipamentos</h4>
<hr class="bg-dark">
    <a href="/equipaments/add" class="btn btn-primary">Novo</a>
    <hr class="bg-dark">
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Data Aquisição</th>
                <th scope="col">Descrição</th>
                <th scope="col">Marca</th>
                <th scope="col">Tipo</th>
                <th scope="col">Modelo</th>
                <th scope="col">N&ordm Série</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($equipamentos as $item) { ?>
                <tr>
                    <td><?php echo $item['id']?></td>
                    <td><?php echo $item['descricao']?></td>
                    <td><?php echo $item['equipamento_marca_descricao']?></td>
                    <td><?php echo $item['equipamento_tipo_descricao']?></td>
                    <td><?php echo $item['modelo']?></td>
                    <td><?php echo $item['numero_serie']?></td>
                    <td>
                        <?php if($item['status'] == 'A') { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_ativo" id="status_ativo">
                                    <label class="btn btn-success" for="status_ativo">Ativo</label>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status_inativo" id="status_inativo">
                                    <label class="btn btn-danger" for="status_inativo">Inativo</label>
                                </div>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                            <a href="edit.php?id='<?= $item['id'];?>'" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confimarDelete<?= $item['id'];?>">
                                <i class="bi bi-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="confimarDelete<?= $item['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="staticBackdropLabel">Excluir</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo 'MSG_CONFIRMAR_DELETE' ?></p>
                                            <label for="di">Id:</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $item['id'];?>" disabled>
                                            <hr>
                                            <label for="veiculo_tipo_descricao">Descricao:</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $item['descricao'];?>" disabled>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="action/excluir.php" method="post">
                                                <input type="hidden" name="id" id="id" value="<?php echo $item['id']?>">
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
