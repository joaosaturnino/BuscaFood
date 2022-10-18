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
			$proTamanho   = $_REQUEST["proTamanho"];
			$cat_Id  = $_REQUEST["cat_Id"];
			$proDescricao = $_REQUEST["proDescricao"];
			$proImagem      = $_FILES["proImagem"]; //$_FILES para ler fotos
		
			if(!empty($proNome) && !empty($proPreco)) { //se descricao nem precoUnit estiverem vazios
				include("conexao.php");
				$sql= "INSERT INTO produtos(proNome, proPreco, proTamanho, cat_Id, proDescricao, proImagem) ".
						"VALUES('".$proNome."',".$proPreco.",".$proTamanho.",".$cat_Id.",'".$proDescricao."','D')";
		
				
				$consulta = mysqli_query($conn,$sql);
		
				$codprod = mysqli_insert_id($conn); //pega o campo chave da tabela (vai ser usado em upload)
				
				include("./acoes/upload.php"); //neste ponto chama o arquivo para fazer o upload da foto
				
				mysqli_close($conexao); //fecha a conex�o
				
				//redireciona para a pagina de cadastro de produto mandando uma mensagem
				header("location:home.php?msg=Produto cadastrado com sucesso!");
			}
		}
	
    
?>