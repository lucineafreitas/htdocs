<?php
include '../conexao.php';

$id = $_REQUEST["id"];

$sql = "DELETE FROM regiao WHERE id='$id' ";
$resultado = mysqli_query($conexao, $sql);

if(!$resultado){
    die("Erro ao excluir");
}

session_start();
$_SESSION["mensagem"] = "Excluido com Sucesso!";

//mandar para pagina principal
header('Location:../../regiao.php');



?>