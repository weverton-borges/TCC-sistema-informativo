<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<div class="col-12">
    <?php
    if(isset($_SESSION['nome'])){
        include 'src/noticia/edicao-noticia.php';
    }else{
        include 'src/mensagem-usuario.php';
    }
    ?>
</div>

