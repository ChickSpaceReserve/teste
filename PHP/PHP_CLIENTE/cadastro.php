<?php
include "../conexao.php";

$nome             = $_POST['txtnome'];
$email            = $_POST['txtemail'];
$cpf              = $_POST['txtcpf'];
$data_nasc        = $_POST['txtdata_nasc'];
$cidade           = $_POST['txtcidade'];  
$csenha           = $_POST['txtcsenha'];
$senha            = $_POST['txtsenha'];
$telefone         = $_POST['txttelefone'];
$CPF_Contador_Palavras = strlen($cpf);

$ano_atual = date("Y");
$mes_atual = date("m"); 
$dia_atual = date("d");

$ano = substr($data_nasc,-10,-6);
$mes = substr($data_nasc,-5,-3);
$dia = substr($data_nasc, -2);

$inserir = "INSERT INTO CLIENTE(CPF_CLIENTE,EMAIL_CLIENTE,NOME_CLIENTE,TELEFONE_CLIENTE,DATA_NASC,CIDADE_CLIENTE,SENHA_CLIENTE) VALUES($cpf,'$email','$nome','$telefone','$data_nasc','$cidade','$senha')";

$sql_cliente = "SELECT * FROM CLIENTE WHERE EMAIL_CLIENTE = '$email'";
$result_cliente = mysqli_query($conn, $sql_cliente);

if (strlen($senha) < 8) {
$erro = "Senha deve ser maior que 8 caracteres! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
} else {
if($senha === $csenha){
   if($ano_atual - $ano >=18){
        if ($CPF_Contador_Palavras != 11) {
        $erro = "CPF inválido! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
        } else {
            $CPF_V1 = intval($cpf[0]);
            $CPF_V2 = intval($cpf[1]);
            $CPF_V3 = intval($cpf[2]);
            $CPF_V4 = intval($cpf[3]);
            $CPF_V5 = intval($cpf[4]);
            $CPF_V6 = intval($cpf[5]);
            $CPF_V7 = intval($cpf[6]);
            $CPF_V8 = intval($cpf[7]);
            $CPF_V9 = intval($cpf[8]);
            $CPF_V10= intval($cpf[9]);
            $CPF_V11= intval($cpf[10]);
        
            $Resultado_CPF = $CPF_V1 * 1 + $CPF_V2 * 2 + $CPF_V3 * 3 + $CPF_V4 * 4 + $CPF_V5 * 5 + $CPF_V6 * 6 + $CPF_V7 * 7 + $CPF_V8 * 8 + $CPF_V9 * 9;
            $CPF_Verificador1 = $Resultado_CPF % 11;
        
            if ($CPF_Verificador1 == 10) {

                $CPF_Verificador1 = 0;

            }
        
            $Resultado_CPF = $CPF_V1 * 0 + $CPF_V2 * 1 + $CPF_V3 * 2 + $CPF_V4 * 3 + $CPF_V5 * 4 + $CPF_V6 * 5 + $CPF_V7 * 6 + $CPF_V8 * 7 + $CPF_V9 * 8 + $CPF_Verificador1 * 9;
            $CPF_Verificador2 = $Resultado_CPF % 11;
        
            if ($CPF_Verificador2 == 10) {

                $CPF_Verificador2 = 0;

            }
        
            if ($CPF_Verificador1 == $CPF_V10 && $CPF_Verificador2 == $CPF_V11) {

                if ($result_cliente->num_rows == 1) {
                
                    $erro = "E-mail já cadastrado!!!!! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
                
                } else {
                    $sql_restaurante    = "SELECT * FROM RESTAURANTE WHERE EMAIL_RESTAURANTE = '$email'";
                    $result_restaurante = mysqli_query($conn, $sql_restaurante);
                
                    if ($result_restaurante->num_rows == 1) {
                    $erro = "E-mail já cadastrado!!!!! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
                    } else {
                    $sql_cliente    = "SELECT * FROM CLIENTE WHERE EMAIL_CLIENTE = '$email'";
                    $result_cliente = mysqli_query($conn, $sql_cliente);

                    if ($result_cliente->num_rows == 1) {
                    $erro = "E-mail já cadastrado!!!!! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
                    } else {

                    mysqli_query($conn, $inserir);
                    $erro = "Cadastro armazenado com sucesso! <img src='../../IMAGENS/check-mark.png' class='tamanho'>";
                    header("refresh: 5; url=../loginhtml.php");

                    }
                    }
                }
            } else {
            $erro = "CPF inválido! <img src='../../IMAGENS/cross.png' class='tamanho'>";
            }
        }
   }
   else{
    $erro = "Você é menor de idade!!!!! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
   }
} else {
    $erro = "Senhas diferentes! Verifique a senha! <img src='../../IMAGENS/cross.png' class='tamanho'> <a href='cadastro.php' class='decoracao'>Tentar Novamente</a>";
}
}

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