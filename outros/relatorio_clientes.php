<?php
	include("conexao.php");
	$sql = "SELECT * FROM cliente2 ";
	$consulta = mysqli_query($conn,$sql) or die (mysqli_error()); //executa o SQL
	
	//prepara a tabela para organizar os dados
	echo '<br><table border="1" align="center">
	  <tr>
	  	 <td><b>Nome </b></td>
		 <td><b>Endereco </b></td>			
	  	 <td><b>Cidade </b></td>
	  	 <td><b>Email </b></td>
	</tr>';
	
	//se a consulta tiver retornado um numero de linhas > 0
	if(mysqli_num_rows($consulta)>0){
		//imprime os campos da tabela cliente achados pela consulta
		while($campo = mysqli_fetch_array($consulta)){
			echo '<tr>
				  <td>'.$campo["Nome"].'</td>
				  <td>'.$campo["Endereco"].'</td>
				  <td>'.$campo["Cidade"].'</td>
  				  <td>'.$campo["Email"].'</td>';
		}
	}
	echo '</tr> </table>'; //fecha a tabela
	mysqli_close($conn); //fecha a conex�o
?>

