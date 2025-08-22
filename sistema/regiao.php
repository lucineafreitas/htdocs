<?php
include './backend/conexao.php';
include './backend/validacao.php';
include './recursos/cabecalho.php';
$destino = "./backend/regiao/inserir.php";
//caso eu esteja alterando algum registro
//se for dferente de vazio, se tiver id na URL
if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM regiao WHERE id='$id' ";
  //executa sql
  $dados = mysqli_query($conexao, $sql);
  $regioes = mysqli_fetch_assoc($dados);
  $destino = "./backend/regiao/alterar.php";
}
?>

<body>
<?php include'./recursos/menusuperior.php'?>
  <div class="container-fluid">

    <div class="row">

      <div class="col-2 menu">
        <?php include './recursos/menulateral.php' ?>
      </div>

      <div class="col-2">
        <h1> Cadastro </h1>

        <form action="<?= $destino ?>" method="post">
          <div class="mb-3">
            <label class="form-label"> Id </label>
            <input readonly name="id" type="text" value="<?php echo isset($regioes) ? $regioes['id'] : "" ?>"
              class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label"> nome </label>
            <input name="nome" type="text" autofocus value="<?php echo isset($regioes) ? $regioes['nome'] : "" ?>"
              class="form-control">
          </div>

          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

      </div>

      <div class="col-8">
        <h1> Listagem </h1>

        <table id="tabela" class="table table-bordered border-primary">
          <thead class="table-primary">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM regiao";
            //executa o comando
            $dados = mysqli_query($conexao, $sql);
            //percorrer todos os registros do banco
            while ($coluna = mysqli_fetch_assoc($dados)) {
              ?>
              <tr>
                <th scope="row"> <?php echo $coluna['id'] ?></th>
                <td> <?php echo $coluna['nome'] ?></td>
                <td>
                  <a href="regiao.php?id=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pen-to-square"
                      style="color: blue;"></i></a>
                  <a href="<?php echo "./backend/regiao/excluir.php?id=" . $coluna['id'] ?>"
                    onclick="return confirm('Deseja realmente excluir?')">
                    <i class="fa-solid fa-trash ms-3" style="color: #e9672bff;"></i> </a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>

</body>
</html>