<?php
/**
 * Gera senhas aleatórias
 *
 * @param int $qtdCaracteres quantidade de caracteres na senha, por padrão 8
 * @author Carlos Ferreira &lt;carlos@especializati.com.br&gt;
 * @return String
 */
function geraSenha($qtdCaracteres = 8){

    //Letras minúsculas embaralhadas/ as
    $minusculas = str_shuffle('abcdefghijklmnopqrstuvwxyz');

    //Letras maiúsculas embaralhadas GH
    $maiucsculas = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

    //Números aleatórios 23
    $numerosAleatorios = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numerosAleatorios .= 1234567890;

    //Caracteres Especiais $#
    $caracteresEpeciais = str_shuffle('!@#$%*-');

    //Junta tudo asGH23$#
    $juncao = $maiucsculas.$minusculas.$numerosAleatorios.$caracteresEpeciais;


    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $senha = substr(str_shuffle($juncao), 0, $qtdCaracteres);

    //Retorna a senha asGH23$#

    return $senha;
}

if(isset($_POST['email'])){
//    echo 'E-mail: ' . $_POST['email'];
//    echo geraSenha(8);
}

?>