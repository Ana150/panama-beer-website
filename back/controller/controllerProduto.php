<?php

class controllerroduto{
    private $method;
    private $modelProduto;
    private $idProduto;
}

public function construct($model)
    {
        $this->modelProduto = $model;
        $this->method = $_SERVER['REQUEST_METHOD'];

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->idProduto = $dadosProduto->idProduto ?? $_POST["idProduto"];
    }

public function router()
    {
        switch ($this->_method) {
            case 'GET':
                return $this->modelProduto->findAll();
                break;
            case 'POST':
                if ($this->idProduto) {
                    return $this->modelProduto->update();
                    break;
                }{
                    return $this->modelProduto->create();
                    break;
                }
            case 'DELETE':
                return $this->modelProduto->delete();
                break;

            default:
                # code...
                break;
        }
    }
?>