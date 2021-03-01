<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cadastros VeroDellaudo</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>

<body>

    <?php
    if ($this->session->flashdata("mensagem")) {
        echo $this->session->flashdata("mensagem");
    }
    ?>
    <div id="container" class="container">
        <div class="row">
            <div class="col-4 ">&nbsp;</div>
            <div id="body" class="col-4 border">
                <img src="http://localhost/ci/assets/imagens/logo.png">
                <h4 class="mt-2 mb-2">Login de usuário:</h4>
                <form id="formLogin" method="post" action="<?= base_url('/index.php/Login/validaLogin') ?>">
                    <label class="mt-2 mb-2" for="loginUsuario">Login:</label>
                    <input class="form-control" type="text" id="loginUsuario" name="loginUsuario" placeholder="Digite aqui.">
                    <label class="mt-2 mb-2" for="loginSenha">Senha:</label>
                    <input class="form-control" type="password" id="loginSenha" name="loginSenha" placeholder="Digite aqui.">
                    <input class="form-control btn btn-primary mt-2 mb-2" type="submit" id="btnLogin" value="Entrar">
                </form>
            </img>
            <div class="col-4 ">&nbsp;</div>
        </div>
    </div>

</body>

</html>