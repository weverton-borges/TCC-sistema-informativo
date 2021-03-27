<?php

$id = 0;

if(!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
$erro = null;
$salva = null;
if(!empty($_POST)) {
    $id = $_POST['id'];

    //Delete do banco:
    $pdo = Banco::conectar();
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM noticia where idNoticia = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $salva = 'ok';

    }catch (PDOException $e){
        $erro = 'erro';
    }
    Banco::desconectar();
//    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Deletar Contato</title>
</head>

<body>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3 class="well">Excluir Notícia</h3>
        </div>
        <form class="form-horizontal" action="index.php?page=page_excluir-noticia&id=<?php echo $id?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>" />
            <div class="alert alert-danger"> Deseja excluir a notícia?
            </div>
            <div class="form actions">
                <button type="submit" class="btn btn-danger">Sim</button>
                <a href="index.php?page=page_painel-noticias" type="btn" class="btn btn-default">Não</a>
            </div>
        </form>
    </div>

    <?php
        if($salva){
            echo '<div class="col-10 mt-4 mr-auto ml-3">';
                echo '<div class="alert alert-success col-6" role="alert">';
                    echo "Noticia Excluída com sucesso.\n";
                echo '</div>';
            echo '</div>';
        }
        if($erro){
            echo '<div class="col-10 mt-4 mr-auto ml-3">';
                echo '<div class="alert alert-danger col-6" role="alert">';
                    echo "Erro ao excluir notícia.\n";
                echo '</div>';
            echo '</div>';
        }
    ?>
</div>
<div class="row float-right mt-3">
    <div class="form-actions">
        <a href="index.php?page=page_painel-noticias" type="btn" class="btn btn-info">Voltar</a>
    </div>
</div>
</body>
</html>
