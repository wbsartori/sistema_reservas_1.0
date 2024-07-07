<?php 

use App\Classes\Sessao\Login;
use App\Classes\Utils\Services\Utils;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();

$Utils = new Utils();
$horario = $Utils->listarHorariosForm();
$veiculo = $Utils->listarVeiculosForm();

?>
<?php include_once('../../templates/header.php');?>

<?php
if(!empty($_SESSION['MSG_RESERVADO'])){
    echo '<div class="alert alert-danger mt-3 text-center" id="danger-alert" role="alert">';
    echo $_SESSION['MSG_RESERVADO'];
    echo '</div>';
}
$_SESSION['MSG_RESERVADO'] = '';
?>

<div class="container">
    <h4 class="mt-5">Nova Reserva de Veículo</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="action/novo.php">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="id_usuario">ID usuário:</label>
                            <input type="text" class="form-control" maxlength="50" id="id_usuario" name="id_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['id']?>" disabled>
                            <input type="hidden" class="form-control" maxlength="50" id="id_usuario" name="id_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['id']?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="nome_usuario">Usuário:</label>
                            <input type="text" class="form-control" maxlength="50" id="nome_usuario" name="nome_usuario" value="<?= $_SESSION['users']['usuario_autenticacao']['users']?>" disabled>
                        </div>
                    </div>
                </div>                
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="id_sala">Veículo:</label>
                            <select class="form-select" id="id_veiculo" name="id_veiculo" aria-label="Default select example" required>
                                <option selected> --- </option>
                                <?php foreach ($veiculo as $item){?>
                                    <option value="<?php echo $item['id']?>"><?php echo $item['veiculo_modelo_descricao']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">                        
                        <div class="form-group">
                            <label for="data_inicio">Data:</label>
                            <input type="date" class="form-control"  id="data_inicio" name="data_inicio" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="id_horario">Horario:</label>
                            <select class="form-select" id="id_horario" name="id_horario" aria-label="Default select example" required>
                                <option selected> --- </option>
                                <?php foreach ($horario as $item){?>
                                    <option value="<?php echo $item['id']?>"><?php echo $item['descricao']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="tipo_reserva">Tipo de Reserva:</label>
                            <select class="form-select" id="tipo_reserva" name="tipo_reserva" aria-label="Default select example" required>
                                <option value="" selected> --- </option>
                                <option value="V">Veiculo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <label for="observacoes">Observações: </label>
                        <div class="form-floating">
                            <textarea class="form-control" id="observacoes" name="observacoes" placeholder="Leave a comment here"  style="height: 100px"></textarea>
                            <label for="observacoes">Escreva algo que queira destacar sobre a reserva:</label>
                        </div>
                    </div>
                </div>
        <hr class="bg-dark">
        <button class="btn btn-success" type="submit">Salvar</button>
        <a href="index.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php include_once('../../templates/footer.php');?>