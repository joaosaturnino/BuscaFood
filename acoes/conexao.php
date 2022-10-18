<?php
    $server = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $banco = "busca_food";

    // $server = "10.67.22.216";
    // $usuario = "s221_tcc_g1_us";
    // $senha = "delv220809";
    // $banco = "s221_tcc_g1_bd";

    try{
        $conexao = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
        $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        //echo "Ocorreu um erro de conexão: {$erro -> getMessage()}";
        $conexao = null;
    }
    
?>