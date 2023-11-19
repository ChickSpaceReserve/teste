<?php
session_start();
include "conexao.php";

if (!empty($_SESSION['CPF'])){

    $erro = "Mesa reservada com sucesso você tem até 30 min para comparecer ao restaurante! <img src='../IMAGENS/check-mark.png' class='tamanho'> <a href='../index.php' class='decoracao'>Voltar para home</a>";

} if (!empty($_SESSION['CNPJ'])){



} if (empty($_SESSION['CPF']) && empty($_SESSION['CNPJ'])){
    
    $erro = "";
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