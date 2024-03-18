<?php
// Carregando a biblioteca de sessão manualmente para ter acesso ao boolean logged
$session = \Config\Services::session();
$logado = $session->get('logged');
$email = $session->get('email');
$nome = $session->get('nome');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-5.3.3/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/template.css') ?>">

    <script src="<?= base_url('assets/bootstrap-5.3.3/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/fontawesome/js/all.js') ?>"></script>
    <script src="<?= base_url('assets/jquery/jquery-3.7.1.js') ?>"></script>
    <script src="<?= base_url('js/template.js') ?>"></script>
</head>

<body>
    <header>
        <nav id="nav_top" class="navbar bg-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url('/') ?>">E-commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <div id="div_conta" class="d-flex gap-2" role="login">
                        <?php if ($logado) {
                            echo '<div class="btn-group">
                            <img id="perfil_image" src="images/emily.jpg" alt="imagem perfil" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <ul id="ul_login" class="dropdown-menu dropdown-menu-end">
                                <li><h4>Perfil</h4></li>
                                <li>
                                    <p>' . $nome . '</p>
                                <li id="li_senha">
                                    <p>' . $email . '</p>
                                <li><button class="btn btn-outline-dark float-end" onclick="logout()"><i class="fa-solid fa-right-from-bracket"></i> Sair</button></li>
                            </ul>
                            </div>';
                        } else {
                            echo '
                                <a class="btn btn-outline-light" href="registrar_usuario">Registre-se</a>
                                <div class="btn-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Login</button>
                                <ul id="ul_login" class="dropdown-menu dropdown-menu-end">
                                    <li><h4>Login</h4></li>
                                    <li>
                                        <label for="email_login">Email:</label>
                                        <input id="email_login" type="email" class="form-control">
                                    <li id="li_senha">
                                        <label for="senha_login">Senha:</label>
                                        <input id="senha_login" type="password" class="form-control">
                                        <i onclick="olho_senha()" id="olho_senha" class="fa-solid fa-eye-slash"></i>
                                    <li>
                                        <button class="btn btn-outline-dark float-end" onclick="login()">Login</button>
                                    </li>
                                </ul>
                                </div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div style="padding-top: 56px;">
        <?php $this->renderSection('conteudo'); ?>
    </div>
</body>

</html>