<?php

class ModelProduto{
    private $_connection;

    private $_idProduto;
    private $_nome;
    private $_preco;
    private $_descricao;
    private $_foto;
    
    public function __construct($_connection){
        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = isset($dadosProduto->idProduto) ? 
            $dadosProduto->idProduto : null;

        $this->_nome = isset($dadosProduto->nome) ? 
            $dadosProduto->nome : (isset($_POST["nome"]) ? $_POST["nome"] : null);

        $this->_preco = isset($dadosProduto->preco) ? 
            $dadosProduto->preco : (isset($_POST["preco"]) ? $_POST["preco"] : null);

        $this->_descricao = isset($dadosProduto->descricao) ? 
            $dadosProduto->descricao : (isset($_POST["descricao"]) ? $_POST["descricao"] : null);

        $this->_foto = isset($dadosProduto->foto) ? null : (isset($_FILES["foto"]) ? $_FILES["foto"] : null);

        $this->_connection = $_connection
    }

    public function findAll(){
        $sql = "SELECT * FROM tbl_produto";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->execute();
    
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById(){
        $sql = "SELECT * FROM tbl_produto WHERE idProduto = ?";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->_idProduto);
    
        $stm->execute();
    
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function create(){
        $sql = "INSERT INTO tbl_produto (nome, preco, descricao, foto) VALUES (?, ?, ?, ?)";
    
        $extensao = pathinfo($this->_foto, PATHINFO_EXTENSION);
        $novoNomeArquivo = md5(microtime()).".$extensao";
    
        move_uploaded_file($_FILES["foto"]["tmp_name"], "../upload/$novoNomeArquivo");
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->nome);
        $stm->bindValue(2, $this->preco);
        $stm->bindValue(3, $this->descricao);
        $stm->bindValue(4, $novoNomeArquivo);
    
        if ($stm->execute()) {
           return "Succes";
        }else{
            return "Error";
        }
    }

    public function delete(){

        $sql = "DELETE FROM tbl_produto WHERE idProduto = ?";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->_idProduto);
    
        if ($stm->execute()) {
            return "Dados excluídos com sucesso!";
        }else{
    
            return "Algo deu errado!!";
        }
    
    }

    public function update(){

        if ($_FILES["foto"]["error"] != UPLOAD_ERR_NO_FILE) {
    
            $sql = "SELECT foto FROM tbl_produto WHERE idProduto = ?";
    
            $stm = $this->_connection->prepare($sql);
    
            $stm->bindValue(1, $this->_idProduto);
    
            $stm->execute();
    
            $produto = $stm->fetchAll(\PDO::FETCH_ASSOC);
    
    
            unlink("../upload/" . $produto[0]["foto"]);
    
            $nomeArquivo = $_FILES["foto"]["name"];
    
            $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
    
            $novoNomeArquivo = md5(microtime()) . ".$extensao";
    
            move_uploaded_file($_FILES["foto"]["tmp_name"], "../upload/$novoNomeArquivo");
        }
    
    
        $sql = "UPDATE tbl_produto SET 
        nome = ?,
        preco = ?,
        descricao = ?,
        foto = ?
        WHERE idPessoa = ?";
    
        $stm = $this->_connection->prepare($sql);
    
        $stm->bindValue(1, $this->_nome);
        $stm->bindValue(2, $this->_descricao);
        $stm->bindValue(3, $this->_preco);
        $stm->bindValue(4, $this->_foto);
        $stm->bindValue(5, $this->_idPessoa);
    
        if ($stm->execute()) {
            return "Dados alterados com sucesso!";
        }
    
    }

}


?>