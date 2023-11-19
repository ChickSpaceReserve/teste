<?php
include "../conexao.php";

$cnpj      = $_POST['txtcnpj'];
$descricao = $_POST['txtdescricao'];
$dispo     = $_POST['txtdispo'];
$nmesa     = $_POST['txtnmesa'];
$nlugares  = $_POST['txtnlugares'];

$inserir = "INSERT INTO MESA( N_DA_MESA, N_DE_LUGARES, DISPONIBILIDADE, DESCRICAO_MESA, CNPJ_MESA) VALUES ('$nmesa','$nlugares','$dispo','$descricao','$cnpj')";

mysqli_query($conn, $inserir);
$erro = "Cadastro armazenado com sucesso! <img src='../../IMAGENS/check-mark.png' class='tamanho'>";
header("refresh: 5; url=mesa.php");

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