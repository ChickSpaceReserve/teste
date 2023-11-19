<?php
session_start();
include "../conexao.php";
include "../protecao.php";

$id = $_POST['txtid'];

$sql    = "SELECT * FROM MESA WHERE ID_MESA = $id";
$result = mysqli_query($conn, $sql);
$mesa   = $result->fetch_assoc();

$nmesa    = $mesa['N_DA_MESA'];
$nlugares = $mesa['N_DE_LUGARES'];
$disp     = $mesa['DISPONIBILIDADE'];
$desc     = $mesa['DESCRICAO'];

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
<title>ChickSpace</title>
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
      <h1>Editar Mesa</h1>
        <form action='editarmesa.php' method='post' >
          <div class='dados-container'>
            <label for='id'>
              <input type='hidden' id='id' value='<?= $id ?>' name='txtid' required>
            </label>
            <label for='descricao'>
              <span>Descrição da mesa</span>
              <input type='text' id='descricao' value='<?= $desc ?>' name='txtdescricao' placeholder='Digite a descrição da mesa' maxlength='64' required>
            </label>
            <label for='disp'>
              <input type='hidden' id='disp' value='<?= $disp ?>' name='txtdisp' required>
            </label>
            <label for='nmesa'>
              <span>Número da mesa</span>
              <input type='number' id='nmesa' value='<?= $nmesa ?>' name='txtnmesa' placeholder='Digite o número da mesa' min='1' max='999' required>
            </label>
            <label for='nlugares'>
              <span>Número de lugares</span>
              <input type='number' id='nlugares' value='<?= $nlugares ?>' name='txtnlugares' placeholder='Digite o número de lugares' min='1' max='99' >
            </label>
            <input type='submit' value='Salvar alteração' id='button'>
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