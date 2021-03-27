<!-- LATERAIS -->
<?php
    include 'src/logon/painel-servicos.php';
?>

<div style="margin-bottom: 20px; margin-top: 20px">

    <div class="col-12" style="width: 100%; margin-left: 0px; display: flex;">
        <div  class="col-2" >
            <?php
            include 'src/noticia/noticias-complementares/noticia-complementarA.php';
            ?>
        </div>
        <div class="col-8">
            <div class="text-center mb-4">
                <h1>Destaques</h1>
            </div>
            <div class="row">
                <?php
                $pdo = Banco::conectar();
                $sql = "SELECT * FROM noticia where isdestaque = 1 LIMIT 4";
                $q = $pdo->prepare($sql);
                $q->execute(array($sql));
                $data = $q->fetch(PDO::FETCH_ASSOC);

                if($data){
                    foreach($pdo->query($sql)as $row) {
                        echo ' <div class="col-6" style="margin-bottom: 10px">';
                        echo '<div class="col-12">';
                        echo '<h5>'. $row['titulo'] . ' </h5>';
                        print"<a class='links' onclick=\"location.href='index.php?page=page_detalhe_noticia&id=".$row["idnoticia"]."'\">";
                        echo '<img class="img-thumbnail img-noticia-destaque" src="' . $srcImg . $row["nomeImagem"] .'" alt="imagem" />';
                        echo '</a>';
                        echo '</div>';
                        echo  '</div>';
                    }
                }else{
                    echo '<div class="col-12">';
                    include 'src/mensagem.php';
                    echo '</div>';
                }
                Banco::desconectar();
                ?>
            </div>
        </div>
        <!-- LATERAIS -->
        <div  class="col-2" >
            <?php
            include 'src/noticia/noticias-complementares/noticia-complementarB.php';
            ?>
        </div>
    </div>
</div>





<style type="text/css">

    a{
        transition: width 2s linear 1s;
        text-decoration: none;
    }
    a:link{
        color: black;
    }
    img:hover {
        opacity: 0.8;
        box-shadow: 0 0 11px rgba(33,33,33,.2);
    }

    #noticiadequeUm > a{
        transition: width 2s linear 1s;
        text-decoration: none;
    }
    .links{
        cursor: pointer;
    }
</style>
