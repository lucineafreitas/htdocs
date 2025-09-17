<?php
include './backend/conexao.php';
include './backend/validacao.php';
include './recursos/cabecalho.php';
$destino = "./backend/ponto_focal/inserir.php";


//caso eu esteja alterando algum registro
//se for dferente de vazio, se tiver id na URL
if(!empty($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT * FROM ponto_focal WHERE id='$id' ";
//executa sql
$dados = mysqli_query($conexao, $sql);
$ponto_focais = mysqli_fetch_assoc($dados);
$destino = "./backend/ponto_focal/alterar.php";
}
?>


<body>
  
   <?php

    //se existir uma requisição get e se ERROR =1
    if(isset($_SESSION['mensagem'])){
        echo "<script>
        var notyf = new Notyf({
          duration: 3000,
          position: {
            x: 'right',
            y: 'top',
    },
      });
        notyf.success(' ".$_SESSION['mensagem']." ');

        </script>";
        unset($_SESSION['mensagem']);
      }
      ?>
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark navegacao">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <i class="fa-solid fa-handshake"></i> R.I.C.S </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              opções
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" />
          <button class="btn btn-outline-light " type="submit"> <i class="fa-solid fa-magnifying-glass"></i> </button>
          <a href="./backend/sair.php" class="btn btn-outline-light ms-2"> <i class="fa-solid fa-right-from-bracket"></i> </a>
        </form>


      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <div class="row">

      <div class="col-2 menu">
        <?php include 'recursos/menuLateral.php'; ?>
      </div>

      <div class="col-2">
        <h1> Cadastro </h1>

        <form action="<?= $destino ?>" method="post">
          <div class="mb-3">
            <label class="form-label"> Id </label>
            <input readonly name="id" type="text" value="<?php echo isset($ponto_focais) ? $ponto_focais['id']: "" ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> Nome </label>
            <input name="nome" type="text" autofocus value="<?php echo isset($ponto_focais) ? $ponto_focais['nome']: "" ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> Razão Social </label>
            <input name="razao_social" type="text" autofocus value="<?php echo isset($ponto_focais) ? $ponto_focais['razao_social']: "" ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> Tipo </label>
            <select class="form-select" name="tipo">
            <option value="Privada"> Privada </option>
            <option value="Pública"> Pública </option>
            </select>
          </div> 

          <div class="mb-3">
            <label class="form-label"> CNPJ </label>
            <input name="cnpj_cpf" type="text" value="<?php echo isset($ponto_focais) ? $ponto_focais['cnpj_cpf']: "" ?>" class="form-control cnpj">
          </div>

          <div class="mb-3">
            <label class="form-label"> Endereço </label>
            <input name="endereco" type="text" autofocus value="<?php echo isset($ponto_focais) ? $ponto_focais['endereco']: "" ?>" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> Telefone </label>
            <input name="telefone" type="text" value="<?php echo isset($ponto_focais) ? $ponto_focais['telefone']: "" ?>" class="form-control celular">
          </div> 

          <div class="mb-3">
            <label class="form-label"> Celular </label>
            <input name="celular" type="text" value="<?php echo isset($ponto_focais) ? $ponto_focais['celular']: "" ?>" class="form-control celular">
          </div>

          <div class="mb-3">
            <label class="form-label"> Email </label>
            <input name="email" type="text" value="<?php echo isset($ponto_focais) ? $ponto_focais['email']: "" ?>" class="form-control">
          </div>





        

          <div class="mb-3">
            <label> cidade </label>
            <select name="cidade" class="form-select" required>
              <option> Selecione uma cidade </option>
              <?php
              $sql = "SELECT * FROM cidade order by nome";
              $resultado = mysqli_query($conexao, $sql);
              $cidadeSelecionada = isset($ponto_focais) ? $ponto_focais['id_cidade_fk'] : '';

              while($reg = mysqli_fetch_assoc($resultado)){
              $selecao = ($reg['id'] == $cidadeSelecionada) ? 'selected': '';
              echo "<option value='{$reg['id']}' $selecao> {$reg['nome']} </option>";
            }
              ?>
              </select>
              </div>
            

          

          <button type="submit" class="btn btn-primary"> Salvar </button>
        </form>

      </div>


      <div class="col-8">
        <h1> Listagem </h1>

        <table id="tabela" class="table table-striped table-bordered">
          <thead class="table-primary">
            <tr>
              <th scope="col"> Id </th>
              <th scope="col"> Nome </th>
              <th scope="col"> Razão Social </th>
              <th scope="col"> Tipo </th>
              <th scope="col"> CNPJ </th>
              <th scope="col"> Endereço </th>
              <th scope="col"> Telefone </th>
              <th scope="col"> Celular </th>
              <th scope="col"> Email </th>
              <th scope="col"> Cidade </th>
              <th scape="col"> Opções </th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT * FROM ponto_focal";
          //executa o comando
          $dados = mysqli_query($conexao, $sql);
          //percorrer todos os reistros do banco de dados
          while($coluna = mysqli_fetch_assoc($dados)){
            ?>
          
          

            <tr>
              <th scope="row"> <?php echo $coluna['id'] ?></th>
              <td> <?php echo $coluna ['nome'] ?> </td>
              <td> <?php echo $coluna ['razao_social'] ?> </td>
              <td> <?php echo $coluna ['tipo'] ?> </td>
              <td> <?php echo $coluna ['cnpj_cpf'] ?> </td>
              <td> <?php echo $coluna ['endereco'] ?> </td>
              <td> <?php echo $coluna ['telefone'] ?> </td>
              <td> <?php echo $coluna ['celular'] ?> </td>
              <td> <?php echo $coluna ['email'] ?> </td>
              
              
              <?php
              $sql = "SELECT nome FROM cidade WHERE id = ".$coluna['id_cidade_fk'];
              $resultado = mysqli_query($conexao, $sql);
              $regiao = mysqli_fetch_assoc($resultado);

              ?>

              <td> <?php echo $regiao['nome'] ?> </td>
              
              	      <td> 
                <a href="./ponto_focal.php?id=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pen-to-square me-3" style="color: blue;"></i></a>  
                <a href="<?php echo "./backend/ponto_focal/excluir.php?id=".$coluna['id'] ?>" onclick="return confirm('Deseja realmente excluir?')"> <i class="fa-solid fa-trash ms-2" style="color: #ff0000;"></i> </a>  
              </td>
            </tr>
            <?php } ?>
           
          </tbody>
        </table>
      </div>


    </div>

  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>