<?php

    session_start();
    //destruir a sessao
    session_destroy();

    //limpar as variaveis de sessao
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);

    //mandar para loguin
    header('location:../index.php')
    
?>

    
