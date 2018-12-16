<?php
include "banco/banco.php";
    function selecionar($table, $mysqli){
        $query = mysqli_query($mysqli, "SELECT * FROM $table ORDER BY id_artigo desc")or die(mysqli_error($mysqli));
        $total = mysqli_num_rows($query)or die(mysqli_error($mysqli));
        $rows = mysqli_fetch_assoc($query)or die(mysqli_error($mysqli));
        if($total >0){
            do{
                $artigo_arr[]=array(
                'titulo' =>$rows['titulo'],
                'corpo' =>$rows['corpo'],
                'likes' =>$rows['likes'],
                'id_artigo' =>$rows['id_artigo']
                );
            }while($rows =  mysqli_fetch_assoc($query));
            return $artigo_arr;
        }
    }
   
?>