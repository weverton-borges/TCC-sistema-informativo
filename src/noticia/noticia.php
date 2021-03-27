<?php
//session_start();
    if(isset($_SESSION['nome'])){
        include 'cadastrar-noticia.php';
    }else{
        include 'src/mensagem-usuario.php';
    }
?>

