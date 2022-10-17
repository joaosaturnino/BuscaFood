<?php
session_start(); //inicializa a sessão
//armazena o codigo do produto passado como parâmetro
$codprod = $_REQUEST["codprod"];
//se a sessão do carrinho NÃO estiver vazia
if(!empty($_SESSION["carrinho"])) {
$carrinho = $_SESSION["carrinho"]; //resgata os valores da sessão e coloca numa variável vetor carrinho
$codigos = $carrinho[0]; //resgata os códigos de produtos armazenados previamente
$qtdes = $carrinho[1]; //resgata as quantidades de produtos armazenados previamente
$pos = -1; //variável de controle para estipular que ainda não existe o produto “X” no carrinho
for($i=0;$i<count($codigos);$i++) {
//testa se o codigo quem vem vindo é igual a um código que já está cadastrado
if($codigos[$i]==$codprod) 
$pos = $i; //pega a posição desse código
}
//se a posição é = -1, o código do produto é diferente
if($pos==-1) {
$itens = count($codigos);
$codigos[$itens] = $codprod; //armazena o código do produto no vetor códigos
$qtdes[$itens] = 1; //armazena a quantidade como 1
}
//se a posição nao é = -1, o produto “X” já estava lá, portanto soma-se +1
else { $qtdes[$pos] = $qtdes[$pos] + 1; }
}
else {
$codigos[0] = $codprod; //coloca o código do produto num vetor
$qtdes[0] = 1; //coloca a quantidade num vetor
}
//joga o vetor de codigos de produto na 1a. posição de outro vetor chamado carrinho[0]
$carrinho[0] = $codigos; 
//joga o vetor de quantidades de produto na 2a. posição do vetor chamado carrinho[1]
$carrinho[1] = $qtdes;
$_SESSION["carrinho"] = $carrinho; //joga o vetor carrinho dentro da seção (NO SERVIDOR WEB)
header("location:carrinho_compra.php"); //redireciona para o carrinho_compra.php
?>