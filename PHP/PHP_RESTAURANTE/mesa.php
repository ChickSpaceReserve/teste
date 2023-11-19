<?php
session_start();
include "../conexao.php";
include "../protecao.php";

$cnpj = $_SESSION['CNPJ'];

$sql_restaurante    = "SELECT * FROM RESTAURANTE WHERE CNPJ_RESTAURANTE = $cnpj";
$result_restaurante = mysqli_query($conn, $sql_restaurante);
$restaurante        = $result_restaurante->fetch_assoc();

$nome               = $restaurante['NOME_RESTAURANTE'];

$sql_mesa           = "SELECT * FROM MESA WHERE CNPJ_MESA = $cnpj";
$result_mesa        = mysqli_query($conn, $sql_mesa);

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
<link rel='stylesheet' href='../../CSS/mesas.css'>
<link rel='stylesheet' href='../../CSS/header.css'>
<title>Mesas - <?= $nome ?></title>
</head>
<body>

<header class='cabecalho'>
  <div></div>
  <a href='../../index.php'><img class='cabecalho-imagem' src='../../IMAGENS/logo.png'></a>
  <div></div>
</header>

<main>
  <div class='containe'>
    <h1>Dados pessoais</h1>
    <nav>
      <ul>
        <li><a href='dadospessoais.php'>Dados Pessoais</a></li>
        <li><a href='mesa.php'>Mesas</a></li>
      </ul>
    </nav>
    <a href='cadastrarmesahtml.php'>
      <div class='restaurante-add'>
        <div class='adicionar-restaurante'>
          <img class='add' src='../../IMAGENS/add.png'>
        </div>
      </div>
    </a>
    <?php while($mesa = mysqli_fetch_assoc($result_mesa)){ ?>
      <div class='restaurante'>
        <div class='informacoes-restaurante'>
          <h2 class='nome-restaurante'>Numero da Mesa: <?= $mesa['N_DA_MESA']; ?></h2>
          <p class='descricao'>Descrição da mesa:      <?= $mesa['DESCRICAO_MESA']; ?></p>
          <p class='descricao'>Numero de lugares:      <?= $mesa['N_DE_LUGARES']; ?></p>
          <p class='disponibilidade'>Disponibilidade:  <?= $mesa['DISPONIBILIDADE']; ?></p>
          <div class='buttons-editar'>
            <form action="editarmesahtml.php" method="post">
              <input type='hidden' id='id' value='<?= $mesa['ID_MESA']; ?>' name='txtid' required>
              <input type='submit' value='Editar mesa' id='button'>
            </form>
            <form action="excluirmesa.php" method="post">
              <input type='hidden' id='id' value='<?= $mesa['ID_MESA']; ?>' name='txtid' required>
              <input type='submit' value='Excluir' id='button'>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
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