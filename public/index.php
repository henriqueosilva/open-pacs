<?php

//header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
date_default_timezone_set('America/Bahia');

require __DIR__ . '/../vendor/autoload.php';

$url = explode('/', $_SERVER['SCRIPT_NAME']);
$query = explode('?', $_SERVER['QUERY_STRING']);

if ($url[1] != 'api') {
    http_response_code(404);
    echo json_encode(array('status' => 'error', 'data' => 'Api not found'));
    exit;
}
array_shift($url);
array_shift($url);
if ($url == null) {
    http_response_code(404);
    echo json_encode(array('status' => 'error', 'data' => 'Service not typed'));
    exit;
}
$controller_path = 'App\\' . ucfirst($url[0]) . '\\' . ucfirst($url[1]) . '\\' . ucfirst($url[1]).'Controller';
//$controller = new $controller_path;

//array_shift($url);
$method = strtolower($_SERVER['REQUEST_METHOD']);
if (!class_exists($controller_path)) {
    http_response_code(404);
    echo json_encode(array('status' => 'error', 'data' => 'Service not found'));
    exit;
}
try {
    $response = call_user_func_array(array(new $controller_path, $method), array($query));
    http_response_code($response['http_code']);
    array_shift($response);
    echo json_encode($response);
    exit;
} catch (\Exception $e) {
    http_response_code(500);
    echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
    exit;
}