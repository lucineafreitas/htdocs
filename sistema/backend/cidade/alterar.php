<?php
    include '../conexao.php';
    //receber dados do front-end
    $id   = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];

    $sql = "UPDATE cidade SET nome='$nome' WHERE id='$id' ";
    //executar o sql
    mysqli_query($conexao, $sql);
    //retornar para tela principal

    session_start();
    $_SESSION['mensagem'] = "$nome Alterado com Successo!";

    header('Location:../../cidade.php');
?>