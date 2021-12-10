<?php

class ModelCategoria{
    private $_connection;

    private $_idCategoria;
    private $_nome;
    
    public function __construct($_connection){
        $json = file_get_contents("php://input");
        $dadosCategoria = json_decode($json);

        $this->_idCategoria = $dadosCategoria->idCategoria ?? null;
        $this->_nome = $dadosCategoria->nome ?? null;

        $this->_connection = $_connection
    }

    public function findAll(){
        $sql = "SELECT * FROM tbl_categoria";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->execute();
    
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById(){
        $sql = "SELECT * FROM tbl_categoria WHERE idCategoria = ?";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->_idCategoria);
    
        $stm->execute();
    
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "INSERT INTO tbl_categoria (nome) VALUES (?)";

        $stm = $this->_connection->prepare($sql);

        $stm->bindValue(1, $this->_nome);

        if ($stm->execute()) {
            return "Success";
        } else {
            return "Error";
        }
    }

    public function delete(){
        $sql = "DELETE FROM tbl_categoria WHERE idCategoria = ?";

        $stm = $this->_connection->prepare($sql);
        $stm->bindValue(1, $this->_idCategoria);

        if ($stm->execute()) {
            return "Dados excluídos com sucesso!";
        } else {
            return "Algo deu errado!!";
        }
    }

    public function update(){
        $sql = "UPDATE tbl_categoria SET nome = ? WHERE idCategoria = ?";

        $stm = $this->_connection->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_idCategoria);

        if ($stm->execute()) {

            return "Dados alterados com sucesso!";
        } else {

            return "Algo deu errado!!";
        }
    }
}
?>