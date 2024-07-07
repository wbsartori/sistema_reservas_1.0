<?php 

use App\Classes\Sessao\Login;
use App\Classes\Utils\Services\Utils;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();

$Utils = new Utils();
$horario = $Utils->listarHorariosForm();
$sala = $Utils->listarSalaForm();

?>
<?php include_once('../../templates/header.php');?>

<div class="container">
    <h4 class="mt-5">Reserva de Sala</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="action/novo.php">
                <?php include('./_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success" type="submit">Salvar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php include_once('../../templates/footer.php');?>