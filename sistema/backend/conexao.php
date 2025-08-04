<?php

$endereco = "localhost";
$nome = "bancorics";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($endereco, $usuario, $senha, $nome);

//se tiver erro de conecçao
if (!$conexao) {
    die("erro na conexão com banco!" . mysqli_connect_error());
}
?>