<?php
session_start(); //inicializa a sessao
$_SESSION["carrinho"]=null; //destroi a sessao
header("location:carrinho_compra.php"); //redireciona para o carrinho_compra.php
?>

