<?php
	include("conexao.php");
	
	//busca o codigo da venda, a data, o total e o nome do cliente
	$sql = "SELECT DISTINCT v.Codvenda, v.data, v.total, c.Nome ".
		   	"FROM cliente2 c, venda v , itens i ".
		   	"WHERE v.CodCli = c.CodCli and i.codvenda = v.Codvenda " ;
				
	$consulta = mysqli_query($conn,$sql); //executa o SQL
	
	//se o retorno da consulta for > 0, houve registros encontrados
	if(mysqli_num_rows($consulta) > 0) {
		
		echo '<br><table border="1" align="center">';//abre uma tabela
		
		//busca os campos do BD da pesquisa SQL acima	   
		while($campo = mysqli_fetch_array($consulta)) {

			//monta a tabela com o cabeçalho das informações da venda
			echo '<tr>
				 <td bgcolor="#E1E1FF"><b>Codigo da Compra </b></td>
			 	 <td bgcolor="#E1E1FF"><b>Codigo do Cliente </b></td>			
				 <td bgcolor="#E1E1FF"><b>Data </b></td>
 				 <td bgcolor="#E1E1FF"><b>Total </b></td>
				 </tr>';
				
			//imprime aqui os campos sobre a venda	
			echo '<tr>
				  <td>'.$campo["Codvenda"].'</td>
				  <td>'.$campo["Nome"].'</td>
				  <td>'.$campo["data"].'</td>
  				  <td>'.$campo["total"].'</td>';
	 	
			//para cada venda acima pega pelo $campo["Codvenda"], busca a quantidade e o nome do produto
			$sql2 = "SELECT DISTINCT i.quant, p.Descricao, p.PrecoUnit ".
					"FROM itens i, venda v, produto p ".
					"WHERE i.Codvenda=".$campo["Codvenda"]." and i.codprod = p.CodProd";
		
			$consulta2 = mysqli_query($conn,$sql2); //executa o SQL
	
			//se o retorno da consulta for > 0, houve registros encontrados
			if(mysqli_num_rows($consulta2) > 0) {
				//monta a tabela com o cabeçalho dos itens vendidos (itens que compoem a compra)	  
			 	echo '<tr>
					 <td><b>Quantidade </b></td>
					 <td><b>Produto </b></td>	
					 <td><b>Preco </b></td>	
					 <td><b>Subtotal </b></td>	
		 			 </tr>';
		 		//busca os campos do BD da pesquisa SQL acima
			 	while($campo2 = mysqli_fetch_array($consulta2)) {
			 	//imprime a quantidade e o nome dos produtos comprados na mesma venda
				$subtotal = $campo2["PrecoUnit"] * $campo2["quant"];
			 	echo '<tr>
					  <td>'.$campo2["quant"].'</td>
					  <td>'.$campo2["Descricao"].'</td>
					  <td>'.$campo2["PrecoUnit"].'</td>
					  <td>'.$subtotal.'</td>';
			}
	  	 }
	   }
	 }		
	else {
		?> <script>alert("Nenhum registro localizado");</script><?php 
	} 
	echo '</tr></table>'; //fecha a tabela
	mysqli_close($conn); //fecha a conexão
?>

