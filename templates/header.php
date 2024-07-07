<?php 

use App\Classes\Sessao\Login;

require __DIR__ . '../../vendor/autoload.php';

$Login = new Login();
$Login->requiredLogin();
$usuario_logado = $Login->getUsuarioSessao();
$permissao_listar = $Login->getNotPermissoesListar($usuario_logado['id_perfil']);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo TEMPLATES_BOOTSTRAP?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo TEMPLATES_BOOTSTRAP?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATES_BOOTSTRAP?>node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo TEMPLATES_BOOTSTRAP?>estilos/styles.css">
    <link rel="stylesheet" href="<?php echo TEMPLATES_BOOTSTRAP?>estilos/light.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    <title><?php echo TITULO?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo TEMPLATES_VIEWS?>home/index.php">EMPRESA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo TEMPLATES_VIEWS?>home/index.php">Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">                   
                <?php if(isset($permissao_listar['lista']) && count($permissao_listar['lista']) > 0 ) { ?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($_SESSION['users']['cidade']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>cidade/index.php">Cidades</a></li>                                            
                    <?php } ?>
                    <?php if($_SESSION['users']['estado']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>estado/index.php">Estados</a></li>                        
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['equipaments']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>equipamento/index.php">Equipamentos</a></li>
                    <?php } ?>
                    <?php if($_SESSION['users']['equipaments_type']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>equipamento_tipo/index.php">Equipamentos Tipos</a></li>
                    <?php } ?>
                    <?php if($_SESSION['users']['equipaments_brand']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>equipamento_marca/index.php">Equipamentos Marcas</a></li>
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['horario']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>horario/index.php">Horarios</a></li>
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['empresa']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>empresa/index.php">Empresas</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['filial']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>emp_filial/index.php">Filiais</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['departamento']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>emp_departamento/index.php">Departamentos</a></li>
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['rooms']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>sala/index.php">Salas</a></li>
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['veiculo']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo/index.php">Veiculos</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['veiculo_cor']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo_cor/index.php">Veiculos Cor</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['veiculo_marca']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo_marca/index.php">Veiculos Marca</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['veiculo_modelo']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo_modelo/index.php">Veiculos Modelo</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['veiculo_tipo']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo_tipo/index.php">Veiculos Tipo</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['veiculo_combustivel']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>veiculo_combustivel/index.php">Veiculos Combústivel</a></li>
                    <?php } ?>                                            
                    <?php if($_SESSION['users']['users']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>usuario/index.php">Usuarios</a></li>
                    <?php } ?>                    
                    <?php if($_SESSION['users']['usuario_perfil']['lista'] === 'S') { ?>
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>usuario_perfil/index.php">Usuários Perfil</a></li>
                    <?php } ?>                    
                    </ul>
                <?php } ?>
                </li>                
                <li class="nav-item dropdown">

                    <?php if(!empty($permissao_listar['lista']['reservar_sala'])) { ?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if($_SESSION['users']['reservar_multiplo']['lista'] === 'S') { ?>
                            <li><a class="dropdown-item" href="#"><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>reserva_multiplo/index.php">Reservar Multiplos</a></a></li>
                        <?php } ?>                          
                        <?php if($_SESSION['users']['reservar_equipamento']['lista'] === 'S') { ?>
                            <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>reserva_equipamento/index.php">Equipamentos</a></li>                        
                        <?php } ?>                          
                        <?php if($_SESSION['users']['reservar_sala']['lista'] === 'S') { ?>
                            <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>reserva_sala/index.php">Salas</a></li>
                        <?php } ?>                          
                        <?php if($_SESSION['users']['reservar_veiculo']['lista'] === 'S') { ?>
                            <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>reserva_veiculo/index.php">Veículos</a></li>
                        <?php } ?>                                                                                                  
                    </ul>
                    <?php } ?>
                </li>
                <?php if(isset($permissao_listar['lista']) && count($permissao_listar['lista']) > 0 ) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configurações
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo TEMPLATES_VIEWS?>usuario_permissao/index.php">Permissões de Usuários</a></li>
                    </ul>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a class="nav-link" id="linkSobre" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Sobre
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Sistema de reservas básico</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p> Sistema de Reserva de salas, veículos e equipamentos foi desenvolvido para que pequenas empresas possam fazer o
                                        gerenciamento destes ativos.
                                        O mesmo é disponibilizado de forma opensource e não tem licença de comercialização deste produto. Você pode contribuir
                                        com a melhora continua e com novos recursos, pois nosso repositório é público e de código aberto.

                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav float-end">
                <?php if(!$usuario_logado) { ?>                
                    <li class="nav-item">
                        <a href="<?php echo TEMPLATES_VIEWS?>registration/contas/login.php" class="nav-link"><h5><?= $usuario_logado['users']?> | Entrar <i class="bi bi-file-lock"></i></h5></a>
                    </li>
                    <?php  } else { ?>
                    <li class="nav-item">
                        <a href="" class="nav-link"><h5><?= $usuario_logado['users']?></h5></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo TEMPLATES_VIEWS?>sessao/logout.php" class="nav-link"><h5> | Sair</h5></a>
                    </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
