<?php
    $conexao = mysqli_connect('127.0.0.1','root','','cadastro');
    $busca=$_GET['id'];
    $result_id = "SELECT * FROM cliente WHERE id = '$busca'";
    $resultado_id = mysqli_query($conexao,$result_id);
    $rows_id = mysqli_fetch_assoc($resultado_id);

    session_start();
    ob_start();

    $btneditar = filter_input(INPUT_POST, 'btneditar', FILTER_SANITIZE_STRING);

    if($btneditar){
        $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $erro = false;

        $dados_st = array_map('strip_tags',$dados_rc);
        $dados = array_map('trim',$dados_st);

        if(in_array('',$dados)){
            $erro = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Meu css -->
    <link rel="stylesheet" href="./css/edicao.css" />
    <title>APS2</title>
</head>

<body>
    
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bgNav">
            <a class="navbar-brand px-4" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <i class="bi bi-house"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Perfil <i class="bi bi-file-earmark-person"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login <i class="bi bi-box-arrow-in-right"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar.html">Cadastrar <i class="bi bi-pen"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        
        <div class="container-fluid">
            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                  <h2 class="h5 mb-3 mb-lg-0">
                    <a href="perfil.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a>
                    Voltar
                </h2>
                </div>
              
                <!-- Conteúdo principal -->
                <div class="row">
  
                  <!-- Lado esquerdo  -->
                  <div class="col-lg-12">

                    <form action="update.php" method="POST" enctype="multipart/form-data">
                   
                        <input type="hidden" name="id" value="<?php echo $rows_id['id'];?>">

                        <div class="card mb-4">
                            <div class="card-body">
                            
                                <h3 class="h3 mb-4">Suas Informações</h3>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nome Completo</label>
                                        <input type="text" name="nome" value="<?php echo $rows_id['nome'];?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">CPF</label>
                                        <input type="text" name="cpf" value="<?php echo $rows_id['cpf'];?>" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="<?php echo $rows_id['email'];?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Telefone</label>
                                        <input type="text" name="telefone" value="<?php echo $rows_id['telefone'];?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Endereço</label>
                                        <input type="text"  name="endereço" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Profissão</label>
                                        <input type="text"  name="profissao" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Senha</label>
                                        <input type="password" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Data de Nascimento</label>
                                        <input type="date" name="data" value="<?php echo $rows_id['data_de_nascimento'];?>" class="form-control">
                                    </div>
                                </div>

                                <div class="hstack gap-3">
                                    <!-- Botão salvar -->
                                    <button type="submit" name="btneditar" class="btn btn-primary btn-sm btn-icon-text">
                                    <i class="bi bi-save"></i> <span class="text">Salvar edição</span></a>

                                    <!-- Botão excluir -->
                                    <button type="button" class="btn bg-danger btn-sm btn-icon-text" 
                                    data-toggle="modal" data-target="#exampleModal"><i class="bi bi-x"></i> 
                                    <span class="text">Excluir Conta</span></button>
                                </div>
    
                            </div>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ATENÇÃO!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseja mesmo excluir sua conta? Essa ação não poderá ser revertida, sua conta não poderá ser recuperada. Tem certeza que deseja continuar?
        </div>
        <div class="modal-footer">
        
        <form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <a href="exclusao.php?id= <?php echo $rows_id['id']?>" class="btn bg-danger">Deletar Conta</a>
        </form>
        </div>
      </div>
    </div>
  </div>


    </main>
    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#"><i class="bi bi-arrow-up"></i></a>
            </p>
            <p class="mb-1">
                Feito com 💗 | Desenvolvido com &copy; <a href="https://getbootstrap.com/">Bootstrap</a>
            </p>
        </div>
    </footer>

    <!-- Dependencias do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>