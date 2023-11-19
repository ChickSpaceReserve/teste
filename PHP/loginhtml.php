<?php
include "logado.php";

?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='shortcut icon' href='../IMAGENS/logo.png' type='image/x-icon'>
<link rel='stylesheet' href='../CSS/footer.css'>
<link rel='stylesheet' href='../CSS/cadastro.css'>
<link rel='stylesheet' href='../CSS/header.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==' crossorigin='anonymous' referrerpolicy='no-referrer' />
<title>ChickSpace</title>
</head>
<body>

<header class='cabecalho'>
  <div></div>
  <a href='../index.php'><img class='cabecalho-imagem' src='../IMAGENS/logo.png'></a>
  <div></div>
</header>

<main>
  <div class='containe'>
    <section class='dados-pessoais'>
      <h1>Login</h1>
        <form action='login.php' method='post' id='idlogin'>
          <div class='dados-container'>
            <label for='email'>
              <span>E-mail</span>
              <input type='email' id='email' name='txtemail' placeholder='Digite seu E-mail' required>
            </label>
            <label for='senha'>
              <span>Senha</span>
              <input type='password' id='senha' name='txtsenha' placeholder='Digite sua senha' required>
            </label>
            <input type='submit' value='Entrar' id='button'>
            <a class='conta' href='PHP_CLIENTE/cadastrohtml.php'>Não Possui uma Conta? Cadastre-se</a>
            <a class='conta' href='PHP_RESTAURANTE/cadastrohtml.php'>Possui um restaurante? Cadastre-se aqui</a>
          </div>
        </form>
    </section>
  </div>
</main>

<footer>
  <div id='footer_content'>
    <div id='footer_contacts'>
      <img src='../IMAGENS/logo.png' width='150px' height='150px'>
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