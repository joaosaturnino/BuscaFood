<?php
empty($_REQUEST["nome"])     ? $nome = ""     : $nome = $_REQUEST["nome"];
empty($_REQUEST["endereco"]) ? $endereco = "" : $endereco = $_REQUEST["endereco"];
empty($_REQUEST["email"])    ? $email = ""    : $email = $_REQUEST["email"];
empty($_REQUEST["cidade"])   ? $cidade = ""   : $cidade = $_REQUEST["cidade"];
empty($_REQUEST["usuario"])  ? $u = ""  	  : $u = $_REQUEST["usuario"];
empty($_REQUEST["senha"])    ? $s = ""    	  : $s = $_REQUEST["senha"];
empty($_REQUEST["senha2"])   ? $s2 = ""   	  : $s2 = $_REQUEST["senha2"];

if($nome=="" or $email=="" or $endereco=="" or $cidade=="" or $u=="" or $s==""){
	?> <script>	alert("Todos os campos devem ser preenchidos."); 
	document.location="cadastrar_cliente.php";
	</script><?php 
}

else if($senha!=$senha2) {
	?> <script>	alert("A confirmacao da senha nao confere."); 
	document.location="cadastrar_cliente.php";
	</script><?php 
}

else {

	include("conexao.php");
	$sql = "Select * from cliente2 where usuario = '".$u."'";
	$resultado = mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($resultado) > 0) {
		?> <script>	alert("Nome de usuario já cadastrado"); </script> <?php 
	}
	else {
	
		$sql = "Insert Into cliente2(nome,email,endereco,cidade,usuario,senha,tipo) ".
		"values ('".$nome. "','" .$email. "','".$endereco."','".$cidade."','".$u."','".$s."','')";
		
		if( mysqli_query($conn,$sql)){
			?> <script> alert("Cadastro efetuado com sucesso!"); </script><?php 
		}else{
			?> <script> alert("Erro ao cadastrar cliente"); </script><?php 
		}
	}
}
	mysqli_close($conn); 
?>