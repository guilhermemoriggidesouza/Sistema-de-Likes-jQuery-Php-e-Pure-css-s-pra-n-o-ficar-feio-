<?php
//Dados do servidor
$host = "localhost";
$login = "root";
$senha = "";
$banco = "sistemalike";
//objeto criado com as informações do mysqli
    $mysqli = new mysqli('localhost', 'root', '', 'sistemalike');
//debugging para caso não conecte
 if ($mysqli->connect_error) {
      die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
   }


if(!mysqli_connect($host, $login, $senha)){
    echo "Erro ao conectar ao banco de dados!";
}

?>