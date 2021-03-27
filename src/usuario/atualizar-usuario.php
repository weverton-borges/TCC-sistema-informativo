<?php

$id = null;
$atualizado = null;
if ( !empty($_GET['id'])) {

//    $id = 1
    $id = $_REQUEST['id'];
}

if (!empty($_POST)) {
    $nomeErro = null;
    $sobreNomeErro = null;
    $emailErro = null;
    $senhaErro = null;

    $validacao = true;

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($sobrenome)) {
        $sobreNomeErro = 'Por favor digite o nome!';
        $validacao = false;
    }

    if (empty($email)) {
        $emailErro = 'Por favor digite o email!';
        $validacao = false;
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        $emailErro = 'Por favor digite um email válido!';
        $validacao = false;
    }

    if(!empty($_POST['altsenha'])) {
        if (!empty($_POST['senhaAnterior'])) {
            if (!empty($_POST['novaSenha'])) {
                $senha = md5($_POST['novaSenha']);
            }
        }
    }

    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario  set nome = ?, sobrenome = ?, email = ?, senha = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome,$sobrenome, $email, $senha, $id));
        $atualizado = 'Atualizado com sucesso';
        Banco::desconectar();
    }

}else{
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $senha = $data['senha'];
    $sobrenome = $data['sobrenome'];
    $email = $data['email'];
    Banco::desconectar();
}


?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
</head>
<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar Cadastro </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="index.php?page=page_atualizar-usuario&id=<?php echo $id?>"  method="post">

                    <div class="control-group <?php echo !empty($nomeErro)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="text" placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($sobreNomeErro)?'error':'';?>">
                        <label class="control-label">Sobrenome</label>
                        <div class="controls">
                            <input name="sobrenome" class="form-control" size="50" type="text" placeholder="Sobrenome" value="<?php echo !empty($sobrenome)?$sobrenome:'';?>">
                            <?php if (!empty($sobreNomeErro)): ?>
                                <span class="help-inline"><?php echo $sobreNomeErro;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($email)?'error':'';?>">
                        <label class="control-label">E-mail</label>
                        <div class="controls">
                            <input name="email"  readonly class="form-control" size="40" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($senha)?'error':'';?>">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input name="senha" id="senhaUsuario" readonly  class="form-control" size="40" type="password" placeholder="Senha" value="<?php echo !empty($senha)?$senha:'';?>">
                            <?php if (!empty($senhaErro)): ?>
                                <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-check mt-1"  style="cursor:pointer;">
                        <input type="checkbox" class="form-check-input" style="cursor:pointer;" value="1" name="altsenha" id="checkSenha" onclick="exibirAltSenha()">
                        <label class="form-check-label" for="exampleCheck1">Alterar Senha</label>
                    </div>

                    <div class="row col-4 mt-4" id="divSenhas" style="display: none">
                        <div class="col-4">
                            <label for="exampleInputPassword1">Senha anterior</label>
                            <input type="password" id="senhaAnterior" name="senhaAnterior" class="form-control"  onkeyup="verificaSenha()" autocomplete="of">
                        </div>
                        <div class="col-4">
                            <label>Nova senha</label>
                            <input type="password" name="novaSenha" class="form-control" autocomplete="of">
                        </div>
                        <div class="col btn-cadastrar">
                            <button id="btnCadastrar" type="submit" class="btn btn-primary" style="display: none">Cadastrar</button>
                        </div>


                        <div class="col-10 mt-4 mr-auto ml-3" id="senhaInvalida" style="display: none">
                            <div class="alert alert-danger col-6" role="alert">
                                Senha incorreta.
                            </div>
                        </div>

                    </div>

                    <?php
                    if(!empty($atualizado)){
                        echo '<div class="alert alert-success" role="alert">';
                            echo 'Cadastro Atualizado com sucesso';
                        echo '</div>';
                    };
                    ?>
                    <br/>
                    <div class="form-actions">
                        <button type="submit"  id="btnAtualizar" class="btn btn-warning">Atualizar</button>
                        <a href="index.php?page=page_painel-usuario" type="btn" class="btn btn-info">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>


        function exibirAltSenha() {
            let divSenha = document.getElementById("divSenhas");
            let checkSenha = document.getElementById("checkSenha");


            if(checkSenha.checked === true){
                divSenha.value = divSenha.style.display = 'inline'
            }else{
                divSenha.value = divSenha.style.display = 'none'
            }
        }

        function verificaSenha() {
            let err = document.getElementById("senhaInvalida");
            let senhaAnterior = document.getElementById("senhaAnterior").value;
            let senhaUsuario = document.getElementById("senhaUsuario").value;
            let btnAtualizar = document.getElementById("btnAtualizar");

            var confirmSenha = CryptoJS.MD5(senhaAnterior).toString();
            // e7d80ffeefa212b7c5c55700e4f7193e
            if(confirmSenha === senhaUsuario){
                btnAtualizar.value = btnAtualizar.style.display = 'inline'
                err.value = err.style.display = 'none'
            }else{
                err.value = err.style.display = 'inline'
                btnAtualizar.value = btnAtualizar.style.display = 'none'
            }
        }
</script>

</body>
</html>
