<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Content-Type: application/json");

include('../connection.php');
include('../model/modelAdministrador.php');
include('../controller/controllerAdministrador.php');

$_connection = new Connection();
$model = new ModelAdministrador($_connection->returnConnection());
$controller = new ControllerAdministrador($model);

$dados = $controller->router();

echo json_encode(array("status"=>"success", "data"=>$dados));
?>