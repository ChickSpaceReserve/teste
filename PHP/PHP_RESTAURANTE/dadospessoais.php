<?php
session_start();
include "../conexao.php";
include "../protecao.php";

$cnpj = $_SESSION['CNPJ'];

$sql_restaurante = "SELECT * FROM RESTAURANTE WHERE CNPJ_RESTAURANTE = $cnpj";
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $imagem = $_FILES['imagem'];

  if ($imagem['error'] == 0) {

    $unlink = preg_replace("/PHP\/PHP_RESTAURANTE\//","",$restaurante['IMAGEM_PERFIL_RESTAURANTE']);
    if (file_exists($unlink)) {
        unlink($unlink);
    }

      $ext = explode(".",$imagem['name']);
      $ext = strtolower(end($ext));

      $folder = "FOTO_PERFIL/";
      if (!file_exists($folder)) {
          mkdir($folder,0777,true);
      }

      $filename = time() . "_" . bin2hex(random_bytes(8)) . "." .$ext;
      $destination = $folder . $filename;
      $joga = "PHP/PHP_RESTAURANTE/" . $folder . $filename;

      $query = "UPDATE RESTAURANTE SET IMAGEM_PERFIL_RESTAURANTE='$joga' WHERE CNPJ_RESTAURANTE = $cnpj";
      mysqli_query($conn, $query);

      move_uploaded_file($imagem['tmp_name'],$destination);

      header("Location: dadospessoais.php");
  } else {
    $unlink = preg_replace("/PHP\/PHP_RESTAURANTE\//","",$restaurante['IMAGEM_PERFIL_RESTAURANTE']);
    if (file_exists($unlink)) {
        unlink($unlink);
    }
      $query = "UPDATE RESTAURANTE SET IMAGEM_PERFIL_RESTAURANTE=null WHERE CNPJ_RESTAURANTE = $cnpj";
      mysqli_query($conn, $query);
  }
}

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
<title>Dados pessoais - <?= $nome ?></title>
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
      <section class='dados-pessoais'>
      <form method="post" enctype="multipart/form-data">
          <label for="input"><div class="buttons-img"><img src="<?=$restaurante['IMAGEM_PERFIL_RESTAURANTE'] ? ROOT . $restaurante['IMAGEM_PERFIL_RESTAURANTE'] : '../../IMAGENS/add.png' ;?>"></div></label>
          <input type="file" name="imagem" id="input" accept="image/*" onchange="display(this.files[0])">
          <br>
          <div class="buttons">
            <button class='buttons-link' type="submit">Enviar imagem</button>
          </div>
        </form>
        <script>
        function display(imagem){
            const allowed = ['jpeg','png','jpg','webp'];
            let ext = imagem['name'].split('.').pop();
            if (!allowed.includes(ext.toLowerCase())) {
                alert("Formato não suportado");
                document.querySelector("#input").value = null;
                return;
            }
            
            
            document.querySelector(".buttons-img img").src = URL.createObjectURL(imagem);
        }
        </script>
        <form>
          <div class='dados-container'>
            <div>
              <label for='nome'>
                <span>Nome</span>
                <input type='text' id='nome' value='<?= $nome ?>' class='texto-tamanho' readonly>
              </label>
              <label for='cnpj'>
                <span>CNPJ</span>
                <input type='text' id='cnpj' value='<?= $cnpj ?>' class='texto-tamanho' readonly>
              </label>
              <label for='telefone'>
                <span>Telefone</span>
                <input type='text' id='telefone' value='<?= $telefone ?>' class='texto-tamanho' readonly>
              </label>
              <label for='tipo'>
                <span>Tipo de restaurante</span>
                <input type='text' id='tipo' value='<?= $tipo ?>' class='texto-tamanho' readonly>
              </label>
              <label for='estilo'>
                <span>Estilo de Comida</span>
                <input type='text' id='estilo' value='<?= $estilo ?>' class='texto-tamanho' readonly>
              </label>
              <label for='email'>
                <span>E-mail</span>
                <input type='email' id='email' value='<?= $email ?>' class='texto-tamanho' readonly>
              </label>
            </div>
            <div>
              <label for='uf'>
                <span>UF</span>
                <input type='text' id='uf' value='<?= $uf ?>' class='texto-tamanho' readonly>
              </label>
              <label for='cep'>
                <span>CEP</span>
                <input type='text' id='cep' value='<?= $cep ?>' class='texto-tamanho' readonly>
              </label>
              <label for='cidade'>
                <span>Cidade</span>
                <input type='text' id='cidade' value='<?= $cidade ?>' class='texto-tamanho' readonly>
              </label>
              <label for='bairro'>
                <span>Bairro</span>
                <input type='text' id='bairro' value='<?= $bairro ?>' class='texto-tamanho' readonly>
              </label>
              <label for='logradouro'>
                <span>Logradouro</span>
                <input type='text' id='logradouro' value='<?= $logradouro ?>' class='texto-tamanho' readonly>
              </label>
            </div>
          </div>
          <div class='restaurante-add-image'>
          <form method="post" enctype="multipart/form-data" onsubmit="send_form(event)">
          <label for="input2">Carregar imagem</label>
            <input type="file" id="input2" accept="image/*" onchange="display_images(this.files)" multiple>
            <div class="holder">
              

            </div>
            <button onclick="send_form(event)">Enviar</button>
          </form>
          <script>
        let attempts = 0;
        let images = {};
        function display_images(files){

            const input = document.querySelector("#input2");
            const holder = document.querySelector(".holder");

            if (attempts >= 5 || parseInt(attempts) + parseInt(files.length) > 5) {
                alert("Limite de 5 arquivos");
                input.value = null;
                return;
            }

            for (let i = 0; i < files.length; i++) {
                let random = (Math.random() + 1).toString(36).substring(2);
                let img = document.createElement("img");
                img.src = URL.createObjectURL(files[i]);
                img.setAttribute("deleteID",random);
                img.setAttribute('onclick','delete_image(this)');
                holder.prepend(img);

                images[random] = files[i];

                attempts++;
            }

            input.value = null;
        }

        function send_form(e){
            e.preventDefault();

            let form = new FormData();

            let z = 1;
            for (key in images) {
                form.append("image"+z,images[key]);
                z++;
            }

            let ajax = new XMLHttpRequest;

            ajax.addEventListener('readystatechange',function (e){
                if (ajax.readyState == 4 && ajax.status == 200) {
                    handle_result(ajax.responseText);
                }
            });

            ajax.open('post','enviaimagens.php',true);
            ajax.send(form);
        }

        function handle_result(result){
            alert(result);
            console.log(result);
        }

        function delete_image(element){
            element.remove();
            delete images[element.getAttribute('deleteID')];
            attempts--;
        }
    </script>
          </div>
          <div class='buttons'>
            <a href='editarperfil.php' class='buttons-link'>Editar Perfil</a>
            <a href='excluirperfil.php' class='buttons-link'>Excluir</a>
            <a href='../sair.php' class='buttons-link'>Logout</a>
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
<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href);
  }
</script>
</html>