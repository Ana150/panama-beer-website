<?php

class ModelAdministrador{
    private $_connection;

    private $_idAdministrador;
    private $_nome;
    private $_usuario;
    private $_email;
    private $_chave_de_autorizacao;

    public function __construct($_connection){
        $json = file_get_contents("php://input");
        $dadosAdministrador = json_decode($json);

        $this->_idAdministrador = $dadosAdministrador->idAdministrador ?? null;
        $this->_nome = $dadosAdministrador->nome ?? null;
        $this->_usuario = $dadosAdministrador->usuario ?? null;
        $this->_email = $dadosAdministrador->email ?? null;
        $this->_chave_de_autorizacao = $dadosAdministrador->chave_de_autorizacao ?? null;

        $this->_connection = $_connection
    }

    public function findAll(){

        $sql = "SELECT * FROM tbl_administrador";

        $stm = $this->_connection->prepare($sql);
        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById(){
        $sql = "SELECT * FROM tbl_administrador WHERE idAdministrador = ?";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->_idAdministrador);
    
        $stm->execute();
    
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(){
        $sql = "INSERT INTO tbl_administrador (nome, usuario, email, chave_de_autorizacao) VALUES (?, ?, ?, ?)";

        $stm = $this->_connection->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_usuario);
        $stm->bindValue(3, $this->_email);
        $stm->bindValue(4, $this->_chave_de_autorizacao);

        if ($stm->execute()) {
            return "Success";
        } else {
            return "Error";
        }
    }

    public function delete(){
        $sql = "DELETE FROM tbl_administrador WHERE idAdministrador = ?";

        $stm = $this->_connection->prepare($sql);

        $stm->bindValue(1, $this->_idAdministrador);
    
        if ($stm->execute()) {
            return "Dados excluídos com sucesso!";
        } else {
            return "Algo deu errado!!";
        }
    }

    public function update(){
        $sql = "UPDATE tbl_administrador SET 
        nome = ?,
        usuario = ?,
        email = ?,
        chave_de_autorizacao = ?
        WHERE idAdministrador = ?";

        $stm = $this->_connection->prepare($sql);

        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_usuario);
        $stm->bindValue(3, $this->_email);
        $stm->bindValue(4, $this->_chave_de_autorizacao);
        $stm->bindValue(5, $this->_idAdministrador);

        if ($stm->execute()) {

            return "Dados alterados com sucesso!";
        } else {

            return "Algo deu errado!!";
        }
    }

}

?>