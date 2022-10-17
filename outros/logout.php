<?php
session_start();
$_SESSION["carrinho"] = null;
$_SESSION["codCli"] = null;
$_SESSION["adm"] = null;
session_destroy();
echo("<script>parent.document.location='principal.php';</script>");
?>