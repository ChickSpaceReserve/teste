<?php
session_start();
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
$senha       = $_POST['txtsenha'];
$comida      = $_POST['txtcomida'];
$restaurante = $_POST['txtrestaurante'];
$descricao   = $_POST['txtdescricao'];

$sql    = "UPDATE RESTAURANTE SET EMAIL_RESTAURANTE = '$email', NOME_RESTAURANTE = '$nome', TELEFONE_RESTAURANTE = '$telefone', TIPO_DE_RESTAURANTE = '$restaurante', ESTILO_DE_COMIDA = '$comida', CEP = '$cep', UF = '$uf', CIDADE_RESTAURANTE = '$cidade', BAIRRO = '$bairro', LOGRADOURO = '$logradouro',DESCRICAO_RESTAURANTE = $descricao, SENHA_RESTAURANTE = '$senha' WHERE CNPJ_RESTAURANTE = $cnpj";
mysqli_query($conn, $sql);

$erro = "Alterações salvas com sucesso! <img src='../../IMAGENS/check-mark.png' class='tamanho'>";
header("refresh: 5; url=dadospessoais.php");

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