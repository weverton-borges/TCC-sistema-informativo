<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>

    <body>
        <div class="container">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h2 class="form-signin-heading text-center">Área Restrita</h2>
                <form action="index.php?page=page_login" method="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" autocomplete="on" class="form-control" placeholder="Email" type="email" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                        </div>
                        <input class="form-control" name="senha" maxlength="8" placeholder="Senha" type="password" required>
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-danger btn-block"> Entrar  </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Esqueceu sua senha? <a href="index.php?page=page_recuperar-senha">Clique aqui</a> </p>
                </form>
            </article>
        </div>
    </body>


</html>
<?php
    if(!empty($_POST)) {
        $email = null;
        $senha = null;


        $validacao = true;

        if((isset($_POST['email'])) && (isset($_POST['senha']))){
            $email =$_POST['email'];
            $senha = md5($_POST['senha']);
        }

       if($email != null && $senha != null) {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuario where email = ?  && senha = '$senha' LIMIT 1";
            $q = $pdo->prepare($sql);
            $q->execute(array($email));
            $data = $q->fetch(PDO::FETCH_ASSOC);


            if(isset($data)){
                if(isset($data['id'])){
//                    session_start();

                    $_SESSION['logado'] = 'S';
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nome'] = $data['nome'];
                    $_SESSION['senha'] = $data['senha'];
                    $_SESSION['email'] = $data['email'];

                    echo "<script> console.log('PHP: ',",$_SESSION['nome'],");</script>";
                    header("Location: index.php?page=page_home");

                }else{
                    echo '<div class="col-12 mt-4 mr-auto ml-3">';
                        echo '<div class="alert alert-danger col-6 ml-auto mr-auto text-center" role="alert">';
                            echo "Usuário ou senha Inválido.\n";
                        echo '</div>';
                    echo '</div>';
                    $_SESSION['loginErro'] = "Usuário ou senha Inválido";
                }
            }
        }
            Banco::desconectar();
    }

?>