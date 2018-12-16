<?php
    sleep(2);
    require_once "geral.php";
    require_once "../banco/banco.php";
    //guarda as informações do POST que o java script enviou e o user q está em sessão
    $artigo = (int)$_POST['artigo_id'];
    $user = (int)$_SESSION['user'];
    //verifica se ja foi curtido pelo user o artigo enviado por POST pelo JavaScript
    //o "$mysqli" é a informação do banco
    if(!verificarClicado($artigo, $user, $mysqli)){
        //caso o artigo n foi curtido pelo usuario executa a inserção e modificação das tabelas
        if(adicionarCliques($artigo, $user, $mysqli)){
            echo "sucess";
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }
    
?>