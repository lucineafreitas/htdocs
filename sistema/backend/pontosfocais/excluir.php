<?php
include '../conexao.php';

$id = $_REQUEST["id"];

$sql = "DELETE FROM ponto_focal WHERE id='$id' ";
$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION["mensagem"] = "Excluido com Sucesso!";

//mandar para pagina principal
header('Location:../../ponto_focal.php');


?>