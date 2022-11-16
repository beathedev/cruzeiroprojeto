<?php
    $conexao = mysqli_connect('127.0.0.1','root','','cadastro');

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $result_login = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
    $resultado_login = mysqli_query($conexao,$result_login);

    if(($resultado_login) AND ($resultado_login -> num_rows != 0)){
        
        echo "achou";

        $resultado_array = mysqli_fetch_array($resultado_login);
        $idlogin = $resultado_array['id'];

        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/cruzeiroprojeto-main/perfil.php?id=$idlogin'>";
        
    }
    else{
        echo "Usuário não Encontrado!";
    }
?>