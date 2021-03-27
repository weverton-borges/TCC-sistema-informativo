
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link href="assets/css/signin.css" rel="stylesheet">
    <link rel="icon" href="assets/img/logo.png">
    <title>Sistema de Notícias Tecnológicas</title>

</head>

<body>
<?php
include 'src/conexaoBD/conexao.php';
    $loginIvalido = null;
    $srcImg = 'assets/img/';
    include 'src/menu/menu.php';
?>
<div style="margin-bottom: 20px; margin-top: 20px">
    <div class="col-12" style="width: 100%; margin-left: 0px; display: flex;">

        <div class="col-12" >
            <?php

//            page = page_home
                switch(@$_REQUEST["page"]) {

                    case "page_usuario":
                        include("src/usuario/usuario.php");
                        break;
                    case "page_home":
                        include("src/paginaInicial/home.php");
                        break;
                    case "page_cad_noticia":
                        include("src/noticia/noticia.php");
                        break;
                    case "page_login":
                        include("src/logon/login.php");
                        break;
                    case "page_conf":
                        include("src/manutencao/manutencao.php");
                        break;
                    case "page_detalhe_noticia":
                        include("src/noticia/visualizar-noticia.php");
                        break;
                    case "page_atualizar-noticia":
                        include("src/noticia/atualizar-noticia.php");
                        break;
                    case "page_logout":
                        include("src/logon/sair.php");
                        break;
                    case "page_recuperar-senha":
                        include("src/usuario/recuperar-senha.php");
                        break;
                    case "page_enviar-email":
                        include("src/usuario/enviar-email/enviarEmail.php");
                        break;
                    case "page_painel-noticias":
                        include("src/noticia/painel-noticias.php");
                        break;
                    case "page_painel-usuario":
                        include("src/usuario/painel-usuario.php");
                        break;
                    case "page_atualizar-usuario":
                        include("src/usuario/atualizar-usuario.php");
                        break;
                    case "page_edicao-noticia":
                        include("src/noticia/edicao-noticia.php");
                        break;
                    case "page_excluir-noticia":
                        include("src/noticia/excluir-noticia.php");
                        break;
                    default:
                        include("src/paginaInicial/home.php");
                }
            ?>
        </div>
    </div>
</div>

<?php
    include 'src/rodape/rodape.php';
?>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="node_modules/crypto-js/crypto-js.js"></script>
    </body>
</html>