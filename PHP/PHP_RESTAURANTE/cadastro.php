<?php
include "../conexao.php";

$nome        = $_POST['txtnome'];
$email       = $_POST['txtemail'];
$cnpj        = $_POST['txtcnpj'];
$uf          = $_POST['txtuf'];
$cep         = $_POST['txtcep'];
$bairro      = $_POST['txtbairro']; 
$cidade      = $_POST['txtcidade'];  
$logradouro  = $_POST['txtlogradouro'];  
$telefone    = $_POST['txttelefone'];
$csenha      = $_POST['txtcsenha'];
$senha       = $_POST['txtsenha'];
$comida      = $_POST['txtcomida'];
$restaurante = $_POST['txtrestaurante'];

$inserir = "INSERT INTO RESTAURANTE(CNPJ_RESTAURANTE,EMAIL_RESTAURANTE,NOME_RESTAURANTE,TELEFONE_RESTAURANTE,TIPO_DE_RESTAURANTE,ESTILO_DE_COMIDA,UF,CEP,BAIRRO,CIDADE_RESTAURANTE,LOGRADOURO,SENHA_RESTAURANTE) VALUES('$cnpj','$email','$nome','$telefone','$restaurante','$comida','$uf','$cep','$bairro','$cidade','$logradouro','$senha')";

if (strlen($senha) < 8) {
    $erro = "Senha deve ser maior que 8 caracteres! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='../HTML/cadastrocliente.html' class='decoracao'>Tentar Novamente</a>";
} else {
if($senha === $csenha){
    mysqli_query($conn, $inserir);
    $erro = "Cadastro armazenado com sucesso! <img src='../../IMAGENS/check-mark.png' class='tamanho'>";
    header("refresh: 5; url=../loginhtml.php");
} else {
    $erro = "Senhas diferentes! Verifique a senha! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='../HTML/cadastrocliente.html' class='decoracao'>Tentar Novamente</a>";
}
}

/*
    mysqli_query($conn, $inserir);
    echo"Cadastro armazenado com sucesso!";
    header("refresh: 5; url=../HTML/login.html");
*/

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../../IMAGENS/logo.png" type="image/x-icon">
<link rel="stylesheet" href="../../CSS/erro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>ChickSpace</title>
</head>
<body>
    <div class="containe">
        <section class="dados-pessoais">
            <?= $erro ?>
        </section>
    </div>
</body>
</html>