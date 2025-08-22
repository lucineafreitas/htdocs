<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="./recursos/particle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.css" integrity="sha512-ZX18S8AwqoIm9QCd1EYun82IryFikdJt7lxj6583zx5Rvr5HoreO9tWY6f2VhSxvK+48vYFSf4zFtX/t2ge62g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="estilo.css">
</head>

<body class="fundoLogin">

  <div class="painel animate__animated animate__backInDown">
    <div class="cabecalho">
      <i class="fa-solid fa-circle-user"></i>
      <h3> Login:</h3>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <?php
    //se existir uma requisição get ERR e se ERRo = 

    if(isset($_GET['erro']) && $_GET['erro'] == 1){
        echo "<p style='color:red;' class='text-center'> CPF ou senha inválidos</p>";
        echo "<script>
        var notyf = new Notyf({
          duration: 2000,
          position: {
            x: 'right',
            y: 'top',
    },
      });
        notyf.error('Login e senha inválidos');

        </script>";

    }
    ?>

    <form action="backend/acesso.php" method="post">
      <div class="mb-3">
        <label class="form-label"> CPF </label>
        <input name="cpf" type="text" class="form-control cpf">
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <div class="input-group">
          <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
          <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
            <i class="fa fa-eye" id="iconeOlho"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn btn-primary botao"> Entrar </button>
    </form>

  </div>

  <div id="particles-js"></div>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>

  <script src="./recursos/particle.js"></script>
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
  <script src="script.js"></script>

</body>

</html>