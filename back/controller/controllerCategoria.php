<?php

class ControllerCategoria{
    private $_method;
    private $_modelCategoria;
    private $_idCategoria;
    
    public function __construct($model){
        $this->_modelCategoria = $model;
        $this->_method = $_SERVER["REQUEST_METHOD"];

        $json = file_get_contents("php://input");
        $dadosCategoria = json_decode($json);

        $this->_idCategoria = $dadosCategoria->idCategoria ?? null;
    }

    public function router(){
        switch ($this->_method) {
            //case GET
            case 'GET':
                if ($this->_idCategoria) {
                    return $this->_modelCategoria->findById();
                    break;
                }

                return $this->_modelCategoria->findAll();
                break;

            //case POST
            case 'POST':
                if (isset($_POST["idCategoria"])) {
                    return $this->_modelCategoria->update();
                    break;
                }
                    return $this->_modelCategoria->create();
                    break;
            
            //case DELETE
            case 'DELETE':
                return $this->_modelCategoria->delete();
                break;

            //case PUT
            case 'PUT':
                return $this->_modelCategoria->update();
                break;

            default:
                # code...
                break;
        }
    }
}

?>