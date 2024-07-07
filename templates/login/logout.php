<?php


use App\Classes\Sessao\Login;

require_once '../../vendor/autoload.php';

$Login = new Login();
$Login->logout();

?>