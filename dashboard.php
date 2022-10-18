<!-- <?php
    // session_start();

    // if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
    //     require("acoes/conexao.php");
        
    //     $usuTipo = $_SESSION["usuario"][1];
    //     $usuNome = $_SESSION["usuario"][0];
    // }else{
    //     echo "<script>window.location = 'index.html'</script>";
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($usuTipo); ?>
        <table>
            <thead>
                <tr>
                    <td>Produto</td>
                    <td>Preço</td>
                    <td>Tamanho</td>
                    <td>Descrição</td>
                    <td>Categoria</td>
                </tr>
            </thead>
            <tbody>
                <?php
                //     $query = conexao -> prepare("SELECT * FROM produtos");
                //     $query -> execute();

                //     $produtos = query -> fetchAll(PDO::FETCH_ASSOC);

                //     for($i = 0; $i < sizeof($produtos); $i++);
                //         $usuarioAtual = $produtos[$i];
                // ?>
                // <tr>
                //     <td><?php echo $usuarioA["proNome"] ?></td>
                //     <td><?php echo $usuarioA["proPreco"] ?></td>
                //     <td><?php echo $usuarioA["proTamanho"] ?></td>
                //     <td><?php echo $usuarioA["proDescricao"] ?>nho</td>
                //     <td><?php echo $usuarioA["cat_Id"] ?></td>
                // </tr>
                // <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="acoes/logout.php">Sair</a>
</body>
</html> -->