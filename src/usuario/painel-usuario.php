    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <h3>
                    Configurações de Usuário
                </h3>
            </div>
            <div class="col-6">
                <a href="index.php?page=page_usuario" class="btn btn-info float-right">
                    Cadastrar Usuário
                </a>
            </div>


        </div>
        <div class="col-12">
            <?php
            $id = $_SESSION['id'];
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuario where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);

            Banco::desconectar();
            ?>
            <hr>
            <div class="row">
                <div class="col-5 ml-auto">
                    <h5> Dados de Usuário </h5>
<!--                    --><?php
//                        if($data['senha'] === md5('senha123')){
//                            echo 'True';
//                        }else{
//                            echo 'False';
//                        }
//                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                        </div>
                        <input type="text" class="form-control bg-light" aria-label="Default" disabled  value="<?php echo $data['nome'];?>">

                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Sobrenome</span>
                        </div>
                        <input type="text" class="form-control bg-light" aria-label="Default" disabled  value="<?php echo $data['sobrenome'];?>">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">E-mail</span>
                        </div>
                        <input type="email" class="form-control bg-light" aria-label="Default" disabled  value="<?php echo $data['email'];?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                        </div>
                        <input type="password" class="form-control bg-light" aria-label="Default" disabled  value="<?php echo $data['senha'];?>">
                    </div>

                    <div class="input-group mb-3">
                        <?php
                            print"<a class='btn btn-info' onclick=\"location.href='index.php?page=page_atualizar-usuario&id=".$data["id"]."'\">";
                                echo 'Alterar Dados';
                                echo '</a>';
                        ?>
                    </div>
                </div>

                <div class="col-5">
                    <div class="float-left">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Foto Perfil</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row float-right mt-3">
        <div class="form-actions">
            <a href="index.php?page=page_conf" type="btn" class="btn btn-info">Voltar</a>
        </div>
    </div>