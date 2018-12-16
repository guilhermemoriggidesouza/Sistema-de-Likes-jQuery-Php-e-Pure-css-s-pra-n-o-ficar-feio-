<!DOCTYPE html>
<?php
    session_start();
    $_SESSION['user'] = 5;
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema controle</title>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="funcoes_js/funcoes.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    </head>
    <body>
    <div class="pure-g">
        <form action="#" method="POST" class="pure-form pure-u-1-1">
            <div class="pure-u-1-2">
                <input type="text" class="pure-u-13-24" placeholder="titulo" name="titulo">
            </div>
            <div class="pure-u-1-2">
                <textarea type="text" class="pure-u-13-24" placeholder="corpo" name ="corpo"></textarea><br>
            </div>
            <br>
            <button type="submit" class="pure-button">enviar</button>
        </form>
    </div>
    <div>
        <?php
            include "banco/banco.php";
            require_once "classes_php/CadastrarArtigo.php";
            require_once "classes_php/SelecionarArtigo.php";

            if(isset($_POST['titulo']) && isset($_POST['corpo'])){
                if($_POST['titulo'] != ""  && $_POST['corpo'] != ""){
                        $corpo = $_POST['corpo'];
                        $titulo = $_POST['titulo'];
                        $artigo =  new CadastrarArtigo($corpo, $titulo, $mysqli);
                            if($artigo->adicionarArtigo("artigo")){
                                echo "foi adicionado com sucesso";
                            }else{
                                echo "não foi adicionado nada";
                        }
                }else{
                    echo "<p>digite algo</p>";
                }
            }

            echo "<ul class='pure-menu-list'>";
             foreach(selecionar("artigo", $mysqli) as $artigos){
                echo "<li class='pure-menu-item'><h2>".$artigos['titulo']."</h2>";
                echo "<p>".$artigos['corpo']."</p>";
                echo "<p><a href='#' class='pure-button' onclick='addLike(".$artigos['id_artigo'].")'>like</a><span id=artigo_".$artigos['id_artigo']."_like>curtidas: </spa>".$artigos['likes']."</p></li>";
             }
            echo "</ul>"
            ?>
    </div>
    </body>
</html>