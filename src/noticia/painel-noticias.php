    <div class="row">
        <div class="col-12">
            <div class="row ">
                <div class="col-6">
                    <h3>
                        Configurações de notícias
                    </h3>
                </div>
                <div class="col-6 align-self-center mb-1">
                    <div class="row float-right">
                        <a href="index.php?page=page_cad_noticia" class="btn btn-primary">
                            Cadastrar Notícia
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Título</th>
<!--                        <th scope="col">Contéudo</th>-->
                        <th scope="col">Destaque</th>
                        <th scope="col">Lateral A</th>
                        <th scope="col">Lateral B</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM noticia ORDER BY idnoticia DESC';

                    foreach($pdo->query($sql)as $row) {
                        $isdestaque = $row['isdestaque'] == 1 ? 'Sim': 'Não';
                        $isnoticiaA = $row['isnoticiaA'] == 1 ? 'Sim': 'Não';
                        $isnoticiaB = $row['isnoticiaB'] == 1 ? 'Sim': 'Não';

                        echo '<tr>';
                        echo '<th scope="row">'. $row['idnoticia'] . '</th>';
                        echo '<td>'. $row['titulo'] . '</td>';
//                        echo '<td>'. $row['conteudo'] . '</td>';
                        echo '<td>'. $isdestaque . '</td>';
                        echo '<td>'. $isnoticiaA. '</td>';
                        echo '<td>'. $isnoticiaB . '</td>';
                        echo '<td width=200>';
                        echo ' ';
                        print"<a class='btn btn-warning' onclick=\"location.href='index.php?page=page_atualizar-noticia&id=".$row["idnoticia"]."'\">";
                        echo 'Atualizar';
                        echo '</a>';
                        echo ' ';
                        print"<a class='btn btn-danger' onclick=\"location.href='index.php?page=page_excluir-noticia&id=".$row["idnoticia"]."'\">";
                        echo 'Excluir';
                        echo '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Banco::desconectar();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row float-right mt-3">
        <div class="form-actions">
            <a href="index.php?page=page_conf" type="btn" class="btn btn-info">Voltar</a>
        </div>
    </div>
