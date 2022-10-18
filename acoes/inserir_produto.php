<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");
        
        $usuTipo = $_SESSION["usuario"][1];
        $usuNome = $_SESSION["usuario"][0];
    }else{
			// fa�a o REQUEST (ou POST) de todos os seus campos de formulario:
			$proNome = $_REQUEST["proNome"];
			$proPreco = str_replace(",",".",$_REQUEST["proPreco"]); //troca , por . o padrao americano 
			$estoque   = $_REQUEST["estoque"];
			$detalhes  = $_REQUEST["detalhes"];
			$foto      = $_FILES["foto"]; //$_FILES para ler fotos
		
			if(!empty($descricao) && !empty($precoUnit)) { //se descricao nem precoUnit estiverem vazios
				include("conexao.php");
				$sql= "INSERT INTO produto2(Descricao,PrecoUnit,Promocao,Estoque,Detalhes,Situacao) ".
						"VALUES('".$descricao."',".$precoUnit.",".$promocao.",".$estoque.",'".$detalhes."','D')";
		
				
				$consulta = mysqli_query($conn,$sql);
		
				$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
				
				include("upload.php"); //neste ponto chama o arquivo para fazer o upload da foto
				
				mysqli_close($conexao); //fecha a conex�o
				
				//redireciona para a pagina de cadastro de produto mandando uma mensagem
				header("location:cadastrar_produto.php?msg=Produto cadastrado com sucesso!");
			}
		}
	
    
?>
