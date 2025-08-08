<?php
    session_start();

    //se nao estiver logado manda para o login
    //se nao existir variavel de sessao cpf ou senha

    if(!isset($_SESSION['cpf']) or !isset($_SESSION['senha'])){
        //destruir sessao
        session_destroy();
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);

        //manda para login
    header( 'location:./index.php');

    }    

?>