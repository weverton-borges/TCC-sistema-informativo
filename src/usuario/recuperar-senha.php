<head>
<!--<link href="../../assets/css/recuperar-senha.css" rel="stylesheet" id="bootstrap-css">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<div class="container">
    <article class="card-body mx-auto" style="max-width: 400px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Esqueceu sua senha?</h2>
                        <p>Use seu e-mail do cadastro.</p>
                        <div class="panel-body">

                            <form action="index.php?page=page_enviar-email" class="form" method="POST">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="email" class="form-control" placeholder="Email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Recuperar senha" type="submit">
                                    <a href="index.php?page=page_login" class="btn btn-lg btn-primary btn-block">
                                        Voltar
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </article>
</div>