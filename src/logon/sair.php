<?php
//    session_start();

        unset(
            $_SESSION['logado'],
            $_SESSION['id'],
            $_SESSION['nome'],
            $_SESSION['email'],
            $_SESSION['senha']
        );
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    session_destroy();
    header("Location: index.php?page=page_login");
?>