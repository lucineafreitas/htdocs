<?php
include '../conexao.php';

//receber dados do front end
$regiao_id = $_REQUEST['regiao_id'];
$cidade_id = $_REQUEST['cidade_id'];
$ponto_focal = $_REQUEST['ponto_focal_id'];
$area_id = $_REQUEST['area_id'];
$dtcompra = $_REQUEST['dtcompra'];
$origem = $_REQUEST['origem'];
$obs = $_REQUEST['obs'];

$sql = "INSERT INTO venda(nome, numero) VALUES ('$nome', '$numero')";
//executa sql
$resultado = mysqli_query($conexao,$sql);
//mandar para pagina principal
header('location:../../venda.php');

session_start();
$_SESSION["mensagem"] = "$nome Cadastrado com Sucesso!";

?>