<div class="col-12">
    <form name="formNoticia" action="index.php?page=page_cad_noticia" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <h6>Título</h6>
            <input type="text" class="form-control" id="titulo" placeholder="Título"  name="titulo" required>
        </div>

        <div class="form-group">
            <h6>Subtítulo</h6>
            <input type="text" class="form-control" id="subtitulo" placeholder="Subtítulo"  name="subtitulo" required>
        </div>

        <div class="form-group">
            <hr>
                <h6>Conteúdo</h6>
            <textarea type="text" class="form-control" id="conteudo" name="conteudo" required> </textarea>
        </div>

        <div class="form-group">
            <h6>Imagem</h6>
            <input type="file" class="form-control-file" id="imagem" name="nomeImagem" required>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <div class="row ml-2">
                        <span>Notícia Destaque</span>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center">
                            <input class="form-check-input" type="radio" name="isdestaque" value="1" checked>
                            <label class="form-check-label">
                                Sim
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="radio" name="isdestaque" value="0">
                            <label class="form-check-label">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row ml-2">
                        <span>Notícia Lateral A</span>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center">
                            <input class="form-check-input" type="radio" name="isnoticiaA" value="1">
                            <label class="form-check-label">
                                Sim
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="radio" name="isnoticiaA" value="0" checked>
                            <label class="form-check-label">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row ml-2">
                        <span>Notícia Lateral B</span>
                    </div>
                    <div class="row">
                        <div class="col-6 text-center">
                            <input class="form-check-input" type="radio" name="isnoticiaB" value="1">
                            <label class="form-check-label">
                                Sim
                            </label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input" type="radio" name="isnoticiaB" value="0" checked>
                            <label class="form-check-label">
                                Não
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row float-right">
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Salvar Notícia</button>
                <a href="index.php?page=page_home" type="btn" class="btn btn-info">Voltar</a>
            </div>
        </div>
        <br>
        <hr class="mt-4">
    </form>
</div>

<?php

if(!empty($_POST))
{
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $subtitulo = $_POST['subtitulo'];
    $isdestaque = $_POST['isdestaque'];
    $isnoticiaA = $_POST['isnoticiaA'];
    $isnoticiaB = $_POST['isnoticiaB'];
    $nomeImagem = $_FILES['nomeImagem']['name'];

    if(isset($_FILES['nomeImagem'])){
        $diretorio = "assets/img/"; //define o diretorio para onde enviaremos o arquivo
        $arquivo = $diretorio .basename($_FILES['nomeImagem']['name']);

        if (move_uploaded_file($_FILES['nomeImagem']['tmp_name'], $arquivo)) {
            echo '<div class="alert alert-success" role="alert">';
                echo "Notícia cadastrada com sucesso.\n";
            echo '</div>';
        } else {
            echo "Erro no upload de arquivo!\n";
        }
    }

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO noticia (titulo, subtitulo, nomeImagem, conteudo, isdestaque, isnoticiaA, isnoticiaB) VALUES(?,?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($titulo, $subtitulo,$nomeImagem, $conteudo, $isdestaque, $isnoticiaA, $isnoticiaB));
    Banco::desconectar();
}
?>


