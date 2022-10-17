<?php
$codVenda = $_REQUEST["codVenda"]; //pega o parametro passado

include("conexao.php");

//seleciona a data da venda, o total, o frete e os dados do cliente
$sql = "SELECT V.data, V.total, V.frete, C.nome, C.endereco, C.cidade, C.email ".
		"FROM venda2 V, cliente2 C ".
		"WHERE V.codcli = C.codcli AND V.codVenda = ".$codVenda;

$consulta = mysqli_query($conn,$sql); //executa o SQL
$campo = mysqli_fetch_array($consulta); //pega os campos da tabela

//imprime os campos consultados da tabela
echo " N. pedido: $codVenda";
echo " Data: ".$campo['data']."<br>";
echo " Total produtos: R$ ".$campo['total']."<br>";
echo " Frete: R$ ".$campo['frete']."<br>";
$t = $campo['total'] + $campo['frete'] ;
echo " Total: R$ $t <br>";

//seleciona o nome do produto, o preco, a quantidade e o subtotal da compra
$sql = "SELECT P.descricao, P.precoUnit, I.quant, P.precoUnit*I.quant subtotal ".
	"FROM produto2 P, itens2 I ".
	"WHERE P.codprod = I.codprod AND I.codVenda=".$codVenda;

$consulta = mysqli_query($conn,$sql); //executa o SQL

//entra num loop para imprimir todas as linhas da tabela que ele encontrar para esta compra
echo "<br> ----------------- Descrição da compra: ----------------- <br>";
while($campo2 = mysqli_fetch_array($consulta)) {
	echo $campo2["quant"]." unidades do produto: ".$campo2["descricao"]." - Preco: R$ ".$campo2["precoUnit"]." - Subtotal:
	R$ ".$campo2["subtotal"]."<br>";
}

echo "<br> ----------------- Dados para entrega: ----------------- <br>"; //imprime os dados do cliente
echo " Cliente: ".$campo['nome']."<br>";
echo " Endereco: ".$campo['endereco']."<br>";
echo " Cidade: ".$campo['cidade']."<br>"; 
echo " E-mail: ".$campo['email']."<br>";
?>