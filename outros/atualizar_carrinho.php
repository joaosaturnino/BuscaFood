<?php
session_start(); //inicializa a sess�o
$qtdes = $_REQUEST["qtdes"]; //pega o valor da quantidade digitada pelo usu�rio
$carrinho = $_SESSION["carrinho"]; //resgata a sess�o carrinho
//Joga na posicao do vetor que armazena as quantidades a quantidade digitada na tela
$carrinho[1] = $qtdes;
$_SESSION["carrinho"] = $carrinho; //atualiza a sess�o carrinho com a nova quantidade
header("location:carrinho_compra.php"); //redireciona ao carrinho_compra.php
?>