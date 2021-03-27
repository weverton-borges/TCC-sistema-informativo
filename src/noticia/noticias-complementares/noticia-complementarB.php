<?php
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM noticia where isnoticiaB = '1' ORDER BY idnoticia DESC";
$q = $pdo->prepare($sql);
$q->execute(array($sql));
$data = $q->fetch(PDO::FETCH_ASSOC);
$conteudoNoticia = null;
$tituloNoticia = null;
$imagem = null;

if($data){
    foreach($pdo->query($sql) as $row) {
        $conteudoNoticia =  $row['conteudo'];
        $tituloNoticia =  $row['titulo'];
        $imagem = $row['nomeImagem'];

        echo '<div class="row card div-card-lateral">';
            print"<a class='links' onclick=\"location.href='index.php?page=page_detalhe_noticia&id=".$row["idnoticia"]."'\">";
        print '<img class="card-notiticias-laterais img-thumbnail" src="' . $srcImg . $imagem .'" alt="imagem">';
            echo '</a>';
            echo '<div class="card-body">';
                echo '<p class="card-title font-weight-bold">'. $tituloNoticia. '</p>';
            echo '</div>';
        echo '</div>';

}
}else{
   include 'src/mensagem.php';
}

Banco::desconectar();
?>