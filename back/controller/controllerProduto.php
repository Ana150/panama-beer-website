<?php

class controllerroduto{
    private $_method;
    private $_modelProduto;
    private $_idProduto;
}

public function __construct($model)
    {
        $this->_modelProduto = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = $dadosProduto->idProduto ?? $_POST["idProduto"];
    }

public function router()
    {
        switch ($this->_method) {
            case 'GET':
                return $this->_modelProduto->findAll();
                break;
            case 'POST':
                if ($this->_idProduto) {
                    return $this->_modelProduto->update();
                    break;
                }{
                    return $this->_modelProduto->create();
                    break;
                }
            case 'DELETE':
                return $this->_modelProduto->delete();
                break;

            default:
                # code...
                break;
        }
    }
?>