<?php
//    session_start();
//?>
    <div class="col-12">
        <?php
//        Verifica se a sessão do usuário está ativa
        if(isset($_SESSION['nome'])){
            //
            include 'painel-usuario-noticia.php';
        }else{
//            Exibe mensagem de usuário não logado
            include 'src/mensagem-usuario.php';
        }
        ?>
    </div>



