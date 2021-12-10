<?php

class ControllerAdministrador{
    private $_method;
    private $_modelAdministrador;
    private $_idAdministrador;

    public function __construct($model){
        $this->_modelAdministrador = $model;
        $this->_method = $_SERVER["REQUEST_METHOD"];

        $json = file_get_contents("php://input");
        $dadosAdministrador = json_decode($json);

        $this->_idAdministrador = $dadosAdministrador->idAdministrador ?? null;
    }

    public function router(){
        switch ($this->_method) {
            //case GET
            case 'GET':
                if ($this->_idAdministrador) {
                    return $this->_modelAdministrador->findById();
                    break;
                }

                return $this->_modelAdministrador->findAll();
                break;

            //case POST
            case 'POST':
                if (isset($_POST["idAdministrador"])) {
                    return $this->_modelAdministrador->update();
                    break;
                }
                    return $this->_modelAdministrador->create();
                    break;
            
            //case DELETE
            case 'DELETE':
                return $this->_modelAdministrador->delete();
                break;

            //case PUT
            case 'PUT':
                return $this->_modelAdministrador->update();
                break;

            default:
                # code...
                break;
        }
    }

}

?>