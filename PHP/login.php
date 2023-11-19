<?php
session_start();
include "conexao.php";

$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];

$sql_cliente = "SELECT * FROM CLIENTE WHERE EMAIL_CLIENTE = '$email' AND SENHA_CLIENTE = '$senha'";
$result_cliente = mysqli_query($conn, $sql_cliente);

if ($result_cliente->num_rows == 1) {

$cliente = $result_cliente->fetch_assoc();

$_SESSION['CPF'] = $cliente['CPF_CLIENTE'];

$erro = "Login realizado com sucesso! <img src='../IMAGENS/check-mark.png' class='tamanho'>";
header("refresh: 5; url=../index.php");

} else {

$sql_restaurante = "SELECT * FROM RESTAURANTE WHERE EMAIL_RESTAURANTE = '$email' AND SENHA_RESTAURANTE = '$senha'";
$result_restaurante = mysqli_query($conn, $sql_restaurante);

    if ($result_restaurante->num_rows == 1) {

    $restaurante = $result_restaurante->fetch_assoc();

    $_SESSION['CNPJ'] = $restaurante['CNPJ_RESTAURANTE'];

    $erro = "Login realizado com sucesso! <img src='../IMAGENS/check-mark.png' class='tamanho'>";
    header("refresh: 5; url=../index.php");

    } else {

    $erro = "Conta inválida ou inexistente! <img src='../IMAGENS/cross.png' class='tamanho'> <a href='loginhtml.php' class='decoracao'>Tentar Novamente</a>";

    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../IMAGENS/logo.png" type="image/x-icon">
<link rel="stylesheet" href="../CSS/erro.css">
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