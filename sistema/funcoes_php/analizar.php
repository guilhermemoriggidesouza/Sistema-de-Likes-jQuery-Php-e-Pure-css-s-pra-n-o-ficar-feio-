<?php
//processa a função de retorno e caso seja um sucesso, envia o resultado do processamente via o echo
//utilizando echo a função do JavaScript vai usar-lo como parametro de seu callback
//o "$mysqli" é a informação do banco
    include "../banco/banco.php";
    include "geral.php";

    $artigo = (int)$_POST['artigo_id'];
    
    $numero_de_likes = retornarLikes($artigo, $mysqli);
    echo $numero_de_likes;
?>