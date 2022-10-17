<?php
	include("conexao.php");
	$sql = "SELECT * FROM produto2";
	$consulta = mysqli_query($conn,$sql) or die (mysqli_error()); //executa o SQL
	
	//prepara a tabela para organizar os dados
	echo '<br><table border="1" align="center">
	  <tr>
	  	 <td><b>CodProd </b></td>
		 <td><b>Descricao </b></td>			
	  	 <td><b>Detalhes </b></td>
	  	 <td><b>PrecoUnit </b></td>
	</tr>';
	
	//se a consulta tiver retornado um numero de linhas > 0
	if(mysqli_num_rows($consulta)>0){
		//imprime os campos da tabela produto achados pela consulta
		while($campo = mysqli_fetch_array($consulta)){
			echo '<tr>
				  <td>'.$campo["CodProd"].'</td>
				  <td>'.$campo["Descricao"].'</td>
				  <td>'.$campo["Detalhes"].'</td>
  				  <td>'.$campo["PrecoUnit"].'</td>';
		}
	}
	echo '</tr> </table>'; //fecha a tabela
	mysqli_close($conn); //fecha a conex�o
?>

