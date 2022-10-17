<?php
session_start(); //inicializa a sessão
$total = 0; //variável de controle

//Função mysqli_result
function mysqli_result($search, $row, $field){
	$i=0; 
	while($results=mysqli_fetch_array($search)){
	if ($i==$row){
		$result=$results[$field];
	}
		$i++;
	}
	return $result;
} 

if (empty($_SESSION["codCli"])) //se NÃO existir uma sessao chamada codCli
	//redireciona p/ a página de login
	echo "<script>parent.document.location='principal.php?pagina=login';</script>";

else if(!empty($_SESSION["carrinho"])) {
	include("conexao.php");
	$codCli = $_SESSION["codCli"]; //lê o código do cliente armazenado na sessão
	$hoje = date("y/m/d"); //pega a data de hoje
	
	//insere os dados na tabela de VENDAS
	$sql = "INSERT INTO venda2(codCli,Data) VALUES(".$codCli.",'".$hoje."')" ;
	$consulta = mysqli_query($conn,$sql); //executa o SQL
	$codVenda = mysqli_insert_id($conn); //obtém o codigo da venda
	
	//-------------- Le as informacões armazenadas na sessão-----------------------------------
	$carrinho = $_SESSION["carrinho"]; //armazena as informações da sessão em um vetor carrinho
	$codigos = $carrinho[0]; //armazena no vetor $codigos todos os pedidos para o mesmo codPed
	$qtdes = $carrinho[1]; //armazena no vetor $qtdes a quantidade pedida de um mesmo produto
	//-----------------------------------------------------------------------------------------
		
	for ($a=0;$a<count($codigos);$a++) { //varre o vetor que armazena o codigo dos produtos comprados
		// obter preço atual
		$sql = "SELECT PrecoUnit FROM produto2 WHERE CodProd=".$codigos[$a];
		$consulta = mysqli_query($conn,$sql); //executa o SQL
		
		$preco = mysqli_result($consulta, 0, 'PrecoUnit'); //obtem o preço
		
		// registar as informações da sessão em itens_venda
		$sql = "INSERT INTO itens2 (codvenda, codprod , quant) VALUES(".$codVenda.",".$codigos[$a]. ",".$qtdes[$a].")";
		$consulta = mysqli_query($conn,$sql); //executa o SQL
		
		$total = $total + ($preco * $qtdes[$a]); //soma os precos e quantidades de produtos vendidos
	}
	//grava o total na tabela VENDA
	$sql = "UPDATE venda2 SET total=".$total." WHERE CodVenda = ".$codVenda;
	$consulta = mysqli_query($conn,$sql); //executa o SQL
		
	mysqli_close($conexao); //fecha a conexão
	session_destroy(); //destrói a sessão

	//redireciona para uma página que exibirá o relatório (nota fiscal) da venda
	echo "<script>location='exibir_pedido.php?codVenda=$codVenda';</script>";
}
?>