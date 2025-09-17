<?php
include'../conexao.php';

//receber dados do front-end
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $razao_social = $_REQUEST['razao_social'];
    $tipo = $_REQUEST['tipo'];
    $cnpj_cpf = $_REQUEST['cnpj_cpf'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];
    $email = $_REQUEST['email'];
    $cidade = $_REQUEST['cidade'];

    //comando sql para atualizar os dados
    $sql = "UPDATE ponto_focal SET nome='$nome', razao_social='$razao_social', tipo='$tipo', cnpj_cpf='$cnpj_cpf', endereco='$endereco',
    telefone='$telefone', celular='$celular', email='$email', id_cidade_fk='$cidade' WHERE id='$id' ";

    //executa o sql
    mysqli_query($conexao, $sql);

    session_start();
        $_SESSION['mensagem'] = "$nome Alterado com Successo!";

    //retornar para a tela principal
    header('Location:../../ponto_focal.php');

    ?>

