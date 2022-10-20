<?php

    Class Conexao{
        private $server = "10.67.22.216";
        private $usuario = "s221_tcc_g1_us";
        private $senha = "delv220809";
        private $banco = "s221_tcc_g1_bd";

        // private $server = "127.0.0.1";
        // private $usuario = "root";
        // private $senha = "";
        // private $banco = "busca_food";

        public function conectar(){
            try{
                $conexao = new PDO("mysql:host=$this->server;dbname=$this->banco", $this->usuario, $this->senha);
                $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $erro){
                //echo "Ocorreu um erro de conexão: {$erro -> getMessage()}";
                $conexao = null;
            }

            return $conexao;
        }
    };
   
?>