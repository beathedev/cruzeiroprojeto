<?php
    $conexao = mysqli_connect('127.0.0.1','root','','cadastro');

    $vnome = $_POST['nome'];
    $vcpf = $_POST['cpf'];
    $vemail = $_POST['email'];
    $vsenha = md5($_POST['senha']);
    $vdata = $_POST['data'];
    $vtell = $_POST['telefone'];

    $erro = false;

    $result_busca = "SELECT * FROM cliente WHERE cpf = '$vcpf'";
    $resultado_busca = mysqli_query($conexao,$result_busca);

    if(($resultado_busca) AND ($resultado_busca -> num_rows != 0)){
        $erro = true;
    }
    $result_busca = "SELECT * FROM cliente WHERE email = '$vemail'";
    $resultado_busca = mysqli_query($conexao,$result_busca);

    if(($resultado_busca) AND ($resultado_busca -> num_rows != 0)){
        $erro = true;
    }
    $result_busca = "SELECT * FROM cliente WHERE telefone = '$vtell'";
    $resultado_busca = mysqli_query($conexao,$result_busca);

    if(($resultado_busca) AND ($resultado_busca -> num_rows != 0)){
        $erro = true;
    }

    if(!$erro){
        $query = mysqli_query($conexao, "INSERT INTO cliente (nome,cpf,email,senha,data_de_nascimento,telefone) VALUES ('$vnome','$vcpf','$vemail','$vsenha','$vdata','$vtell')");

        if($query){
            $result_login = "SELECT * FROM cliente WHERE email = '$vemail' AND senha = '$vsenha'";
            $resultado_login = mysqli_query($conexao,$result_login);

            if(($resultado_login) AND ($resultado_login -> num_rows != 0)){
                
                $resultado_array = mysqli_fetch_array($resultado_login);
                $idlogin = $resultado_array['id'];
        
                echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/cruzeiroprojeto-main/perfil.php?id=$idlogin'>";
                
            }
        }
    }
    else{
        echo "Usuario ja Cadastrado!";
    }
?>