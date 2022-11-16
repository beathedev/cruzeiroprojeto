<?php
    $conexao = mysqli_connect('127.0.0.1','root','','cadastro');
    $busca=$_GET['id'];
    $result_id = "SELECT * FROM cliente WHERE id = '$busca'";
    $resultado_id = mysqli_query($conexao,$result_id);
    $rows_id = mysqli_fetch_assoc($resultado_id);

    session_start();
    ob_start();

    $dados_recebidos = "DELETE FROM cliente 
    WHERE id = '".$rows_id['id']."'";

    $dados_removidos = mysqli_query($conexao,$dados_recebidos);

    if($dados_removidos){
        echo "Dados Apagados com Sucesso!";
        echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://127.0.0.1/cruzeiroprojeto-main/index.html'>";
    }

?>