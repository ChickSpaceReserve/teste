<?php
session_start();

if(!empty($_SESSION['CPF']) || !empty($_SESSION['CNPJ'])) {
    header("refresh: 0; url=../index.php");

}
?>

