<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();
    include "../conexao.php";
    include "../protecao.php";

    $cnpj = $_SESSION['CNPJ'];

    $images = $_FILES;

    $query = "UPDATE RESTAURANTE SET ";

    $z = 1;
    $params = [];
    foreach ($images as $imagem) {
        if ($imagem['error'] == 0) {
    
            $ext = explode(".",$imagem['name']);
            $ext = strtolower(end($ext));
    
            $folder = "FOTO_RESTAURANTE/";
            if (!file_exists($folder)) {
                mkdir($folder,0777,true);
            }
    
            $filename = time() . "_" . bin2hex(random_bytes(8)) . "." .$ext;
            $destination = $folder . $filename;
            $joga = "PHP/PHP_RESTAURANTE/" . $folder . $filename;
    
            $params[] .= "IMAGEM_RESTAURANTE_$z='$joga'";
            
            move_uploaded_file($imagem['tmp_name'],$destination);
            
            $z++;
        }
    }  
    $query .= implode(' , ',$params);
    $query .= " WHERE CNPJ_RESTAURANTE = '$cnpj';";
    
    mysqli_query($conn, $query);
}