<?php
include "banco/banco.php";
class CadastrarArtigo{
    private $corpo;
    private $titulo;
    private $conn;
    private $insert;
    
    public function __construct($corpo, $titulo, $conn){
        $this->setCorpo($corpo);
        $this->setTitulo($titulo);
        $this->setConn($conn);
    }

    public function adicionarArtigo($tabela){
        $titulo_sql = $this->getTitulo();
        $corpo_sql = $this->getCorpo();
        $this->insert = mysqli_query($this->conn, "INSERT INTO  $tabela VALUES (null, '$titulo_sql', '$corpo_sql', 0)")or die(mysqli_error($this->conn));
    
        if($this->insert){
            return true;
        }else{
            return false;
        }
    }

    public function getCorpo()
    {
        return $this->corpo;
    }
    public function setCorpo($corpo)
    {
        $this->corpo = $corpo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getConn()
    {
        return $this->conn;
    }
    public function setConn($conn)
    {
        $this->conn = $conn;
    }
}
?>