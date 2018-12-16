<?php
    include "../banco/banco.php";
    include "geral.php";

    $artigo = (int)$_POST['artigo_id'];
    
    $numero_de_likes = retornarLikes($artigo, $mysqli);
    echo $numero_de_likes;
?>