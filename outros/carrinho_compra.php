<?php
session_start(); //inicializa a sessão
echo "</br></br>";
if(empty($_SESSION["carrinho"])) { //verifica se a sessão carrinho foi criada
echo "Seu carrinho está vazio!";
}
else {
$carrinho = $_SESSION["carrinho"]; //joga as informações da sessão num vetor carrinho
$codigos = $carrinho[0]; //lerá os codigos dos produtos comprados
$qtdes = $carrinho[1]; //lerá a quantidade de cada produto comprado
echo "<form action=atualizar_carrinho.php>";
$total = 0;
include("conexao.php");
//tabela onde aparecererá a cesta de compras
echo '<br><table border="1" align="center">
 <tr>
 <td><b>Código </b></td>
<td><b>Descrição </b></td>
 <td><b>Preço </b></td>
 <td><b>Quantidade </b></td>
 <td><b>X </b></td>
</tr>';
for($i=0;$i<count($codigos);$i++) { //percorre todos os produtos armazenado atravé dos seus códigos
$sql = "SELECT Descricao,PrecoUnit FROM produto2 WHERE codProd = $codigos[$i] ";
$consulta = mysqli_query($conn,$sql); //executa o SQL
$campo = mysqli_fetch_array($consulta); //obtém os campos que resultaram da consulta
//faz uma linha na tabela
echo '<tr> 
 <td>'.$codigos[$i].'</td>
 <td>'.$campo["Descricao"].'</td>
 <td>'.$campo["PrecoUnit"].'</td>
 <td><input size=2 name=qtdes[] value='.$qtdes[$i].'></td>
 <td><a href=remover_carrinho.php?codprod='.$codigos[$i].'>Remover</td>';
 // linha de cima: faz um link para remover passando como parâmetro o codigo do produto
 $total += $campo["PrecoUnit"]*$qtdes[$i]; //valor total é o preco unitario * a quantidade
}
//imprime o valor total da compra
echo '</tr>
<td colspan="5"><b>Total: R$ </b>'. str_replace(",",".",number_format($total,2)). '</td>
</tr>
</table>';
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><div align="center">
<form name="form1" method="post" action="atualizar_carrinho.php">
<input type=image src="atualizar.jpg" border=0 alt="atualizar valores">
</form>
<br>
<a href="listar_produtos.php">continuar comprando</a><br>
<a href="fechar_pedido.php">fechar pedido</a><br>
<a href="esvaziar_carrinho.php">esvaziar carrinho</a></div></p>
</body>
</html>