<?php
    sleep(2);
    require_once "geral.php";
    require_once "../banco/banco.php";

    $artigo = (int)$_POST['artigo_id'];
    $user = (int)$_SESSION['user'];
    if(!verificarClicado($artigo, $user, $mysqli)){
        if(adicionarCliques($artigo, $user, $mysqli)){
            echo "sucess";
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }
    
?>