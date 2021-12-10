<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Content-Type: application/json");

include('../connection.php');
include('../model/ModelCategoria.php');
include('../controller/ControllerCategoria.php');

$Connection = new connection();
$model = new ModelCategoria($_connection->returnConnection());
$controller = new controllerCategoria($model);

$dados = $controller->router();

echo json_encode(array("status" => "Success", "data" => $dados));

?>