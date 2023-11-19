<?php
include "../logado.php";

?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='shortcut icon' href='../../IMAGENS/logo.png' type='image/x-icon'>
<link rel='stylesheet' href='../../CSS/footer.css'>
<link rel='stylesheet' href='../../CSS/cadastro.css'>
<link rel='stylesheet' href='../../CSS/header.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==' crossorigin='anonymous' referrerpolicy='no-referrer' />
<title>Cadastro - Restaurante</title>
</head>
<body>

<header class='cabecalho'>
  <div></div>
  <a href='../../index.php'><img class='cabecalho-imagem' src='../../IMAGENS/logo.png'></a>
  <div></div>
</header>

<main>
  <div class='containe'>
    <section class='dados-pessoais'>
      <h1>Criar Conta</h1>
        <form action='cadastro.php' method='post' >
          <div class='dados-container'>
            <label for='nome'>
              <span>Nome</span>
              <input type='text' id='nome' name='txtnome' placeholder='Digite seu nome' maxlength='64' required>
            </label>
            <label for='email'>
              <span>E-mail</span>
              <input type='email' id='email' name='txtemail' placeholder='Digite seu E-mail' maxlength='254' required>
            </label>
            <label for='cnpj'>
              <span>CNPJ</span>
              <input type='text' id='cnpj' name='txtcnpj' placeholder='Digite seu CNPJ' maxlength='14' required>
            </label>
            <label for='uf'>
              <span>UF</span>
              <input type='text' id='uf' name='txtuf' placeholder='Digite seu UF' maxlength='2' required>
            </label>
            <label for='cep'>
              <span>CEP</span>
              <input type='text' id='cep' name='txtcep' placeholder='Digite seu CEP' maxlength='8' required>
            </label>
            <label for='bairro'>
              <span>Bairro</span>
              <input type='text' id='bairro' name='txtbairro' placeholder='Digite seu Bairro' maxlength='64' required>
            </label>
            <label for='cidade'>
              <span>Cidade</span>
              <input type='text' id='cidade' name='txtcidade' placeholder='Digite sua Cidade' maxlength='64' required>
            </label>
            <label for='logradouro'>
              <span>Logradouro</span>
              <input type='text' id='logradouro' name='txtlogradouro' placeholder='Digite seu Logradouro' maxlength='64' required>
            </label>
            <label for='telefone'>
              <span>Telefone</span>
              <input type='text' id='telefone' name='txttelefone' placeholder='Digite seu Telefone' maxlength='11' required>
            </label>
            <label for='senha'>
              <span>Senha</span>
              <input type='password' id='senha' name='txtsenha' placeholder='Digite sua senha' maxlength='64' required>
            </label>
            <label for='csenha'>
              <span>Confirmar Senha</span>
              <input type='password' id='csenha' name='txtcsenha' placeholder='Confirme sua senha' maxlength='64' required>
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
            <input type='submit' value='Cadastrar' id='button'>
            <a class='conta' href='../loginhtml.php'>Já Possui uma Conta? Faça login</a>
            <a class='conta' href='../PHP_CLIENTE/cadastrohtml.php'>É uma pessoa fisica? Cadastre-se aqui</a>
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