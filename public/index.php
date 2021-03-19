<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/catalogo-libri/public");


$app->get('/test', function (Request $request, Response $response, $args) {
    $data = array('name' => 'Rob', 'age' => 40);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(201);
});

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
  
});
$app->run();