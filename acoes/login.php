<?php
    require("conexao.php");

    Class LoginAndCadastro{
        private $con = null;

        public function __construct($conexao){
            $this->con = $conexao;
        }

        public function send(){
            if(empty($_POST) || $this->con == null){
                echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor"));
                return;
            }

            switch(true){
                case (isset($_POST["usuEmail"]) && isset($_POST["usuSenha"]) && $conexao != null);
                    echo $this->login($_POST["usuEmail"], $_POST["usuSenha"]);
                    break;
            }
        }

        public function login($usuEmail, $usuSenha){
            $conexao = $this->con;

            $query = $conexao->prepare("SELECT * FROM usuarios WHERE usuEmail = ? AND usuSenha = ?");
            $query->execute(array($usuEmail, $usuSenha));

            if($query->rowCount()){
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

                session_start();
                $_SESSION["usuario"] = array($user["usuNome"], $user["usuTipo"]);

                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Email e/ou senha incorretos"));
            }
        }
    };

    $conexao = new Conexao;
    $classe = new LoginAndCAdastro($conexao->conectar());
    $classe->sen();
?>