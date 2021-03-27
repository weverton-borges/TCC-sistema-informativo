<div class="col-12">
    <div class="row mb-4">
        <h1>Cadastra-se</h1>
    </div>
    <form action="index.php?page=page_usuario" autocomplete="off" method="post">
        <div class="row col-12">
            <div class="col">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required placeholder="Nome">
            </div>
            <div class="col">
                <label>Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control" required placeholder="Sobrenome">
            </div>
            <div class="col">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control" required placeholder="Email">
            </div>
        </div>
        <div class="row col-8 mt-4">
            <div class="col">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" id="senha1" class="form-control"  required name="senha" autocomplete="of">
            </div>
            <div class="col">
                <label>Repita sua senha</label>
                <input type="password" id="senha2" onkeyup="verificarSenha()" name="senharepita" class="form-control" autocomplete="of" required>
            </div>
            <div class="col btn-cadastrar">
                <button id="btnCadastrar" type="submit" class="btn btn-primary" style="display: none">Cadastrar</button>
            </div>
        </div>
            <div class="col-10 mt-4 mr-auto ml-3" id="senhaInvalida" style="display: none">
                <div class="alert alert-danger col-6" role="alert">
                    As senhas são diferentes.
                </div>
            </div>
    </form>
</div>

<script>
    function verificarSenha() {
        var senha1 = document.getElementById("senha1").value;
        var senha2 = document.getElementById("senha2").value;
        var btn = document.getElementById("btnCadastrar");
        var err = document.getElementById("senhaInvalida");

        if(senha1===senha2){
            btn.value = btn.style.display = 'inline'
            err.value = err.style.display = 'none'
        }else{
            err.value = err.style.display = 'inline'
            btn.value = btn.style.display = 'none'
        }
    }
</script>

<div class="row float-right mt-3">
    <div class="form-actions">
        <a href="index.php?page=page_painel-usuario" type="btn" class="btn btn-info">Voltar</a>
    </div>
</div>

<style type="text/css">
    /*#senha1{*/
    /*    background: #721c24;*/
    /*}*/

</style>


