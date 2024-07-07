<?php

use App\Classes\Sessao\Login;
use App\Classes\Utils\Services\Utils;
use App\Services\UserService;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();

$UsuarioService = new UserService();
$Utils = new Utils();
$empresa = $Utils->listarEmpresaForm();
$filial = $Utils->listarFilialForm();
$departamento = $Utils->listarDepartamentoForm();
$cidade = $Utils->listarCidadesForm();
$estado = $Utils->listarEstadosForm();
$perfil = $Utils->listarUsuarioPerfilForm();
$usuario = $UsuarioService->editarUsuario($_GET['id']);
$usuario_aprovador = $Utils->getByUsuarioAprovador();
$usuario_aprovador_text = $Utils->getByUsuarioAprovadorText($usuario_aprovador[0]['id']);

?>

<?php include_once('../../templates/header.php');?>

<div class="container">
    <h4 class="mt-5">Cadastro/Usuario</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="action/editar.php">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id" value="<?= $usuario['id'] ?? ''; ?>">
                <?php include('./_form.php'); ?>
                <hr class="bg-dark">
                <?php if($_SESSION['users']['users']['altera'] === 'S') { ?>
                    <button class="btn btn-success" type="submit">Salvar</button>
                <?php } ?>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <hr>
            </form>
        </div>
    </div>
</div>

<?php include_once('../../templates/footer.php');?>