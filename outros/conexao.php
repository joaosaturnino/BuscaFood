<?php
$host = '10.67.22.216';
$usuario = 's221';
$senha = '123456';
$bd = 's221';

    $conn = @mysqli_connect ($host, $usuario, $senha, $bd);

    if($conn)
    {
        $banco = @mysqli_select_db($conn, $bd);        
    }
    else
    {
        
        print('Erro! Conexão não realizada!');
    }

?>