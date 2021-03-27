<?php


if(isset($_SESSION['id'])){
    include 'cadastrar-usuario.php';
}else{
    include 'src/mensagem-usuario.php';
}
?>

<?php
    if(!empty($_POST)) {

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senharepita = $_POST['senharepita'];
        $senha = md5($_POST['senha']);

        if($senharepita == $_POST['senha']){
            try {
                $pdo = Banco::conectar();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES(?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($nome, $sobrenome,$email, $senha));

                echo '<div class="col-10 mt-4 mr-auto ml-3">';
                echo '<div class="alert alert-success col-6" role="alert">';
                echo "Cadastrado realizado com sucesso.\n";
                echo '</div>';
                echo '</div>';

            }catch (PDOException $e){
                if($e->getCode() == 23000){
                    echo '<div class="col-10 mt-4 mr-auto ml-3">';
                    echo '<div class="alert alert-danger col-6" role="alert">';
                    echo "E-mail já cadastrado.\n";
                    echo '</div>';
                    echo '</div>';
                }else{
                    echo '<div class="col-10 mt-4 mr-auto ml-3">';
                    echo '<div class="alert alert-danger col-6" role="alert">';
                    echo "Erro ao cadastrar usuário.\n";
                    echo '</div>';
                    echo '</div>';
                }
            }
            Banco::desconectar();
        }else{
            echo '<div class="col-10 mt-4 mr-auto ml-3">';
            echo '<div class="alert alert-danger col-6" role="alert">';
            echo "As senhas são diferentes.\n";
            echo '</div>';
            echo '</div>';
        }

    }
?>