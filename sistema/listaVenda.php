<?php
include './backend/conexao.php';
include './backend/validacao.php';
$sql = " SELECT *,
  v.id,
  v.data,
  pf.nome AS ponto_focal_nome,
  pf.tipo,
  a.nome AS area_nome,
  c.nome AS cidade_nome,
  r.nome AS regiao_nome
  FROM venda v INNER JOIN ponto_focal pf
  ON pf.id = v.id_ponto_focal_fk
  INNER JOIN area a
  ON a.id = v.id_area_fk
  INNER JOIN cidade c
  ON pf.id_cidade_fk = c.id
  INNER JOIN regiao r
  ON c.id_regiao_fk = r.id
  ORDER BY v.data DESC
  ";
$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="./recursos/particle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="estilo.css">

<style>
  button{
    background-color: #7ea4ddff;
    margin-bottom: 25px;
    margin-right: 8px;
    color: black;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
  }
  #tabela{
    margin-top: 8px;
  }
</style>
</head>

<body class="container-fluid">

  <h2> Relatório de Vendas de Áreas </h2>

  <div class="row">

    <div class="col-md-3">
      <label> Região </label>
      <select class="form-select" name="regiao_id" id="regiao_id" required>
        <option> Selecione </option>
        <?php
        include "./backend/conexao.php";
        // Conexão com o banco de dados
        $regioes = mysqli_query($conexao, "SELECT * FROM regiao ORDER BY nome");
        while ($reg = mysqli_fetch_assoc($regioes)) {
          echo "<option value=' {$reg['id']}'>{$reg['nome']}</option>";
        }
        ?>
      </select>
    </div>

    <div class="col-md-3">
      <label> Cidade </label>
      <select class="form-select" name="cidade_id" id="cidade_id" required>
        <option value=""> Selecione </option>


      </select>
    </div>

    <div class="col-md-3">
      <label> Ponto Focal (Empresa)</label>
      <select class="form-select" name="ponto_focal_id" id="ponto_focal_id" required>
        <option value=""> Selecione </option>
      </select>
    </div>

    <div class="col-md-3">
      <label>Área de Curso</label>
      <select class="form-select" name="area_id" id="area_id" required>
        <option> Selecione </option>
        <?php
        $areas = mysqli_query($conexao, "SELECT * FROM area ORDER BY nome");
        while ($a = mysqli_fetch_assoc($areas)) {
          echo "<option value='{$a['id']}'> {$a['nome']}</option>";
        }
        ?>
      </select>
    </div>

    <div class="table-responsive mt-4">
      <table class="table table-bordered table-striped" id="tabela">
        <thead>
          <tr>
            <th> Região </th>
            <th> Cidade </th>
            <th> Ponto Focal </th>
            <th> Tipo </th>
            <th> Área do Curso </th>
            <th> Data da Compra </th>
            <th> Origem </th>
            <th> Observação </th>
            <th> Excluir </th>
          </tr>
        <tbody>
          <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td> <?= $linha['regiao_nome'] ?> </td>
              <td> <?= $linha['cidade_nome'] ?> </td>
              <td> <?= $linha['ponto_focal_nome'] ?> </td>
              <td> <?= $linha['tipo'] ?> </td>
              <td> <?= $linha['area_nome'] ?> </td>
              <td> <?= date('d/m/Y', strtotime($linha['data'])) ?> </td>
              <td> <?= $linha['origem'] ?> </td>
              <td> <?= $linha['obs'] ?> </td>
              <td>
                <a href="./backend/venda/excluir.php?id=<?= $linha['id'] ?>" class="text-danger"
                  onclick="return confirm('Tem certeza que quer excluir?')">
                  <i class="fa-solid fa-trash-can"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>

        </thead>
      </table>
    </div>

      <a href="./principal.php" class="btn btn-success" style="width: 80px;"> Voltar </a>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    //se tiver alteração no campo região, dispara essa função
    $('#regiao_id').on('change', function () {
      var regiaoId = $(this).val();
      //vamos chamar o arquivo php que vai carregar as cidades de acordo com região
      $.post('./backend/venda/buscar_cidade.php', { regiao_id: regiaoId },
        //função que vai retornar as cidades de acordo com a região
        function (data) { $('#cidade_id').html(data); });
    });
    $('#cidade_id').on('change', function () {
      var cidadeId = $(this).val();
      //vamos chamar o arquivo php que vai carregar as cidades de acordo com região
      $.post('./backend/venda/buscar_ponto_focal.php', { cidade_id: cidadeId },
        //função que vai retornar as cidades de acordo com a região
        function (data) { $('#ponto_focal_id').html(data); });
    });

   
      var tabela = $('#tabela').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf', 'print'],
        responsive: true,
        language: {
          url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/pt-BR.json',
        },
      });
  

    $('#regiao_id').on('change', function () {
      var texto = $('#regiao_id option:selected').text();
      tabela.column(0).search(texto).draw();

    });

    $('#cidade_id').on('change', function () {
      var texto = $('#cidade_id option:selected').text();
      tabela.column(1).search(texto).draw(); 
    });

    $('#ponto_focal_id').on('change', function () {
      var texto = $('#ponto_focal_id option:selected').text();
      tabela.column(2).search(texto).draw();
    });

    $('#area_id').on('change', function () {
      var texto = $('#area_id option:selected').text();
      tabela.column(4).search(texto).draw();
    });

  </script>

  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

</body>

</html>