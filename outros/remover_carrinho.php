<?php
session_start(); //inicializa a sessão
$codprod = $_REQUEST["codprod"]; //pega o codigo do produto passado por parâmetro

//se a sessão do carrinho NÃO estiver vazia
if(!empty($_SESSION["carrinho"]) && !empty($codprod)) {
	$carrinho = $_SESSION["carrinho"]; //pega as informações da sessão carrinho
	$codigos = $carrinho[0]; //lê os codigos dos produtos comprados
	$qtdes = $carrinho[1];   //lê a quantidade de cada produto comprado
	//procura a posicao do código do produto (codprod) que deseja apagar no vetor $codigos
	$pos = array_search($codprod,$codigos);
	
	//se ele achar uma posicao válida ele retorna a posicão inteira (0..n) senão ele retorna NULL
	//isempty() resolve para buscas que não precisam procurar pelo nro 0, no caso de vetor não dá para usar isempty
	if(is_int($pos)) {
		//apaga (unset) o conteudo da posicao requerida
		unset($codigos[$pos]);
		unset($qtdes[$pos]);
		//organiza (sort) novamente os vetores para nao ficar buraco
		sort($codigos);
		sort($qtdes);
	}
	//organizar o vetor carrinho, ao inves de apagar somente o item excluido
	//joga nulo em todo o vetor
	$carrinho = null;
	if (count($codigos)>0) {
		$carrinho[0] = $codigos;//e depois joga novamente os vetores organizados
		$carrinho[1] = $qtdes;
	}
	
	$_SESSION["carrinho"] = $carrinho; //joga a informação atualizada na sessão
}
header("location:carrinho_compra.php"); //redireciona para o carrinho de compras
?>

