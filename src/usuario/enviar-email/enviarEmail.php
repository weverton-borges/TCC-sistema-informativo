<?php
require 'src/phpMailer/PHPMailer.php';
require 'src/phpMailer/SMTP.php';
require 'src/phpMailer/Exception.php';
require 'src/usuario/enviar-email/gera-senha.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$mail = new PHPMailer(true);
try {

    $enviado = false;
    $novaSenha = geraSenha();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sistemadenoticiastecnologicass@gmail.com';
    $mail->Password = 'sistematcc';
    $mail->Port = 587;
    $mail->From = $mail->Username;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('sistemadenoticiastecnologicass@gmail.com', 'Sistema de Notícias Tecnológicas');
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);
    $mail->Subject = 'Solicitação de senha';
    $mail->Body = 'Chegou sua nova senha: <strong> ' . $novaSenha . '  </strong>
    <small>É recomendado alterá-la no primeiro acesso.</small>
    ';
    $mail->AltBody = 'Chegou sua nova senha: ' . $novaSenha;

    if($mail->send()){
        $enviado = true;
        echo '<div class="alert alert-success" role="alert">';
            echo 'Verifique a caixa de entrada do seu e-email.';
        echo '</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">';
            echo 'Erro ao enviar email';
        echo '</div>';
    }

    if($enviado){
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario where email = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($email));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $id = $data['id'];
        $nome = $data['nome'];
        $sobrenome = $data['sobrenome'];
        $senha = $data['senha'];
        $email = $data['email'];
        Banco::desconectar();
    }

    atualizarSenha($id, $nome, $sobrenome, $email, $novaSenha);


}catch (Exception $e){
    echo '<div class="alert alert-danger" role="alert">';
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo} ";
    echo '</div>';
}

function atualizarSenha($id, $nome, $sobrenome, $email, $novaSenha){
    try {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario  set nome = ?, sobrenome = ?, email = ?, senha = ?, id = ? WHERE id =".$id;
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $sobrenome, $email, md5($novaSenha), $id));
        Banco::desconectar();
    }catch (PDOException $e){
        echo '<div class="alert alert-success" role="alert">';
            echo 'Erro ao atualizar senha na base de dados';
        echo '</div>';
    }
}
?>
<div class="row float-right mt-3">
    <div class="form-actions">
        <a href="index.php?page=page_login" type="btn" class="btn btn-info">Voltar</a>
    </div>
</div>
