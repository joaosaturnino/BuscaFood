<?php session_start(); ?>
<a href="principal.php?pagina=listar_produtos" target="main">Consultar Produtos</a> <br>
<a href="principal.php?pagina=carrinho_compra" target="main">Carrinho de Compras</a> <br>
<?php 
if(empty($_SESSION["codCli"])) { ?>
<a href="principal.php?pagina=cadastrar_cliente" target="main">Cadastrar Cliente</a> <br>
<a href="login.php" target="main">Login</a> <br>
<?php } 
else { ?>
<a href="principal.php?pagina=fechar_pedido" target="main">Fechar Pedido</a> <br>
<a href="logout.php" target="main">Logout</a> <br>
<?php } ?>
<?php 
if(!empty($_SESSION["adm"])) { ?> <hr>
<a href="principal.php?pagina=cadastrar_produto" target="main">Cadastrar Produto</a> <br>
<a href="principal.php?pagina=relatorio_clientes" target="main">Relatório de Clientes</a> <br>
<a href="principal.php?pagina=relatorio_produtos" target="main">Relatório de Produtos</a> <br>
<a href="principal.php?pagina=relatorio_vendas" target="main">Relatório de Vendas</a>
<?php } ?>
