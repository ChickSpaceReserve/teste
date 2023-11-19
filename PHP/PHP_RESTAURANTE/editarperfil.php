<?php
session_start();
include "../conexao.php";
include "../protecao.php";

$cnpj = $_SESSION['CNPJ'];

$sql_restaurante = "SELECT * FROM RESTAURANTE WHERE CNPJ_RESTAURANTE = '$cnpj'";
$result          = mysqli_query($conn, $sql_restaurante);
$restaurante     = $result->fetch_assoc();

$nome       = $restaurante['NOME_RESTAURANTE'];
$telefone   = $restaurante['TELEFONE_RESTAURANTE'];
$tipo       = $restaurante['TIPO_DE_RESTAURANTE'];
$estilo     = $restaurante['ESTILO_DE_COMIDA'];
$email      = $restaurante['EMAIL_RESTAURANTE'];
$uf         = $restaurante['UF'];
$cep        = $restaurante['CEP'];
$cidade     = $restaurante['CIDADE_RESTAURANTE'];
$bairro     = $restaurante['BAIRRO'];
$logradouro = $restaurante['LOGRADOURO'];
$senha      = $restaurante['SENHA_RESTAURANTE'];

?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='shortcut icon' href='../../IMAGENS/logo.png' type='image/x-icon'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==' crossorigin='anonymous' referrerpolicy='no-referrer' />
<link rel='stylesheet' href='../../CSS/footer.css'>
<link rel='stylesheet' href='../../CSS/dadospessoais.css'>
<link rel='stylesheet' href='../../CSS/header.css'>
<title>Editar perfil - <?= $nome ?></title>
</head>
<body>

<header class='cabecalho'>
  <div></div>
  <a href='../../index.php'><img class='cabecalho-imagem' src='../../IMAGENS/logo.png'></a>
  <div></div>
</header>

<main>
  <div class='containe'>
    <h1>Editar perfil</h1>
      <section class='dados-pessoais'>
        <form form action='alterar.php' method='post'>
          <div class='dados-container'>
            <div>
              <label for='nome'>
                <span>Nome</span>
                <input type='text' id='nome' value='<?= $nome ?>' name='txtnome' class='texto-tamanho' >
              </label>
              <label for='cnpj'>
                <span>CNPJ</span>
                <input type='text' id='cnpj' value='<?= $cnpj ?>' name='txtcnpj' class='texto-tamanho' readonly>
              </label>
              <label for='telefone'>
                <span>Telefone</span>
                <input type='text' id='telefone' value='<?= $telefone ?>' name='txttelefone' class='texto-tamanho' >
              </label>
              <label for='email'>
                <span>E-mail</span>
                <input type='email' id='email' value='<?= $email ?>' name='txtemail' class='texto-tamanho' >
              </label>
              <div class='select-filter'>
                <label for='cuisine'>Tipo de comida</label>
                  <select id='cuisine' name='txtcomida'>
                    <option value='Brasileira'>Brasileira</option>
                    <option value='Italiana'>Italiana</option>
                    <option value='Japonesa'>Japonesa</option>
                    <option value='Vegetariana'>Vegetariana</option>
                    <option value='Vegana'>Vegana</option>
                  </select>
              </div>
              <div class='select-filter'>
                <label for='restaurant-type'>Tipo de restaurante</label>
                  <select id='restaurant-type' name='txtrestaurante'>
                    <option value='À la carte'>À la carte</option>
                    <option value='Self-service'>Self-service</option>
                  </select>
              </div>
            </div>
            <div>
              <label for='uf'>
                <span>UF</span>
                <input type='text' id='uf' value='<?= $uf ?>' name='txtuf' class='texto-tamanho' >
              </label>
              <label for='cep'>
                <span>CEP</span>
                <input type='text' id='cep' value='<?= $cep ?>' name='txtcep' class='texto-tamanho' >
              </label>
              <label for='cidade'>
                <span>Cidade</span>
                <input type='text' id='cidade' value='<?= $cidade ?>' name='txtcidade' class='texto-tamanho' >
              </label>
              <label for='bairro'>
                <span>Bairro</span>
                <input type='text' id='bairro' value='<?= $bairro ?>' name='txtbairro' class='texto-tamanho' >
              </label>
              <label for='logradouro'>
                <span>Logradouro</span>
                <input type='text' id='logradouro' value='<?= $logradouro ?>' name='txtlogradouro' class='texto-tamanho'>
              </label>
              <label for='senha'>
                <span>Senha</span>
                <input type='text' id='senha' value='<?= $senha ?>' name='txtsenha' placeholder='Digite sua senha' class='texto-tamanho'>
              </label>
            </div>
          </div>
          
            <input type='submit' value='Salvar Alteração' id='button'>
          </div>
        </form>
      </section>
  </div>
</main>

<footer>
  <div id='footer_content'>
    <div id='footer_contacts'>
      <img src='../../IMAGENS/logo.png' width='150px' height='150px'>
      <h2>Sua Reserva Garantida.</h2>
    </div>
    <div id='footer_social_media'>
      <a href='https://instagram.com/chick_space?igshid=MmJiY2I4NDBkZg==' class='footer-link' id='instagram'>
        <i class='fa-brands fa-instagram'></i>
      </a>
      <a href='https://www.facebook.com/profile.php?id=100093142992265&mibextid=ZbWKwL' class='footer-link' id='facebook'>
        <i class='fa-brands fa-facebook-f'></i>
      </a>
      <a href='https://twitter.com/ChickSpaceOFC?t=JHTMYx2q0iq5qXPVzJH7nw&s=09' class='footer-link' id='twitter'>
        <i class='fa-brands fa-twitter'></i>
      </a>
    </div>
  </div>
  <div id='footer_copyright'>
    &#169 2023 all rights reserved ChickSpace
  </div>
</footer>
</body>
</html>