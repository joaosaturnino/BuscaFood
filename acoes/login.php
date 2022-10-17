<?php
    require("conexao.php");

    if(isset($_POST["usuEmail"]) && isset($_POST["usuSenha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT * FROM usuarios WHERE usuEmail = ? AND usuSenha = ?");
        $query->execute(array($_POST["usuEmail"], $_POST["usuSenha"]));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["usuNome"], $user["usuTipo"]);

            echo json_encode(array("erro" => 0));
        }else{
            echo json_encode(array("erro" => 1, "mensagem" => "Email e/ou senha incorretos"));
        }
    }else{
        echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor"));
    }
?>