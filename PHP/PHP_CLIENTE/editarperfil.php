<?php
session_start();
include "../conexao.php";
include "../protecao.php";

$cpf = $_SESSION['CPF'];

$sql_cliente = "SELECT * FROM CLIENTE WHERE CPF_CLIENTE = '$cpf'";
$result      = mysqli_query($conn, $sql_cliente);
$cliente     = $result->fetch_assoc();

$email     = $cliente['EMAIL_CLIENTE'];
$nome      = $cliente['NOME_CLIENTE'];
$telefone  = $cliente['TELEFONE_CLIENTE'];
$data_nasc = $cliente['DATA_NASC'];
$cidade    = $cliente['CIDADE_CLIENTE'];
$senha     = $cliente['SENHA_CLIENTE'];

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
    <h1>Alterar Dados</h1>
      <section class='dados-pessoais'>
        <form action='alterar.php' method='post'>
          <div class='dados-container'>
            <div>
              <label for='nome'>
                <span>Nome</span>
                <input type='text' id='nome' value='<?= $nome ?>' name='txtnome' placeholder='Digite seu nome' class='texto-tamanho'>
              </label>
              <label for='cpf'>
                <span>CPF</span>
                <input type='text' id='cpf' value='<?= $cpf ?>' name='txtcpf' placeholder='Digite seu CPF' class='texto-tamanho' readonly>
              </label>
              <label for='email'>
                <span>E-mail</span>
                <input type='email' id='email' value='<?= $email ?>' name='txtemail' placeholder='Digite seu E-mail' class='texto-tamanho'>
              </label>
              <label for='senha'>
                <span>Senha</span>
                <input type='text' id='senha' value='<?= $senha ?>' name='txtsenha' placeholder='Digite sua senha' class='texto-tamanho'>
              </label>
            </div>
            <div>
              <label for='data_nasc'>
                <span>Data nascimento</span>
                <input type='date' id='data_nasc' value='<?= $data_nasc ?>' name='txtdata_nasc' class='texto-tamanho'>
              </label>
              <label for='telefone'>
                <span>Telefone</span>
                <input type='text' id='telefone' value='<?= $telefone ?>' name='txttelefone' placeholder='Digite seu telefone' class='texto-tamanho'>
              </label>
              <label for='cidade'>
                <span>Cidade</span>
                <input type='text' id='cidade' value='<?= $cidade ?>' name='txtcidade' placeholder='Digite sua cidade' class='texto-tamanho'>
              </label>
            </div>
          </div>
          <div class='buttons'>
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