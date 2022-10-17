<?php
session_start();
// se não tiver uma sessão codCli ou adm criada, redireciona para a página de login
if (empty($_SESSION["codCli"]) || empty($_SESSION["adm"])) {
echo ("<script>parent.document.location='principal.php?pagina=login';</script>");
}
else{
//caso contrário armazena na variável a ação do formulário, no caso inserir_produto.php
$acao = "inserir_produto.php";
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Produtos</title>
<style type="text/css">
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
</style>
</head>
<form action="<?php echo $acao; ?>" method="post" enctype="multipart/form-data">
 <p>
 <input type="hidden" name="codprod" value="<?php echo $codprod; ?>">
 </p>
 <table width="609" border="1" align="center">
 <tr>
 <td width="124" bgcolor="#CCFFFF"></td>
 <td width="469" bgcolor="#CCFFFF"><strong>CADASTRO DE PRODUTOS</strong></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"><span class="style1">Descrição</span>: </td>
 <td bgcolor="#CCFFFF"><input name="descricao" size=75 value=""></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"><span class="style1">Preço Unit.:</span></td>
 <td bgcolor="#CCFFFF"><input name="precoUnit" size=10 value=""></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"><span class="style1">Promoção:</span></td>
 <td bgcolor="#CCFFFF"><input name="promocao" size=10 value=""></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"><span class="style1">Estoque:</span></td>
 <td bgcolor="#CCFFFF"><input name="estoque" size=10 value=""></td>
 </tr>
 <tr>
 <td height="138" bgcolor="#CCFFFF"><span class="style1">Detalhes:</span></td>
 <td bgcolor="#CCFFFF"><textarea name="detalhes" cols="50" rows="8"></textarea></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"><span class="style1">Foto:</span></td>
 <td bgcolor="#CCFFFF"><input name="foto" type="file" size=65></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"></td>
 <td bgcolor="#CCFFFF"><input type="submit" value="Cadastrar"></td>
 </tr>
 <tr>
 <td bgcolor="#CCFFFF"></td>
 <td bgcolor="#CCFFFF"><?php if(!empty($_REQUEST["msg"])){$msg = $_REQUEST["msg"]; echo $msg;} else{echo "";} ?></td>
 </tr>
 </table>
</form>
