<?php
    require("conexao.php");

    if(isset($_POST["usuEmail"]) && isset($_POST["usuSenha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE usuEmail = ? AND usuSenha = ?");
        $query->execute(array($_POST["usuEmail"], $_POST["usuSenha"]));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["usuNome"], $user["usuTipo"]);

            echo "<script>window.location = '../home.php'</script>";
        }else{
            echo "<script>window.location = '../index.html'</script>";
        }
    }else{
        echo "<script>window.location = '../index.html'</script>";
    }
?>