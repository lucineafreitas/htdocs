<?php
include '../conexao.php';

//receber dados do front end
$nome = $_REQUEST['nome'];
$numero = $_REQUEST['numero'];

$sql = "INSERT INTO area(nome, numero) VALUES ('$nome', '$numero')";
//executa sql
$resultado = mysqli_query($conexao,$sql);
//mandar para pagina principal
header('location:../../area.php');

session_start();
$_SESSION["mensagem"] = "$nome Cadastrado com Sucesso!";

?>