<?php
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM noticia where idnoticia = ".$_REQUEST["id"];
$q = $pdo->prepare($sql);
$q->execute(array($sql));
$data = $q->fetch(PDO::FETCH_ASSOC);

if($data){
    $conteudo = $data['conteudo'];
    $titulo = $data['titulo'];
    $nomeImagem = $data['nomeImagem'];
}else {
    header("Location: index.php?page=page_login");
}
Banco::desconectar();
?>
<html>
    <meta charset="utf-8"/>
    <div class="container">
        <div class="card card-detalhe-noticia" style="width: 100%;">
            <img class="img-thumbnail img-detalhe-noticia" src="<?php echo $srcImg . $data['nomeImagem']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['titulo']?></h5>
                <p class="card-text"><?php echo $data['conteudo']?></p>
            </div>
        </div>
        <div class="row float-right mt-3">
            <div class="form-actions">
                <a href="index.php?page=page_home" type="btn" class="btn btn-info">Voltar</a>
            </div>
        </div>
    </div>
</html>
