<?php
session_start();
include "../banco/banco.php";
//função que verifica se ja existe um like do referente user na referente postagem
//o "$mysqli" é a informação do banco
function verificarClicado($id_artigo, $id_user, $mysqli){
    $id_artigo = (int)$id_artigo;
    $id_user = (int)$id_user;

    $verificar = mysqli_query($mysqli,"SELECT like_id from likes WHERE id_user = '$id_user' AND id_artigo = '$id_artigo'") or die(mysqli_error($mysqli));
    $num_rows_verificar = mysqli_fetch_assoc($verificar);
    
    if($num_rows_verificar >= 1){
        return true;
    }else{
        return false;
    }
}
//função adiciona o like o like na tabela do artigo e na tabela dos likes
//o "$mysqli" é a informação do banco
function adicionarCliques($id_artigo, $id_user, $mysqli){
    $id_artigo = (int)$id_artigo;
    $id_user = (int)$id_user;

    $atualizar_likes = mysqli_query($mysqli,"UPDATE artigo SET likes = likes+1 WHERE id_artigo = '$id_artigo'") or die("não foi possível atualizar");
    if($atualizar_likes){
        $inserir_like = mysqli_query($mysqli, "INSERT INTO likes VALUES (null, '$id_artigo','$id_user')")or die("não foi possivel adicionar");
        if($inserir_like){
            return true;
        }else{
            return false;
        }
    }else{
       echo "não foi possivel curtir, error no banco"; 
    }
}
//função que seleciona os dados para envia-los a função do JavaScript que vai atualiza-los
//o "$mysqli" é a informação do banco
function retornarLikes($id_artigo, $mysqli){
    $id_artigo = (int)$id_artigo;
    $selecionar_likes = mysqli_query($mysqli, "SELECT likes FROM artigo WHERE id_artigo = '$id_artigo'") or die(mysqli_error($mysqli));
    $row_return = mysqli_fetch_assoc($selecionar_likes);

    return $row_return['likes'];
}

?>