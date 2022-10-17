<?php
session_start();
$pagina = "login";

if (!empty($_REQUEST["usuario"]) && !empty($_REQUEST["senha"])) {
	$usuario = $_REQUEST["usuario"];
	$senha = $_REQUEST["senha"];
	
	include("conexao.php");
	$sql = "SELECT codCli,usuario,tipo FROM cliente2 WHERE usuario='".$usuario."' AND senha='".$senha."'";
	$resultado = mysqli_query($conn,$sql);
	$linha = mysqli_fetch_array($resultado);
	
	if($linha) {
		$_SESSION["codCli"] = $linha["codCli"];
		$_SESSION["usuario"] = $linha["usuario"];
		$_SESSION["adm"] = $linha["tipo"];
		if(empty($_SESSION["carrinho"]))
			$pagina = "listar_produtos";
		else	
			$pagina = "carrinho_compra";
	}
	mysqli_close($conexao);
}
echo "<script>parent.document.location='principal.php?pagina=".$pagina."';</script>";
?>