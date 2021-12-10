<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Method: GET, POST, PUT, DELETE");
header("Content-Type: application/json");

include("../connection.php");
include("../model/modelProduto.php");
include("../controller/controllerProduto.php");

$_connection = new Connection();
$model = new ModelProduto($_connection->returnConnection());
$controller = new ControllerProduto($model);

$dados = $controller->router();

echo json_encode(array("status"=>"success", "data"=>$dados));
?>