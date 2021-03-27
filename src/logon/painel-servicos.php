<?php
    if(isset($_SESSION['id'])){
        echo '<div class="col-12" style="text-align: end">';
            echo '<div>';
                echo '<span>  Bem Vindo (a): ' . $_SESSION['nome'] .'  </span>';
            echo '</div>';
        echo '</div>';
    }

?>