<?php
//verifica se está vazia a variável página
if (empty($_REQUEST["pagina"])){
	$pagina = "listar_produtos";
}
else{
	$pagina = $_REQUEST["pagina"];
}
$pagina = $pagina.".php"; //concatena com a extensão .php



?>
<html>
<head><title>Pagina Principal</title></head>
<frameset cols="200, *">
<frame src="menu.php" noresize>
<frame src="<?php echo $pagina;?>" name="MAIN">
</frameset><noframes></noframes>
</html>
