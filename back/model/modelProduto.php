<?php

class ModelProduto{
    private $_connection;
    private $_idProduto;
    private $_preco;
    private $_descricao;
    private $_foto;
}

public function __construct($_connection){
    $this->method = $_SERVER['REQUEST_METHOD'];

    $json = file_get_contents("php://input");
    $dadosProduto = json_decode($json);

    switch ($this->method) {
        case 'POST':
            $this->_idProduto = $_POST["idProduto"] ?? null;
            $this->_nome = $_POST["nome"] ?? null;
            $this->_preco = $_POST["preco"] ?? null;
            $this->_descricao = $_POST["descricao"] ?? null;
            $this->_foto = $_POST["foto"] ?? null;
            break;
        
        default:
            $this->idProduto = $dadosProduto->idProduto ?? null;
            $this->nome = $dadosProduto->nome ?? null;
            $this->preco = $dadosProduto->preco ?? null;
            $this->descricao = $dadosProduto->descricao ?? null;
            $this->foto = $dadosProduto->foto ?? null;
            break;
    }

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
    $stm->bindValue(1, $this->idProduto);

    $stm->execute();

    return $stm->fetchAll(\PDO::FETCH_ASSOC);
}

public function create(){
    $sql = "INSERT INTO tbl_produto (nome, preco, descricao, foto) VALUES (?, ?, ?, ?);";

    $extensao = pathinfo($this->foto, PATHINFO_EXTENSION);
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

    $stmt = $this->_connection->prepare($sql);

    $stmt->bindValue(1, $this->idProduto);

    if ($stmt->execute()) {
        return "Dados excluídos com sucesso!";
    }

}

public function update(){

    if (condition) {
        # code...
    }

    $sql = "UPDATE tbl_produto SET 
    nome = ?,
    preco = ?,
    descricao = ?,
    foto = ?
    WHERE idPessoa = ?";

    $stmt = $this->_connection->prepare($sql);

    $stm->bindValue(1, $this->_nome);
    $stm->bindValue(2, $this->_descricao);
    $stm->bindValue(3, $this->_preco);
    $stm->bindValue(4, $this->_foto);
    $stmt->bindValue(5, $this->_idPessoa);

    if ($stmt->execute()) {
        return "Dados alterados com sucesso!";
    }

}

}

?>