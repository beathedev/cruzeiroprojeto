<?php
    $conexao = mysqli_connect('127.0.0.1','root','','cadastro');

    session_start();
    ob_start();

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $tell = $_POST['telefone'];

    $result_usuario = "UPDATE cliente SET 
    nome = '$nome',cpf = '$cpf',email = '$email',data_de_nascimento = '$data',telefone = '$tell'
    WHERE id = '$id'";

    $resultado_usuario = mysqli_query($conexao, $result_usuario);

    if($resultado_usuario){


        $result_busca = "SELECT * FROM cliente WHERE email = '$email'";
        $resultado_busca = mysqli_query($conexao,$result_busca);

        if(($resultado_busca) AND ($resultado_busca -> num_rows != 0)){
            
            $resultado_array = mysqli_fetch_array($resultado_busca);
            $idlogin = $resultado_array['id'];

            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/cruzeiroprojeto-main/perfil.php?id=$idlogin'>";
            
        }
    }

?>