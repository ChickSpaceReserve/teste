<?php
session_start();
include "conexao.php";

$cnpj_pagina = $_POST['txtcnpj'];

$sql_restaurante_pagina = "SELECT * FROM RESTAURANTE WHERE CNPJ_RESTAURANTE = '$cnpj_pagina'";
$result_pagina          = mysqli_query($conn, $sql_restaurante_pagina);
$restaurante_pagina     = $result_pagina->fetch_assoc();

$nome       = $restaurante_pagina['NOME_RESTAURANTE'];
$decricao   = $restaurante_pagina['DESCRICAO_RESTAURANTE'];

$sql_mesa_pagina    = "SELECT * FROM MESA WHERE CNPJ_MESA = '$cnpj_pagina' AND DISPONIBILIDADE = 'Disponível'";
$result_mesa_pagina = mysqli_query($conn, $sql_mesa_pagina);

$imagemperfil = '';

if(!empty($_SESSION['CPF'])){

$cpf = $_SESSION['CPF'];
    
$sql_cliente = "SELECT * FROM CLIENTE WHERE CPF_CLIENTE = '$cpf'";
$result      = mysqli_query($conn, $sql_cliente);
$cliente     = $result->fetch_assoc();
    
$nomeuser     = $cliente['NOME_CLIENTE'];
$imagemperfil = $cliente['IMAGEM_PERFIL_CLIENTE'];
    
$link = "PHP_CLIENTE/dadospessoais.php";
         
} if(!empty($_SESSION['CNPJ'])) {
    
$cnpj = $_SESSION['CNPJ'];
$sql_restaurante = "SELECT * FROM RESTAURANTE WHERE CNPJ_RESTAURANTE = '$cnpj'";
$result          = mysqli_query($conn, $sql_restaurante);
$restaurante     = $result->fetch_assoc();
      
$nomeuser        = $restaurante['NOME_RESTAURANTE'];
$imagemperfil    = $restaurante['IMAGEM_PERFIL_RESTAURANTE'];
    
$link = "PHP_RESTAURANTE/dadospessoais.php"; 
    
} if (empty($_SESSION['CPF']) && empty($_SESSION['CNPJ'])){
    
$nomeuser = "login";
$link     = "loginhtml.php";
    
}
    
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<script type='module' src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/all.css'/>
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Playfair:opsz,wght@5..1200,300&display=swap' rel='stylesheet'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' integrity='sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==' crossorigin='anonymous' referrerpolicy='no-referrer' />
<link rel='stylesheet' href='../CSS/header.css'>
<link rel='stylesheet' href='../CSS/footer.css'>
<link rel='stylesheet' href='../CSS/mesas.css'>
<link rel='stylesheet' href='../CSS/restaurante.css'>
<link rel='shortcut icon' href='../IMAGENS/logo.png' type='image/x-icon'>
<title>Restaurante - <?= $nome ?></title>
</head>
<body>
<header class='cabecalho'>
    <a href='../index.php'><img class='cabecalho-imagem' src='../IMAGENS/logo.png'></a>
    <div class='container'>
        <div class='search'>
            <form action='../HTML/pesquisa.html' method='post'>
                <input class='input-header' type='text' placeholder='Pesquisar...'>
                <button class='icon'><ion-icon name='search-outline'></ion-icon></button>
            </form>
        </div>
    </div>
    <a href=' <?= $link ?>'>
        <button class='cabecalho-login'>
            <img src='<?= $imagemperfil ? ROOT . $imagemperfil : 'IMAGENS/login.png';?>'>
            <?= $nomeuser ?>
        </button>
    </a>
</header>

<main>
    <div class='wrapper'>
        <div class='slide-wrapper' data-slide='wrapper'>
            <button class='slide-nav-button slide-nav-previous fas fa-chevron-left' data-slide='nav-previous-button'></button>
            <button class='slide-nav-button slide-nav-next fas fa-chevron-right' data-slide='nav-next-button'></button>
            <div class='slide-list' data-slide='list'>
                <div class='slide-item' data-slide='item' data-index='0'>
                    <div class='slide-content'>
                        <img class='slide-image' src='../IMAGENS/MyFuckingComedyClub.jpeg' />
                    </div>
                </div>
                <div class='slide-item' data-slide='item' data-index='1'>
                    <div class='slide-content'>
                        <img class='slide-image' src='../IMAGENS/MyFuckingComedyClub2.jpg' />
                    </div>
                </div>
                <div class='slide-item' data-slide='item' data-index='2'>
                    <div class='slide-content'>
                        <img class='slide-image' src='../IMAGENS/MyFuckingComedyClub3.jpg' />
                    </div>
                </div>
                <div class='slide-item' data-slide='item' data-index='3'>
                    <div class='slide-content'>
                        <img class='slide-image' src='../IMAGENS/MyFuckingComedyClub4.jpg' />
                    </div>
                </div>
                <div class='slide-item' data-slide='item' data-index='4'>
                    <div class='slide-content'>
                        <img class='slide-image' src='../IMAGENS/MyFuckingComedyClub5.jpg' />
                    </div>
                </div>
            </div>
            <div class='slide-controls' data-slide='controls-wrapper'>
            </div>
        </div>
    </div>
    <script src='../JS/carrossel.js'></script>
    <script>
        initSlider({
            autoPlay: true,
            startAtIndex: 0,
            timeInterval: 5000,
        })
    </script>
    <div class='caixa'>
        <h1><?= $nome ?></h1>
        <p><?= $decricao ?></p>
    </div>
    <?php while($mesa = mysqli_fetch_assoc($result_mesa_pagina)){ ?>
        <div class='restaurante'>
            <div class='informacoes-restaurante'>
                <h2 class='nome-restaurante'>Mesa Número:  <?= $mesa['N_DA_MESA']; ?></h2>
                <p class='descricao'>Descrição da mesa:    <?= $mesa['DESCRICAO_MESA']; ?></p>
                <p class='descricao'>Numero de lugares:    <?= $mesa['N_DE_LUGARES']; ?></p>
                <div class='buttons-editar'>
                    <form action='reserva.php' method='post'>
                        <input type='hidden' id='id' value='<?= $mesa['ID_MESA']; ?>' name='txtid' required>
                        <input type='submit' value='Reservar Mesa' id='button'>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    
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