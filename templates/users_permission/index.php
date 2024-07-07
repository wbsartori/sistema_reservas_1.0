<?php

use App\Classes\Utils\Services\Utils;
use App\Classes\Sessao\Login;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();

$Utils = new Utils();
$usuarios_permissao = $Utils->listarUsuarioGrupoPermissoesForm($_SESSION['users']['usuario_autenticacao']['id_perfil']);

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

    <div class="container-fluid">
        <h4 class="mt-5">Permissões</h4>
        <hr class="bg-dark">
        <div class="row mt-5">
            <div class="col-md-12">
                <form method="post" action="action/novo.php">
                    <div class="row">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Grupo</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($usuarios_permissao as $item) { ?>
                                <tr>
                                    <td><?= $item['id_usuario_perfil']?></td>
                                    <td><?= $item['descricao']?></td>
                                    <td>
                                        <div class="btn-group float-end" role="group" aria-label="Basic example">
                                            <a href="editar.php?id_usuario_perfil='<?= $item['id_usuario_perfil'];?>'" class="btn btn-warning" ><i class="bi bi-pencil-square"></i></a>
                                        </div>
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