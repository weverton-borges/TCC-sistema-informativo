<?php

session_start();
$label_btn = null;
$src_btn = null;
$isLogado = null;
if(isset($_SESSION['nome'])){
    $isLogado = $_SESSION['logado'];
    $label_btn = 'Sair';
    $src_btn  = 'index.php?page=page_logout';
}else{
    $src_btn = 'index.php?page=page_login';
    $label_btn = 'Entrar';
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-info" style="margin-bottom: 40px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand text-dark" href="index.php?page=page_home" >SNT - Sistema de Notícias Tecnológicas</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="btn-group">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/settings-24px.svg">
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href='<?php echo $src_btn ?>'>
                        <?php
                            echo $label_btn;
                        ?>
                    </a>
                    <a class="dropdown-item" href="index.php?page=page_conf">
                    <?php
                        if($isLogado){
                            echo 'Manutenção';
                        }

                    ?>
                    </a>
                </div>
            </div>
        </form>
    </div>
</nav>

