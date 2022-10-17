<table border="0" width="780px"><tr>
<?php


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

$qtde=9; 
$a=0; 


if ( empty($_REQUEST["pagina"]) ){ 
 	$pagina = 1;
}else{
	$pagina = $_REQUEST["pagina"]; 
}

include("conexao.php");


$sql = "SELECT codprod,descricao,precoUnit,foto FROM produto2 LIMIT ".($pagina-1)*$qtde.",".$qtde; 
	   
$consulta = mysqli_query($conn,$sql); 


while($campo = mysqli_fetch_array($consulta)){
	
	echo "<td align=center width=250><br><br>".
	
	"<img src=./fotos/".$campo["foto"]." border=0 height=120 width=120></a><br>".

	"<br><font color=blue><b>".$campo["descricao"]."</b></font><br>".
	
	"Por: R$ ".number_format($campo["precoUnit"],2,',','.')."<br>".
	
	"<a href=adicionar_carrinho.php?codprod=".$campo["codprod"].">Adicionar ao carrinho</a><br></td>";
	
	$a++;
	
	
	if($a % 3 == 0) echo "</tr><tr>"; 
}

	echo "</tr></table>";

	$sql = "SELECT count(CodProd) as cont FROM produto2"; 
	$consulta = mysqli_query($conn,$sql); 
	
	$total=mysqli_result($consulta, 0, 'cont');
	
	$paginas = ceil($total / $qtde); 
	for ($i=1;$i<=$paginas;$i++) {
		if ($i==$pagina) 
			echo $i." ";
		else
			echo "<a href=?pagina=".$i.">".$i."</a> "; 
	}
	mysqli_close($conn); 
?>